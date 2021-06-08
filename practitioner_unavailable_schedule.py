from flask import Flask, request, jsonify, Response
from flask_sqlalchemy import SQLAlchemy
from os import environ
from flask_cors import CORS

app = Flask(__name__)
CORS(app)

app.config['SQLALCHEMY_DATABASE_URI'] = environ.get("dbURL") or 'mysql+mysqlconnector://root@localhost:3306/TCM_Practitioner'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False
app.config['SQLALCHEMY_ENGINE_OPTIONS'] = {'pool_recycle': 299}

db = SQLAlchemy(app)

class Practitioner_Unavailable_Schedule(db.Model):
    __tablename__ = 'PRACTITIONER_UNAVAILABLE_Schedule'

    practitionerid = db.Column(db.Integer, primary_key=True)
    date_and_time = db.Column(db.DateTime, primary_key=True)

    def __init__(self, practitionerid, date_and_time):
        self.practitionerid = practitionerid
        self.date_and_time = date_and_time

    def json(self):
        return {'practitionerid': self.practitionerid, 'date_and_time': self.date_and_time}

@app.route("/unavailable-schedule/<string:PractitionerID>", methods=['GET'])
def get_all_timing(PractitionerID):
    timing = Practitioner_Unavailable_Schedule.query.filter_by(practitionerid=PractitionerID).all()
    if len(timing):
        return jsonify({
            "code": 200,
            "data": {
                "practitioner": [time.json() for time in timing]
            }
        })
    return jsonify({
        "code": 404,
        "message": "There are no unavailable schedules for this practitioner."
    }), 404

@app.route("/unavailable-schedule", methods=['POST'])
def add_unavailable_date_and_time():
    
    data = request.get_json()
    print(data)
    unavailable = Practitioner_Unavailable_Schedule(**data)
    practitionerid = data['practitionerid']
    date_and_time = data['date_and_time']
    if (Practitioner_Unavailable_Schedule.query.filter_by(practitionerid=practitionerid, date_and_time=date_and_time).first()):
        return jsonify(
            {
                "code": 400,
                "message": "Appointment exists."
            }
        ), 400
    try:
        db.session.add(unavailable)
        db.session.commit()
        print(100)
    except:
        return jsonify(
            {
                "code": 500,
                "message": "An error occurred while adding unavalability."
            }
        ), 500
 
    return jsonify(
        {
            "code": 201,
            "data": unavailable.json()
        }
    ), 201
 
if __name__ == '__main__':
    app.run(host="0.0.0.0", port=5002, debug=True)
