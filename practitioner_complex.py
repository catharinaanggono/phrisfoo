from flask import Flask, request, jsonify
from flask_cors import CORS
from os import environ
import json
import pika
import requests

from invoker import invoke_http

app = Flask(__name__)
CORS(app)


practitioner_url = environ.get("practitioner_url") or "http://localhost:5001/practitioner"
practitioner_language_url = environ.get("practitioner_language_url") or "http://localhost:5001/practitioner-language/"
practitioner_degree_url = environ.get("practitioner_degree_url") or "http://localhost:5001/practitioner-degree/"


@app.route("/get_practitioners_details")
def get_practitioners():
    print("----- Invoking practitioner microservice to get all practitioners -----")
    all_practs = invoke_http(practitioner_url)["data"]["practitioner"]
    for i in range(len(all_practs)):
        practitionerid = all_practs[i]['PractitionerID']
        print("----- Invoking practitioner microservice to get languages for practitioner {} -----".format(practitionerid))
        pract_language = invoke_http(practitioner_language_url + str(practitionerid))['data']
        all_practs[i]['language'] = pract_language[str(practitionerid)]
        print("----- Invoking practitioner microservice to get degrees for practitioner {} -----".format(practitionerid))
        pract_degree = invoke_http(practitioner_degree_url + str(practitionerid))['data']
        all_practs[i]['degree'] = pract_degree[str(practitionerid)]
    if len(all_practs):
        return {
            "code": 200,
            "practitioners": all_practs
        }
    else:
        return {
            "code": 404,
            "message": "There are no practitioners registered."
        }


if __name__ == "__main__":
    app.run(host="0.0.0.0", port=5111, debug=True)