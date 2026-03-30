CREATE DATABASE kitere_cbc_exam_system;

USE kitere_cbc_exam_system;



CREATE TABLE users (
id INT AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(50) UNIQUE,
password VARCHAR(100),
role VARCHAR(20)
);

INSERT INTO users(username,password,role) VALUES
('admin','admin123','admin'),
('teacher1','1234','teacher');



CREATE TABLE students (
id INT AUTO_INCREMENT PRIMARY KEY,
student_code VARCHAR(20) UNIQUE,
name VARCHAR(100),
gender VARCHAR(10),
class VARCHAR(50),
stream VARCHAR(50),
parent_name VARCHAR(100),
parent_phone VARCHAR(20),
date_registered TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE teachers (
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(100),
subject VARCHAR(100),
phone VARCHAR(20),
email VARCHAR(100)
);



CREATE TABLE subjects (
id INT AUTO_INCREMENT PRIMARY KEY,
subject_name VARCHAR(100)
);

INSERT INTO subjects(subject_name) VALUES
('Mathematics'),
('English'),
('Kiswahili'),
('Science'),
('Social Studies'),
('CRE');


CREATE TABLE teacher_subjects (
id INT AUTO_INCREMENT PRIMARY KEY,
teacher_id INT,
subject_id INT,
class VARCHAR(50)
);

CREATE TABLE marks (
id INT AUTO_INCREMENT PRIMARY KEY,
student_id INT,
subject VARCHAR(100),
marks INT,
grade VARCHAR(5),
term VARCHAR(20),
year INT,
date_recorded TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE attendance (
id INT AUTO_INCREMENT PRIMARY KEY,
student_id INT,
class VARCHAR(50),
stream VARCHAR(50),
term VARCHAR(20),
date DATE,
status VARCHAR(20)
);


CREATE TABLE timetable (
id INT AUTO_INCREMENT PRIMARY KEY,
class VARCHAR(50),
stream VARCHAR(50),
day VARCHAR(20),
subject VARCHAR(100),
time_start TIME,
time_end TIME,
term VARCHAR(20)
);


CREATE TABLE fees (
id INT AUTO_INCREMENT PRIMARY KEY,
student_id INT,
term VARCHAR(20),
year INT,
total_fees INT,
amount_paid INT,
balance INT,
payment_date DATE DEFAULT CURRENT_DATE
);


CREATE TABLE streams (
id INT AUTO_INCREMENT PRIMARY KEY,
class VARCHAR(50),
stream VARCHAR(50)
);

INSERT INTO streams(class,stream) VALUES
('Grade 6','East'),
('Grade 6','West'),
('Grade 7','North');

CREATE TABLE notifications (
id INT AUTO_INCREMENT PRIMARY KEY,
student_id INT,
parent_phone VARCHAR(20),
message TEXT,
date_sent TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);



CREATE TABLE exams (
id INT AUTO_INCREMENT PRIMARY KEY,
exam_name VARCHAR(50),
term VARCHAR(20),
year INT
);


CREATE TABLE report_comments (
id INT AUTO_INCREMENT PRIMARY KEY,
student_id INT,
comment TEXT,
term VARCHAR(20),
year INT
);