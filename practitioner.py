from flask import Flask, request, jsonify
from flask_sqlalchemy import SQLAlchemy
from os import environ
from flask_cors import CORS

app = Flask(__name__)
CORS(app)

app.config['SQLALCHEMY_DATABASE_URI'] = environ.get("dbURL") or "mysql+mysqlconnector://root@localhost:3306/TCM_Practitioner"
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False
app.config['SQLALCHEMY_POOL_TIMEOUT'] = 86400
app.config['SQLALCHEMY_ENGINE_OPTIONS'] = {'pool_recycle': 299}

db = SQLAlchemy(app)


class Practitioner(db.Model):
    __tablename__ = 'Practitioner'

    PractitionerID = db.Column(db.Integer, primary_key=True)
    NRIC = db.Column(db.String(9), nullable=False)
    NAME = db.Column(db.String(100), nullable=False)
    PHONE = db.Column(db.Integer, nullable=False)
    TITLE = db.Column(db.String(100), nullable=False)
    GENDER = db.Column(db.String(1), nullable=False)
    PASSWORD = db.Column(db.String(100), nullable=False)

    def __init__(self, PractitionerID, NRIC, NAME, PHONE, TITLE, GENDER, PASSWORD):
        self.PractitionerID = PractitionerID
        self.NRIC = NRIC
        self.NAME = NAME
        self.PHONE = PHONE
        self.TITLE = TITLE
        self.GENDER = GENDER
        self.PASSWORD = PASSWORD

    def json(self):
        return{"PractitionerID": self.PractitionerID, "NRIC": self.NRIC, "NAME": self.NAME, "PHONE": self.PHONE, "TITLE": self.TITLE, "GENDER": self.GENDER, "PASSWORD": self.PASSWORD}



@app.route('/practitioner_login', methods=["POST"])
def get_practitioner_id():
    data = request.get_json()
    practitionerid = data['practitionerid']
    password = data['password']
    practitioner = Practitioner.query.filter_by(PractitionerID=practitionerid, PASSWORD=password).first()
    if practitioner:
        return jsonify({
            "code": 201,
        })
    return jsonify({
        "code": 404,
        "message": "Authentication failed, account doesn't exist."
    }), 404


@app.route('/practitioner')
def get_all():
    practitioner = Practitioner.query.all()
    if len(practitioner):
        return jsonify({
            "code": 200,
            "data": {
                "practitioner": [pract.json() for pract in practitioner]
            }
        })
    return jsonify({
        "code": 404,
        "message": "There are no practitoners."
    }), 404

@app.route('/practitioner/<string:practitionerid>')
def get_practitioner(practitionerid):
    if (Practitioner.query.filter_by(PractitionerID=practitionerid).first()):
        return jsonify({
            "code": 200,
            "message": "Practitioner exists"
        }), 201
    else:
        return jsonify({
            "code": 404,
            "message": "Practitioner doesn't exist"
        }), 404


class Practitioner_Language(db.Model):
    __tablename__ = 'practitioner_language'

    practitionerid = db.Column(db.Integer, primary_key = True)
    language = db.Column(db.String(100), primary_key = True)

    def __init__(self, practitionerid, language):
        self.practitionerid = practitionerid
        self.language = language

    def json(self):
        return {"practitionerid": self.practitionerid, "language": self.language}

@app.route('/practitioner-language/<string:practitionerid>')
def get_languages(practitionerid):
    practitioner = Practitioner_Language.query.filter_by(practitionerid=practitionerid).all()
    return_dict = {}
    for i in range(len(practitioner)):
        if practitioner[i].practitionerid in return_dict:
            return_dict[practitioner[i].practitionerid].append(practitioner[i].language)
        else:
            return_dict[practitioner[i].practitionerid] = [practitioner[i].language]
    if len(practitioner):
        return jsonify({
            "code": 200,
            "data": return_dict
        })
    return jsonify({
        "code": 404,
        "message": "This practitioner does not have any languages spoken registered"
    })

class Practitioner_Degree(db.Model):
    __tablename__ = 'practitioner_degree'

    practitionerid = db.Column(db.Integer, primary_key = True)
    degree = db.Column(db.String(100), primary_key = True)

    def __init__(self, practitionerid, degree):
        self.practitionerid = practitionerid
        self.degree = degree

    def json(self):
        return {"practitionerid": self.practitionerid, "degree": self.degree}

@app.route('/practitioner-degree/<string:practitionerid>')
def get_degrees(practitionerid):
    practitioner = Practitioner_Degree.query.filter_by(practitionerid=practitionerid).all()
    return_dict = {}
    for i in range(len(practitioner)):
        if practitioner[i].practitionerid in return_dict:
            return_dict[practitioner[i].practitionerid].append(practitioner[i].degree)
        else:
            return_dict[practitioner[i].practitionerid] = [practitioner[i].degree]
    if len(practitioner):
        return jsonify({
            "code": 200,
            "data": return_dict
        })
    return jsonify({
        "code": 404,
        "message": "This practitioner does not have any degrees registered"
    })

if __name__ == '__main__':
    app.run(host="0.0.0.0", port=5001, debug=True)

