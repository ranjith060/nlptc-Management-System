/* ================================
   DATABASE
================================ */
CREATE DATABASE IF NOT EXISTS nlptc_management_system;
USE nlptc_management_system;


/* ================================
   COURSES
================================ */

CREATE TABLE courses (
    course_code VARCHAR(20) PRIMARY KEY,
    course_name VARCHAR(50) NOT NULL,
    approved_intake INT NOT NULL,
    duration_years INT NOT NULL,
    total_semesters INT NOT NULL,
    year_of_established INT NOT NULL,
    status ENUM('active', 'inactive') DEFAULT 'active',
);

INSERT INTO courses
(course_code, course_name, approved_intake, duration_years, total_semesters, year_of_established)VALUES
(1052, 'Diploma in Computer Engineering', 60, 3, 6, 2005),
(1053, 'Diploma in Mechanical Engineering', 60, 3, 6, 2008);


/* ================================
   SUBJECTS
================================ */
CREATE TABLE subjects (
    subject_code VARCHAR(20) PRIMARY KEY,
    course_code VARCHAR(20) NOT NULL,
    semester_number INT NOT NULL,
    subject_name VARCHAR(100) NOT NULL,
    L INT DEFAULT 0,
    T INT DEFAULT 0,
    P INT DEFAULT 0,
 
    min_pass_percentage DECIMAL(5,2) DEFAULT 35.00,
    max_percentage DECIMAL(5,2) DEFAULT 100.00,

    periods INT DEFAULT 0,
    credits INT DEFAULT 0,
    regulation VARCHAR(20) NOT NULL,   -
    subject_type ENUM(
        'Theory',
        'Practicum',
        'Practical/Lab',
        'Elective',
        'Project/Internship',
        'Advanced Skill Certification',
        'Integrated Learning Experience'
    ),

    end_exam ENUM('Theory','Practical','Project','NA') DEFAULT 'Theory',

    elective_type ENUM(
        'None',
        'Elective 1',
        'Elective 2',
        'Elective 3 (Pathway)',
        'Elective 4 (Specialisation)'
    ) DEFAULT 'None',
    
    FOREIGN KEY (course_code) REFERENCES courses(course_code)
);

/* ================================
   STUDENTS
================================ */
CREATE TABLE students (
    student_id VARCHAR PRIMARY KEY,
    student_name VARCHAR(100) NOT NULL,
    dob DATE,
    age INT,
    mother_tongue VARCHAR(20),
    gender VARCHAR(10),
    religion VARCHAR(20),
    community VARCHAR(20),
    caste VARCHAR(30),

    aadhar_no VARCHAR(12),
    umis_no VARCHAR(20),
    emis_no VARCHAR(20),

    blood_group VARCHAR(5),
    phone VARCHAR(15),
    email VARCHAR(100),
    address TEXT,
    student_photo VARCHAR(255),

    course_code INT NOT NULL,
    date_of_joining DATE,
    period_of_study VARCHAR(15),

    reg_no BIGINT NOT NULL UNIQUE,

    FOREIGN KEY (course_code) REFERENCES courses(course_code)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


/* ================================
   FACULTY
================================ */
CREATE TABLE faculty (
    faculty_id VARCHAR(20) PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(30) UNIQUE,
    phone VARCHAR(15),
    course_name VARCHAR(50),
    designation VARCHAR(50),
    qualification VARCHAR(100),
    specialization VARCHAR(100),
    pancard_id VARCHAR(10) UNIQUE,
    aadhar_id VARCHAR(12) UNIQUE,
    resume_pdf VARCHAR(255),       -- stored file path (PDF)
    profile_photo VARCHAR(255),    -- image file path
    date_of_joining DATE,
    date_of_relieving DATE,
    status ENUM('active', 'inactive') DEFAULT 'active',
    last_login DATETIME,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

/* ================================
   FEE STRUCTURE
================================ */
CREATE TABLE fee_structure (
    course_code INT,
    academic_year_id INT,
    tuition_fee INT,-------------------------------------------------------------------------------------------------------------------------------
    hostel_fee INT,
    transport_fee INT,
    other_fee INT,

    FOREIGN KEY (course_code) REFERENCES courses(course_code),
    FOREIGN KEY (academic_year_id) REFERENCES academic_years(academic_year_id)
);

/* ================================
   ACADEMIC PERIODS
================================ */
CREATE TABLE academic_periods (
    academic_year VARCHAR(9) NOT NULL,
    semester_number INT NOT NULL,
    study_year INT NOT NULL,                -- 1,2,3
    semester_type ENUM('Odd','Even') NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,

    PRIMARY KEY (academic_year, semester_number)
);

