from flask import Flask, request, jsonify
from flask_sqlalchemy import SQLAlchemy
from datetime import datetime
from os import environ
import json
import pika
import amqp_setup

app = Flask(__name__)
app.config['SQLALCHEMY_DATABASE_URI'] = environ.get("dbURL") or 'mysql+mysqlconnector://root@localhost:3306/TCM_error_log'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False
app.config['SQLALCHEMY_ENGINE_OPTIONS'] = {'pool_recycle': 299}
 
db = SQLAlchemy(app)

class Error(db.Model):
    __tablename__ = 'error_log'

    error_log_id = db.Column(db.Integer, primary_key=True)
    error_description = db.Column(db.String(1000), nullable=False)

    def __init__(self, error_description):
        self.error_description = error_description

    def json(self):
        return {"error_description": self.error_description}

def create_error_log(error_description):
    with app.app_context():
        error = Error(error_description)
        try:
            db.session.add(error)
            db.session.commit()
            return jsonify(
                {
                    "code": 201,
                    "data": error.json()
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
    create_error_log(body)

def receiveErrorLog():
    with app.app_context():

        amqp_setup.check_setup()
        amqp_setup.channel.basic_consume(queue='Error', on_message_callback=callback, auto_ack=True)
        amqp_setup.channel.start_consuming()

if __name__ == '__main__':
    receiveErrorLog()