# PhrisFoo TCM

## Build Setup (Preferably run on windows)

1. Unpack the zip file and place the folder under your WAMP/MAMP root directory
2. Run WAMP (on Windows) or MAMP (on MacOS) Server
3. Go to phpmyadmin, login, and select the “SQL” tab
4. Copy the contents of Database_init.sql and paste them into the “SQL” tab (see note no. 3)
5. Run Docker
6. Open CMD and move to the TCM directory
7. Run “docker-compose up -d” on CMD (this will take awhile)


## If running on MAMP, please do following steps:
Go to the MAMP phpmyadmin. Under the SQL tab, please run the following code. 
“SET GLOBAL event_scheduler = ON;” -- Please run this everytime MAMP server is restarted (unless the default has been set to set event_scheduler to be on)

There is a known bug whereby the “Book Now” button sometimes doesn’t work on Mac. If this happens, simply refresh the page and it should work just fine.

## Login options

1. For practitioner to make his unavailable schedule: 
ID: 1
Password: hello_123

2. Paypal sandbox account to make booking
email: catharinaa.2019@smu.edu.sg
password: hello_123


Notes:
1. SMSMode API only allows 20 free messages and Mailboxlayer only allows 250 email validity checks, we have set up a new account for the purpose of grading. If more than 20 checks are needed, please message Wellson at slack or email wellsonah.2019@smu.edu.sg. 

2. Google Maps API is currently implemented under an account with free credits. Please do not spam-refresh the home page so that it does not run out of the free credits. (It will still work, but our credit card will be charged).

3. Regarding step 4 of build setup, the same result can be achieved by importing the Database_init.sql file directly but it may not always work due to the phpmyadmin user creation query, therefore please do step 4 (i.e., copy and paste) instead.
This could be solved by flushing privileges in mysql (i.e., inserting a “FLUSH PRIVILEGES;” line. We tested this and it works, but it may be safer to copy and paste still.

4. ENSURE all services are running before conducting the scenarios (some services such as activity_log, error_log, and place_booking will take a while before being fully up due to rabbitmq setup time).
