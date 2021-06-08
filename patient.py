from flask import Flask, request, jsonify
from flask_sqlalchemy import SQLAlchemy
from os import environ


app = Flask(__name__)
app.config['SQLALCHEMY_DATABASE_URI'] = environ.get("dbURL") or 'mysql+mysqlconnector://root@localhost:3306/TCM_Patient'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False
app.config['SQLALCHEMY_ENGINE_OPTIONS'] = {'pool_recycle': 299}

db = SQLAlchemy(app)
 
class Patient(db.Model):
    __tablename__ = 'patient'
 
    nric = db.Column(db.String(9), primary_key=True)
    name = db.Column(db.String(100), nullable=False)
    phone = db.Column(db.Integer, nullable=False)
    email = db.Column(db.String(100), nullable=False)
 
    def __init__(self, nric, name, phone, email):
        self.nric = nric
        self.name = name
        self.phone = phone
        self.email = email
 
    def json(self):
        return {"nric": self.nric, "name": self.name, "phone": self.phone, "email": self.email}

@app.route("/patient", methods=['POST'])
def create_patient():
    
 
    data = request.get_json()
    patient = Patient(**data)
    nric = data['nric']

    if (Patient.query.filter_by(nric=nric).first()):
        return jsonify(
            {
                "code": 400,
                "data": {
                    "nric": nric
                },
                "message": "Patient already exists."
            }
        ), 400
    try:
        db.session.add(patient)
        db.session.commit()
    except:
        return jsonify(
            {
                "code": 500,
                "data": {
                    "nric": nric
                },
                "message": "An error occurred creating the patient record."
            }
        ), 500
 
    return jsonify(
        {
            "code": 201,
            "data": patient.json()
        }
    ), 201
    
@app.route("/patient/<string:nric>", methods=['GET'])
def search_patient(nric):

    if (Patient.query.filter_by(nric=nric).first()):
        return jsonify({
            "code": 200,
            "message": "Patient exists"
        }), 200
    else:
        return jsonify({
            "code": 404,
            "message": "Patient doesn't exist"
        }), 404
    
class Patient_Treatments(db.Model):
    __tablename__ = 'patient_treatments'
    
    nric = db.Column(db.String(9), primary_key=True)
    treatment = db.Column(db.String(1000), primary_key=True)

    def __init__(self, nric, past_treatment):
        self.nric = nric
        self.treatment = past_treatment
    
    def json(self):
        return {"nric": self.nric, "past_treatment": self.treatment}


@app.route("/patient_treatment", methods=["POST"])
def create_patient_treatment():
    data = request.get_json()
    print(data)
    patient_treatment = Patient_Treatments(**data)
    nric = data['nric']
    treatment = data['past_treatment']
    if (Patient_Treatments.query.filter_by(nric=nric, treatment=treatment)).first():
        return jsonify(
            {
                "code": 400,
                "message": "Past treatment already exist, skipping this step"
            }
        ), 400
    try:
        db.session.add(patient_treatment)
        db.session.commit()
    except:
        return jsonify(
            {
                "code": 500,
                "message": "An error occurred creating the patient past treatment record."
            }
        ), 500
 
    return jsonify(
        {
            "code": 201,
            "data": patient_treatment.json()
        }
    ), 201


if __name__ == '__main__':
    app.run(host="0.0.0.0", port=5000, debug=True)