CREATE DATABASE IF NOT EXISTS student_management;
USE student_management;

CREATE TABLE IF NOT EXISTS students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    roll_no VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    course VARCHAR(100) NOT NULL,
    batch VARCHAR(50) NOT NULL,
    address TEXT,
    admission_date DATE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO students (name, roll_no, email, phone, course, batch, address, admission_date)
VALUES
('Niharika Bansal', 'STU001', 'neha@example.com', '9876543210', 'UPSC Foundation', 'Morning', 'Delhi', '2026-06-01'),
('Tanya Sharma', 'STU002', 'riya@example.com', '9876500000', 'PCS', 'Evening', 'Rohini', '2026-06-05');
