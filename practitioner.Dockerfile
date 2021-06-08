FROM python:3-slim
WORKDIR /usr/src/app
COPY requirements.txt ./
RUN pip install --no-cache-dir -r requirements.txt
COPY ./practitioner.py .
CMD [ "python", "./practitioner.py" ]

