from flask import Flask, request, jsonify
from flask_sqlalchemy import SQLAlchemy
from datetime import datetime
from os import environ
import json
import pika
import amqp_setup

app = Flask(__name__)
app.config['SQLALCHEMY_DATABASE_URI'] = environ.get("dbURL") or 'mysql+mysqlconnector://root@localhost:3306/TCM_activity_log'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False
app.config['SQLALCHEMY_ENGINE_OPTIONS'] = {'pool_recycle': 299}
 
db = SQLAlchemy(app)

class Activity(db.Model):
    __tablename__ = 'activity_log'

    activity_log_id = db.Column(db.Integer, primary_key=True)
    activity_description = db.Column(db.String(1000), nullable=False)

    def __init__(self, activity_description):
        self.activity_description = activity_description

    def json(self):
        return {"activity_description": self.activity_description}

def create_activity_log(activity_description):
    with app.app_context():
        activity = Activity(activity_description)
        try:
            db.session.add(activity)
            db.session.commit()
            return jsonify(
                {
                    "code": 201,
                    "data": activity.json()
                }
            ), 201
        except:
            return jsonify(
                {
                    "code": 500,
                    "message": "Connection is not open... something went wrong"
                }
            )    



def callback(channel, method, properties, body):
    create_activity_log(body)

def receiveBookingLog():
    with app.app_context():

        amqp_setup.check_setup()
        amqp_setup.channel.basic_consume(queue='Activity_Log', on_message_callback=callback, auto_ack=True)
        amqp_setup.channel.start_consuming()

print("calling activity log service")
receiveBookingLog()