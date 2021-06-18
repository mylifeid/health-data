# health-data
allow third party users to connect to users.mylifeid.com and fetch and put patient's data using their pocket cloud card ID

1.	Open the project folder in terminal/CMD, and run the following command:
composer require mylifeid/healthdata

2.	All the files and dependencies of the library will be installed. Open the class file where you need to use it. Put the following code at the beginning of your file, after the namespace statement (if any) along with other “use” statements:

use mylifeid\HealthData\DataExchange;

3.	Now, you are ready to use your library. This library class “DataExchange” defines 4 methods:
•	Public function authorize()
•	Public function defineRecordProperties()
•	Public function getRecords()
•	Public function putRecords()

A.	Authorize()
This method will be called at the beginning of each connection. The parameters required will be an array having following key elements:
company_name
ip_address
language
username
email_address
password

Once the user is authorized, you will receive 200 status and response with a JWT token. You need to pass this token in the remaining method calls as the “Authorization Bearer” in the header.

B.	defineRecordProperties()
This is the second method call after authorize() which defines the data set that needs to be accessed for your company. The token received in previous authorize() call will be sent in the header as “Authorization Bearer”. The parameter will be an array with the following key elements:

company_name
language
ip_address
record_set
api_direction
patient_set
record_type
record_privacy

If your company has the permission to access the data as specified in the request data (record_set, api_direction, patient_srt, record_type and record_privacy), you will receive 200 status with a success response message.

C.	getRecords()
Once you have the data set prepared for access in your company from the previous call defineRecordProperties(), you can now receive the data for the fields defined as the data set. You can either fetch the data for specific patients using their Pocket Cloud Card ID. The parameter for this call will be an array with the following key elements:

company_name
language
ip_address
patient_id
record_history_date


D.	putRecords()
In the previous call, you received the data set fields with value for all/specified patients. In this call, you can update the data for these fields. The parameter will be an array with following key elements:

company_name
language
ip_address
insert_data (this itself is an array of the fields and value with following elements)
	[patient_id
	fieldname
	value],
	[patient_id
	fieldname
	value], and so on.
