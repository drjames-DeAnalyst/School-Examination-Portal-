CREATE DATABASE timzy_exam_portal;
USE timzy_exam_portal;

CREATE TABLE admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE teachers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255),
    class_assigned VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE sessions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    session_name VARCHAR(20),
    status ENUM('active','inactive') DEFAULT 'inactive'
);

CREATE TABLE classes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    class_name VARCHAR(50),
    section ENUM('Nursery','Primary','JSS','SSS')
);

CREATE TABLE subjects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    subject_name VARCHAR(100),
    section ENUM('Nursery','Primary','JSS','SSS')
);

CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100),
    gender ENUM('Male','Female'),
    class_id INT,
    passport VARCHAR(255),
    admission_no VARCHAR(50),
    FOREIGN KEY (class_id) REFERENCES classes(id)
);

CREATE TABLE scores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT,
    subject_id INT,
    first_test INT DEFAULT 0,
    second_test INT DEFAULT 0,
    exam INT DEFAULT 0,
    total INT DEFAULT 0,
    grade CHAR(1),
    term_id INT,
    session_id INT
);

CREATE TABLE attendance (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT,
    days_present INT,
    days_absent INT,
    term_id INT,
    session_id INT
);

CREATE TABLE psychomotor (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT,
    neatness INT,
    punctuality INT,
    honesty INT,
    leadership INT,
    term_id INT,
    session_id INT
);
