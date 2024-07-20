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
   - **Fields:** ID, PatientID, BloodPressure, BloodSugar, Weight, Temperature, MedicalPres, NextVisitDate, CreationDate
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

11. **category_list**
    - **Fields:** id, name, description, status, delete_flag, date_created, date_updated
    - Manages categories for discussion posts.

12. **comment_list**
    - **Fields:** id, user_id, post_id, comment, date_created
    - Stores comments on posts by users.

13. **meetings**
    - **Fields:** id, title, start, end, link
    - Manages scheduled meetings with links.

14. **messages**
    - **Fields:** id, name, email, mobileno, message, reply, created_at
    - Stores messages sent by users and admin replies.

15. **messages_chat**
    - **Fields:** id, username, message, timestamp, read
    - Manages chat messages and their read status.

16. **notifications**
    - **Fields:** id, notification, is_read, created_at
    - Stores notifications for users.

17. **post_list**
    - **Fields:** id, user_id, category_id, title, content, status, delete_flag, date_created, date_updated
    - Manages posts made by users.

18. **system_info**
    - **Fields:** id, meta_field, meta_value
    - Stores system metadata.

## Features
- **User Management:** Registration, login, and logout functionalities for users and doctors.
- **Appointment Management:** Booking and managing appointments between patients and doctors.
- **Medical History:** Recording and viewing patients' medical history.
- **Contact Management:** Admin and user communication through contact messages.
- **Logging:** Tracking login and logout activities of users and doctors.
- **Meetings Management:** Schedule and manage meetings with links.
- **Chat Room:** Real-time chat functionality for users.
- **Instant Reply via SMS:** Patients can contact admin through "Contact Us" and get instant replies via phone SMS.

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
- **Meetings Management:** Create and manage Zoom meetings.
- **Chat Room Control:** Oversee chat room activities.
- **Instant Email Replies via SMS:** Reply to emails through SMS.

### Patient Module
- **Dashboard:** View profile, appointments, and book new appointments.
- **Book Appointment:** Schedule new appointments.
- **Appointment History:** View personal appointment history.
- **Medical History:** View personal medical history.
- **Profile Management:** Update profile, change password, and recover password.
- **Contact Admin:** Use the "Contact Us" form to get instant replies via phone SMS.
- **Zoom Meetings:** Access scheduled Zoom meetings.
- **Chat Room:** Engage in real-time chat.

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