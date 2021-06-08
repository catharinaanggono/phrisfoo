from flask import Flask, request, jsonify
from flask_cors import CORS
import json
import os
import pika
import requests
import amqp_setup
from os import environ

from invoker import invoke_http

app = Flask(__name__)
CORS(app)

patient_url = environ.get('patient_url') or "http://localhost:5000/patient"
past_treatment_url = environ.get('past_treatment_url') or "http://localhost:5000/patient_treatment"
practitioner_unavailable_schedule_url = environ.get('practitioner_unavailable_schedule_url') or "http://localhost:5002/unavailable-schedule"
booking_url = environ.get('booking_url') or "http://localhost:5003/booking"
email_url = environ.get('email_url') or "http://localhost:5005/email"
practitioner_url = environ.get("practitioner_url") or "http://localhost:5001/practitioner"



@app.route("/place_booking", methods=['POST'])
def place_order():
    # Simple check of input format and data of the request are JSON
    if request.is_json:
        try:
            order = request.get_json()
            print("\nReceived an order in JSON:", order)

            # do the actual work
            # 1. Send order info {cart items}
            result = processBooking(order)
            return jsonify(result), 200

        except Exception as e:
            return jsonify({
                "code": 400,
                "message": "Invalid JSON input: " + str(request.get_data())
            }), 400
    return ''
    # # if reached here, not a JSON request.
    # 


