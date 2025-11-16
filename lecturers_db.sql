-- =====================================================
-- Database: lecturers_db
-- Tables: lecturers, courses, schedules
-- =====================================================

CREATE DATABASE IF NOT EXISTS lecturers_db;
USE lecturers_db;

-- =====================================================
-- Table: lecturers (tabel utama)
-- =====================================================
CREATE TABLE lecturers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    nidn VARCHAR(20) NOT NULL,
    phone VARCHAR(20),
    join_date DATE
);

-- ============================
-- Table: courses
-- 1 lecturer bisa ngajar banyak courses
-- lecturers.id -> courses.lecturer_id
-- ============================
CREATE TABLE courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    lecturer_id INT NOT NULL,
    course_name VARCHAR(100) NOT NULL,
    credits INT DEFAULT 3,
    FOREIGN KEY (lecturer_id) REFERENCES lecturers(id)
        ON DELETE CASCADE ON UPDATE CASCADE
);

-- ============================
-- Table: schedules
-- 1 course bisa memiliki banyak schedules
-- courses.id -> schedules.course_id
-- ============================
CREATE TABLE schedules (
    id INT AUTO_INCREMENT PRIMARY KEY,
    course_id INT NOT NULL,
    day ENUM('Monday','Tuesday','Wednesday','Thursday','Friday') NOT NULL,
    time TIME NOT NULL,
    room VARCHAR(50),
    FOREIGN KEY (course_id) REFERENCES courses(id)
        ON DELETE CASCADE ON UPDATE CASCADE
);

-- ============================
-- Data hardcode
-- ============================

-- =====================================================
-- Insert Data: lecturers
-- =====================================================
INSERT INTO lecturers (name, nidn, phone, join_date) VALUES
('Andi Prasetyo', '12345678', '081234567890', '2020-02-10'),
('Dewi Lestari', '87654321', '089876543210', '2021-07-15'),
('Budi Santoso', '11223344', '082233445566', '2019-11-30');

-- =====================================================
-- Insert Data: courses
-- =====================================================
INSERT INTO courses (lecturer_id, course_name, credits) VALUES
(1, 'Data Structures', 3),
(1, 'Algorithms', 4),
(2, 'Database Systems', 3),
(3, 'Web Programming', 3);

-- =====================================================
-- Insert Data: schedules
-- =====================================================
INSERT INTO schedules (course_id, day, time, room) VALUES
(1, 'Monday', '08:00:00', 'A101'),
(1, 'Wednesday', '10:00:00', 'A203'),
(2, 'Tuesday', '13:00:00', 'B201'),
(3, 'Thursday', '09:00:00', 'C302'),
(4, 'Friday', '15:00:00', 'D105');