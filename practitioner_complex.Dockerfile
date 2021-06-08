FROM python:3-slim
WORKDIR /usr/src/app
COPY requirements.txt invoker.py ./
RUN pip install --no-cache-dir -r requirements.txt
COPY ./practitioner_complex.py ./invoker.py ./
CMD [ "python", "./practitioner_complex.py" ]