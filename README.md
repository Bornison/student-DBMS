# Student Database Management System (DBMS)

A college-level **Student Record Management System** developed in **PHP + MySQL**.  
This system allows users to **add, edit, delete, and manage student records** through a simple web interface.

Developed by **Bornison Okram**, B.Tech CSE student from Manipur, India.

## Project Goal

The goal of this project is to:

- Improve backend skills in **PHP** and **MySQL**  
- Understand the full workflow of a **CRUD application**  
- Learn to connect a frontend interface to a backend database  
- Gain hands-on experience building real-world web applications  

This project serves as a stepping stone toward becoming a **professional software engineer**.

## Project Overview

This system provides the following features:

- **Add student details** including name, roll number, and other info  
- **Edit or update existing records**  
- **Soft-delete students** (records are marked as deleted, not permanently removed)  
- **View and manage** the full list of students  
- Fully functional **web interface** with HTML/CSS, powered by PHP  
- All data stored securely in a **MySQL database**  

No frameworks were used — only **core PHP, MySQL, and HTML/CSS**.

## Who Is This For?
This project is ideal for:

- Students learning **PHP + MySQL**  
- Beginners building **working web applications**  
- College mini-project ideas  
- Anyone curious about **backend logic** and database management  

## Tech Stack
| Layer      | Technology                       |
|------------|----------------------------------|
| Frontend   | HTML, CSS                        |
| Backend    | PHP                              |
| Database   | MySQL                            |
| Server     | Apache (XAMPP / LAMP)            |
| Editor     | VS Code (Linux - Pop!_OS)        |

## Project Structure
├── backend
│   ├── add_student.php
│   ├── db_config.php
│   ├── delete_student.php
│   ├── edit_student.php
│   ├── permanent_delete.php
│   ├── recycle_bin.php
│   ├── register_student.php
│   ├── restore_student.php
│   ├── test.db.php
│   └── view_students.php
├── db
│   └── init.sql
├── frontend
│   ├── student_register.html
│   └── style.css
└── Readme.md

# How to Run the Project

1. **Clone the repository:**
```bash
git clone https://github.com/Bornison/student-dbms.git
cd student-dbms

# Features
Add, Edit, and Soft-Delete Student Records
Search and View All Students
Clean, responsive HTML/CSS interface
Database-driven backend with PHP + MySQL

# Limitations
No authentication system (anyone can access)
Works only on local servers (XAMPP/LAMP)
No advanced security features (SQL injection prevention is basic)

# Future Enhancements
Add login and role-based access
Add profile pictures for students
Implement search and filter by student attributes
Move to a modern PHP framework (Laravel / Symfony)
Deploy online using cloud hosting

# Author
Bornison Okram
B.Tech Computer Science Student
Linux & PHP Enthusiast

# License
This project is use for educational purposes only.