def processBooking(booking):
    print("Trying to open connection to rabbitmq")
    amqp_setup.check_setup()
    print("Opened a connection")
    nric = booking['data']['nric']
    name = booking['data']['name']
    phone = booking['data']['phone']
    email = booking['data']['email']
    patient_json = {"nric": nric, "name": name, "phone": phone, "email": email}
    
    past_records = booking['data']['past_records']
    past_treatment_json = {"nric": nric, "past_treatment": past_records}


    practitionerid = booking['data']['practitionerid']
    date_and_time = booking['data']['date_and_time']
    problem = booking['data']['problem']

    email_json = {"recipients": email, "name": name, "phone": phone,"date_and_time": date_and_time}

    booking_json = {"nric": nric, "practitionerid": practitionerid, "problem": problem, "date_and_time": date_and_time}

    unavailable_schedule_json = {"practitionerid": practitionerid, "date_and_time": date_and_time}
    print()
    print("-------- Invoking patient microservice --------")
    patient_result = invoke_http(patient_url, "POST", json=patient_json)
    print('patient_result:', patient_result)
    print()
    print()
    

    patient_code = patient_result['code']
    if patient_code >= 500:
        amqp_setup.channel.basic_publish(exchange=amqp_setup.exchangename, routing_key="patient.error", body="Error in registering patient {} in database (admin side)".format(nric), properties=pika.BasicProperties(delivery_mode=2))
        return patient_result
    else:
        amqp_setup.channel.basic_publish(exchange=amqp_setup.exchangename, routing_key="patient.info", body="Created a patient in database", properties=pika.BasicProperties(delivery_mode=2))

    if past_treatment_json['past_treatment'] != '': #may need to change naming into past treatment

        print("--------- Invoking patient past treatments microservice ---------")
        past_treatment_result = invoke_http(past_treatment_url, "POST", json=past_treatment_json)
        print('past_treatment_result:', past_treatment_result)
        print()
        print()
        past_treatment_code = past_treatment_result['code']
        if past_treatment_code > 500:
            amqp_setup.channel.basic_publish(exchange=amqp_setup.exchangename, routing_key="past_treatment.error", body="Error in registering past treatments for patient {} (admin side)".format(nric), properties=pika.BasicProperties(delivery_mode=2))
            return past_treatment_result
        amqp_setup.channel.basic_publish(exchange=amqp_setup.exchangename, routing_key="past_treatment.info", body="Created patient {} past treatments".format(nric), properties=pika.BasicProperties(delivery_mode=2))

    
    print("--------- Invoking unavailable schedule microservice ----------" )
    unavailable_schedule_result = invoke_http(practitioner_unavailable_schedule_url, method="POST", json=unavailable_schedule_json)
    print("unavailable_schedule_result:", unavailable_schedule_result)
    print()
    print()
    unavailable_schedule_code = unavailable_schedule_result['code']
    if unavailable_schedule_code >= 500:
        amqp_setup.channel.basic_publish(exchange=amqp_setup.exchangename, routing_key="unavailable_schedule.error", body="Error in creating doctor's schedule (admin side)", properties=pika.BasicProperties(delivery_mode=2))
        return unavailable_schedule_result
    elif unavailable_schedule_code >= 400:
        amqp_setup.channel.basic_publish(exchange=amqp_setup.exchangename, routing_key="unavailable_schedule.error", body="Bad request, schedule might already exists", properties=pika.BasicProperties(delivery_mode=2))
        return unavailable_schedule_result
    else:
        amqp_setup.channel.basic_publish(exchange=amqp_setup.exchangename, routing_key="unavailable_schedule.info", body="Created doctor's schedule at {} for doctor {}".format(date_and_time, practitionerid), properties=pika.BasicProperties(delivery_mode=2))
    #Activity log create here when done :)
    print("--- Doing manual checking on foreign keys from patient and practitioner database ---")
    patient_check = invoke_http(patient_url + '/{}'.format(nric), "GET")
    amqp_setup.channel.basic_publish(exchange=amqp_setup.exchangename, routing_key="patient_foreign_key_check.info", body="Checking if patient {} exists in database...".format(nric), properties=pika.BasicProperties(delivery_mode=2))
    print("patient_check result: {}".format(patient_check))
    practitioner_check = invoke_http(practitioner_url + "/{}".format(practitionerid), "GET")
    amqp_setup.channel.basic_publish(exchange=amqp_setup.exchangename, routing_key="practitioner_foreign_key_check.info", body="Checking if practitioner {} exists in database...".format(practitionerid), properties=pika.BasicProperties(delivery_mode=2))
    print("practitioner_check result: {}".format(practitioner_check))
    print()
    print()
    if patient_check['code'] != 200:
        amqp_setup.channel.basic_publish(exchange=amqp_setup.exchangename, routing_key="patient_foreign_key_check.error", body="An unregistered patient is trying to make a booking (process killed)", properties=pika.BasicProperties(delivery_mode=2))
        return patient_check
    
    if practitioner_check['code'] != 200:
        amqp_setup.channel.basic_publish(exchange=amqp_setup.exchangename, routing_key="practitioner_foreign_key_check.error", body="A patient is trying to make a booking with an unregistered practitioner (process killed)", properties=pika.BasicProperties(delivery_mode=2))
        return practitioner_check
    

    print("--------- Invoking booking microservice ---------")
    booking_result = invoke_http(booking_url, "POST", json=booking_json)
    print('booking_result:', booking_result)
    print()
    print()
    if booking_result['code'] >= 500:
        amqp_setup.channel.basic_publish(exchange=amqp_setup.exchangename, routing_key="booking.error", body="Error in creating booking (admin side)", properties=pika.BasicProperties(delivery_mode=2))
        return booking_result
    elif booking_result['code'] >= 400:
        amqp_setup.channel.basic_publish(exchange=amqp_setup.exchangename, routing_key="booking.error", body="Bad request, booking might already exists", properties=pika.BasicProperties(delivery_mode=2))
        return booking_result
    else:
        amqp_setup.channel.basic_publish(exchange=amqp_setup.exchangename, routing_key="booking.info", body="Created booking by patient {} for doctor {} at {}".format(nric, practitionerid, date_and_time), properties=pika.BasicProperties(delivery_mode=2))

    print("--------- Invoking email microservice ---------")
    email_result = invoke_http(email_url, "POST", email_json)
    print('email_result: {}'.format(email_result))


    return {
        "code": 201,
        "data":{
            "patient_result": patient_result,
            "unavailable_schedule_result": unavailable_schedule_result,
            "booking_result": booking_result
        }
    }


if __name__ == '__main__':
    print('this is flask for placing booking')
    app.run(host="0.0.0.0", port=5100, debug=True)