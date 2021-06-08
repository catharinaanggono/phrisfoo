from flask import Flask, request, jsonify
from flask_mail import Mail, Message
import requests

app = Flask(__name__)
mail= Mail(app)

app.config['MAIL_SERVER']='smtp.gmail.com'
app.config['MAIL_PORT'] = 465
app.config['MAIL_USERNAME'] = 'phrisctcm@gmail.com'
app.config['MAIL_PASSWORD'] = 'hello_123'
app.config['MAIL_USE_TLS'] = False
app.config['MAIL_USE_SSL'] = True
mail = Mail(app)

@app.route("/email", methods=["POST"])
def send_email():
    data = request.get_json()
    recipients = data['recipients']
    name = data['name']
    phone = data['phone']
    date_and_time = data['date_and_time'] 

    try:
        msg = Message('TCM Booking Confirmation', sender = 'phrisctcm@gmail.com', recipients = [recipients])
        msg.body = "Your TCM Booking has been confirmed! Please show this booking summary written below when you arrive at PhrisFoo TCM.\n\nBooking details\nPatient Name: " + name + "\nPhone: " + phone + "\nDate and time: " + date_and_time + "\n\nThis is an Auto-Generated Email. Please Do Not Reply. "
        mail.send(msg)

        return jsonify(
            {
                "code": 201,
                "data": {
                    "recipients" : recipients,
                    "name" : name,
                    "phone" : phone,
                    "date_and_time" : date_and_time
                    }
            }
        ), 200

    except:
        return jsonify(
            {
                "code": 500,
                "message": "An error occurred while trying to send email."
            }
        ), 500

    return jsonify({
        "code": 400,
        "message": "Invalid JSON input: " + str(request.get_data())
    }), 400
   

if __name__ == '__main__':
   app.run(host="0.0.0.0", debug = True, port=5005)