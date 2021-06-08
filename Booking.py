from flask import Flask, request, jsonify
from flask_sqlalchemy import SQLAlchemy
from flask_cors import CORS
from os import environ

app = Flask(__name__)
app.config['SQLALCHEMY_DATABASE_URI'] = environ.get("dbURL") or 'mysql+mysqlconnector://root@localhost:3306/TCM_Booking'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False
app.config['SQLALCHEMY_ENGINE_OPTIONS'] = {'pool_recycle': 299}

CORS(app)

db = SQLAlchemy(app)

class Appointment(db.Model):
    __tablename__ = "Booking"
    
    nric = db.Column(db.String(9), nullable=False)
    problem = db.Column(db.String(10000), nullable=False)
    practitionerid = db.Column(db.Integer, nullable=False, primary_key=True)
    date_and_time = db.Column(db.DateTime, nullable=False, primary_key=True)

    def __init__(self, nric, problem, practitionerid, date_and_time):
        self.nric = nric
        self.problem = problem
        self.practitionerid = practitionerid
        self.date_and_time = date_and_time

    def json(self):
        return {"nric": self.nric, "problem": self.problem, "practitionerid" : self.practitionerid, "date_and_time": self.date_and_time}



@app.route("/booking", methods=["POST"])
def create_booking():
    data = request.get_json()
    booking = Appointment(**data)
    print(data)
    practitionerid = data['practitionerid']
    date_and_time = data['date_and_time']



    if (Appointment.query.filter_by(practitionerid=practitionerid, date_and_time=date_and_time).first()):
        return jsonify(
            {
                "code": 400,
                "message": "Booking already exists."
            }
        ), 400
    try:
        db.session.add(booking)
        db.session.commit()
    except:
       return jsonify(
           {
                "code": 500,
                "message": "An error occurred in creating a booking."
           }
       ), 500
 
    return jsonify(
        {
            "code": 201,
            "data": booking.json()
        }
    ), 201

class Booking_Pending(db.Model):
    __tablename__ = "booking_pending"

    practitionerid = db.Column(db.Integer, nullable = False, primary_key = True)
    date_and_time = db.Column(db.DateTime, nullable = False, primary_key = True)
    
    def __init__(self, practitionerid, date_and_time):
        self.practitionerid = practitionerid
        self.date_and_time = date_and_time

    def json(self):
        return {"practitionerid": self.practitionerid, "date_and_time": self.date_and_time}
    
@app.route("/booking_pending", methods = ["POST"])
def create_booking_pending():
    data = request.get_json()
    booking_pending = Booking_Pending(**data)
    practitionerid = data['practitionerid']
    date_and_time = data['date_and_time']
    if (Booking_Pending.query.filter_by(practitionerid=practitionerid, date_and_time=date_and_time).first()):
        return jsonify(
            {
                "code": 400,
                "message": "Booking already exists"
            }
        ), 400
    try:
        db.session.add(booking_pending)
        db.session.commit()
    except:
        return jsonify(
            {
                "code": 500,
                "message": "An error in creating a pending booking"
            }
        ), 500
    return jsonify(
        {
            "code": 201,
            "data": booking_pending.json()
        }
    ), 201


if __name__ == '__main__':
    app.run(host="0.0.0.0", port=5003, debug=True)