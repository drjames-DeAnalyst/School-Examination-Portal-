Project Title

Timzy Exam Portal

School Name

Timzy International Education Centre, Ekpoma, Edo State

Developed By

DR WEB INSTITUTE


---

1. What This Project Is

Timzy Exam Portal is a full-featured school result management system built to modern standards. It is designed to function both as a web-based portal and as a future-ready backend for mobile applications.

The system automates:

Student registration

Teacher score entry

Result computation

Grade generation

Term/session management

Professional PDF result generation


⚠️ This project is intended for local deployment (XAMPP) and institutional use, not public SaaS hosting without further hardening.


---

2. Core Features

Admin Features

Secure admin login (email + strong password)

Create and manage:

Academic sessions

School terms

Classes (Nursery, Primary, JSS, SSS)

Subjects per class category


Register teachers and assign classes

Register students with:

Full name

Gender

Passport photograph upload

Admission number


View and control all results

Generate and print student result PDFs

Reuse portal every new academic term


Teacher Features

Secure teacher registration and login

Email used as username

Strong password enforcement

Automatic access to assigned class

View student list with passport

Enter scores for each subject:

First Test (15 marks)

Second Test (15 marks)

Examination (70 marks)


Automatic total and grade calculation

Enter attendance records

Enter psychomotor and affective domain scores


Result & Academic Features

Automated grading system

No manual total entry (system-controlled)

Attendance tracking per term

Psychomotor and affective domain evaluation

Teacher and principal remarks


PDF Result Output

One-page PDF

Landscape orientation

Thick yellow background

School name watermark

School logo included

Student passport displayed

Professional exam-standard layout



---

3. Grading System

Grade	Score Range

A	70 – 100
B	60 – 69
C	50 – 59
D	45 – 49
F	0 – 44


All grading is automatically handled by the system.


---

4. Technology Stack

Backend

PHP (procedural, structured)

MySQL database


Frontend

HTML

Inline CSS (blue, red, black theme)

Responsive layout


PDF Generation

DOMPDF


Server

XAMPP (Apache + MySQL)



---

5. Project Folder Structure

timzy_exam_portal/
│── admin/
│   ├── dashboard.php
│   ├── students.php
│   ├── teachers.php
│   └── subjects.php
│
│── teacher/
│   ├── dashboard.php
│   ├── students.php
│   ├── scores.php
│   ├── attendance.php
│   └── psychomotor.php
│
│── config/
│   └── db.php
│
│── uploads/
│   └── student_passports/
│
│── vendor/
│   └── dompdf/
│
│── generate_result.php
│── login.php
│── logout.php
│── index.php


---

6. Installation & Setup (Exact Steps)

Step 1: Install XAMPP

Download and install XAMPP

Start Apache and MySQL


Step 2: Create Project Folder

C:\xampp\htdocs\timzy_exam_portal

Step 3: Copy Project Files

Copy all PHP files and folders into the project directory


Step 4: Create Database

Open browser and visit: http://localhost/phpmyadmin

Create a new database:

timzy_exam_portal


Step 5: Import Database Tables

Run all SQL files provided for:

users

teachers

students

classes

subjects

scores

attendance

psychomotor



Step 6: Configure Database Connection

Edit:

config/db.php

Update credentials if needed:

$conn = new mysqli("localhost", "root", "", "timzy_exam_portal");

Step 7: Access the Portal

Admin login: http://localhost/timzy_exam_portal/admin

Teacher login: http://localhost/timzy_exam_portal/teacher



---

7. How Result Generation Works

1. Admin creates session and term


2. Admin registers students and subjects


3. Teacher logs in and selects class


4. Teacher enters scores


5. System automatically calculates:

Total

Grade

Average



6. Admin or teacher clicks Generate Result


7. One-page PDF opens for printing or download




---

8. Security Notes (Important)

Passwords are hashed using password_hash()

Users are session-controlled

Teachers only see assigned classes

Results are system-calculated to prevent manipulation


⚠️ For production use:

Enable HTTPS

Restrict database privileges

Add input validation & CSRF protection



---

9. Future Upgrade Possibilities

Student/parent login portal

PIN-based result checking

SMS & email notifications

Class position ranking

Online payment integration

Mobile app (Flutter / React Native)



---

10. Business Value

This project is suitable for:

Private schools

International schools

Montessori schools

Secondary schools


Estimated value:

Small schools: ₦150,000 – ₦300,000

Standard schools: ₦500,000 – ₦1,000,000+



---

11. GitHub Usage & Presentation

Recommended Repo Structure

Keep the repository clean and professional:

Commit database SQL files in a /database folder

Add sample screenshots in /docs/screenshots

Include a .gitignore for /vendor, /uploads, and local configs


Demo (Local)

Admin URL: http://localhost/timzy_exam_portal/admin

Teacher URL: http://localhost/timzy_exam_portal/teacher


> Tip: Add screenshots of the Admin Dashboard, Teacher Score Entry, and Generated PDF result to increase credibility.




---

12. License

This project is released for educational and commercial demonstration.

For resale or deployment to institutions, ensure:

Proper agreement with clients

Secure hosting and data protection compliance



---

13. Contributing

Pull requests are welcome for:

UI improvements

Security hardening

Mobile API extensions


Please open an issue before major changes.


---

14. Final Note

Timzy Exam Portal is a commercial-grade educational system, not a demo project. It is designed to impress school owners, administrators, and parents while remaining easy to operate by staff.

Powered by DR WEB INSTITUTE

Timzy Exam Portal is a commercial-grade educational system, not a demo project. It is designed to impress school owners, administrators, and parents while remaining easy to operate by staff.

Powered by DR WEB INSTITUTE