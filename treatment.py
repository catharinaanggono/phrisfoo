from flask import Flask, request, jsonify
from flask_sqlalchemy import SQLAlchemy
from flask_cors import CORS
from os import environ

app = Flask(__name__)
CORS(app)

app.config['SQLALCHEMY_DATABASE_URI'] = environ.get("dbURL") or 'mysql+mysqlconnector://root@localhost:3306/TCM_treatment'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False
app.config['SQLALCHEMY_ENGINE_OPTIONS'] = {'pool_recycle': 299}
 
db = SQLAlchemy(app)
 
class Treatment(db.Model):
    __tablename__ = 'treatment'
 
    treatmentid = db.Column(db.Integer, primary_key=True)
    title = db.Column(db.String(150), nullable=False)
    pricing = db.Column(db.Float(precision=2), nullable=False)
 
    def __init__(self, treatmentid, title, pricing):
        self.treatmentid = treatmentid
        self.title = title
        self.pricing = pricing
 
    def json(self):
        return {"treatmentid": self.treatmentid, "title": self.title, "pricing": self.pricing}
 

@app.route("/treatment")
def get_all():
    treatmentlist = Treatment.query.all()
    if len(treatmentlist):
        return jsonify(
            {
                "code": 200,
                "data": {
                    "treatments": [treatment.json() for treatment in treatmentlist]
                }
            }
        )
    return jsonify(
        {
            "code": 404,
            "message": "There are no treatments."
        }
    ), 404

if __name__ == '__main__':
    app.run(host="0.0.0.0", port=5004, debug=True)





