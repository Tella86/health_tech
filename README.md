# Ezems Health Tech System (EHTS) - ReadMe

## Project Overview
The Ezems Health Tech System (EHTS) is a comprehensive web application designed to streamline the management of hospital operations. Built using PHP and MariaDB, this system effectively organizes patient data, appointments, doctor specializations, and user activities. The EHTS includes functionalities for administrators, doctors, and patients, making hospital management more efficient and accessible.

## Technologies Used
- PHP
- MariaDB (SQL database)
- HTML/CSS for frontend
- phpMyAdmin for database management

## Database Schema
The database consists of the following tables:

### Tables and Their Descriptions

1. **admin**
   - **Fields:** id, username, password, updationDate
   - Stores administrator credentials and their last update time.
   - **Additional Features:** Admin can create Zoom meetings and chat rooms, control these sessions, and reply to emails through SMS on the system.

2. **appointment**
   - **Fields:** id, doctorSpecialization, doctorId, userId, consultancyFees, appointmentDate, appointmentTime, postingDate, userStatus, doctorStatus, updationDate
   - Manages appointments between users and doctors.

3. **doctors**
   - **Fields:** id, specilization, doctorName, address, docFees, contactno, docEmail, password, creationDate, updationDate
   - Contains information about doctors including their specialization and contact details.

4. **doctorslog**
   - **Fields:** id, uid, username, userip, loginTime, logout, status
   - Logs the login and logout activities of doctors.

5. **doctorspecilization**
   - **Fields:** id, specilization, creationDate, updationDate
   - Stores various doctor specializations.

6. **tblcontactus**
   - **Fields:** id, fullname, email, contactno, message, PostingDate, AdminRemark, LastupdationDate, IsRead
   - Manages contact messages from users including admin remarks.

7. **tblmedicalhistory**
   - **Fields:** ID, PatientID, BloodPressure, BloodSugar, Weight, Temperature, MedicalPres, CreationDate
   - Records the medical history of patients.

8. **tblpatient**
   - **Fields:** ID, Docid, PatientName, PatientContno, PatientEmail, PatientGender, PatientAdd, PatientAge, PatientMedhis, CreationDate, UpdationDate
   - Stores patient information including medical history and doctor assigned.

9. **userlog**
   - **Fields:** id, uid, username, userip, loginTime, logout, status
   - Logs the login and logout activities of users.

10. **users**
    - **Fields:** id, fullName, address, city, gender, email, password, regDate, updationDate
    - Contains information about users including their registration details.

## Features
- **User Management:** Registration, login, and logout functionalities for users and doctors.
- **Appointment Management:** Booking and managing appointments between patients and doctors.
- **Medical History:** Recording and viewing patients' medical history.
- **Contact Management:** Admin and user communication through contact messages.
- **Logging:** Tracking login and logout activities of users and doctors.

## Installation and Setup
1. Clone the repository to your local machine.
2. Import the provided SQL dump file into your MariaDB database using phpMyAdmin or command line.
3. Update the database connection settings in your PHP files.
4. Run the application on your local server.

## Project Modules

### Admin Module
- **Dashboard:** View statistics on patients, doctors, appointments, and new queries.
- **Doctors:** Add and manage doctor specializations, and maintain doctor records (Add/Update).
- **Users:** View details of users who have taken online appointments, and delete irrelevant users.
- **Patients:** View patient details.
- **Appointment History:** View the history of appointments.
- **Contact Us Queries:** View queries sent by users.
- **Doctor Session Logs:** Track the login and logout times of doctors.
- **User Session Logs:** Track the login and logout times of users.
- **Reports:** View reports of patients over specific periods.
- **Patient Search:** Search for patients by name and mobile number.
- **Admin Account Management:** Change admin password.
- **Zoom and Chat Room Control:** Create and manage Zoom meetings and chat rooms.
- **SMS Reply:** Reply to emails through SMS on the system.

### Patient Module
- **Dashboard:** View profile, appointments, and book new appointments.
- **Book Appointment:** Schedule new appointments.
- **Appointment History:** View personal appointment history.
- **Medical History:** View personal medical history.
- **Profile Management:** Update profile, change password, and recover password.
- **Contact Admin:** Contact the admin through the "Contact Us" section and receive instant replies via phone SMS, including Zoom and chat room details.

### Doctor Module
- **Dashboard:** View profile and online appointments.
- **Appointment History:** View patient appointment history.
- **Patients:** Manage patient records (Add/Update).
- **Search:** Search patients by name and mobile number.
- **Profile Management:** Update profile, change password, and recover password.

## Contact Information

**Author:** Ziroh Katana Mae  
**Contact:**  
- **Phone:** +254 101 086 1234  
- **P.O. Box:** 1333, Kilifi, Kenya  
- **Email:** [ezems.developers@gmail.com](mailto:ezems.developers@gmail.com) / [info@ezems.co.ke](mailto:info@ezems.co.ke)
