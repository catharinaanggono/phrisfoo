FROM python:3-slim
WORKDIR /usr/src/app
COPY requirements.txt ./
RUN pip install --no-cache-dir -r requirements.txt
COPY ./place_booking.py ./amqp_setup.py ./invoker.py ./
CMD [ "python", "./place_booking.py" ]