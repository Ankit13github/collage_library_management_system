# Library Management System

## Description
The **Library Management System** is a web-based application developed using **HTML, CSS, JavaScript, Bootstrap, and PHP** with **MySQL** as the database. This system helps manage library books, student records, book issues, returns, and fines efficiently.

## Features
- Student and Admin login
- Student signup feature
- Book search (by name or author)
- Issuing and returning books
- Fine calculation for late returns
- Admin dashboard to manage students, books, and fines
- Feedback system for students
- Book statistics and reports

## Installation & Setup

### Prerequisites
Make sure you have the following installed:
- **XAMPP** (or any other local server with Apache and MySQL)
- **PHP** (included in XAMPP)
- **MySQL Database**
- A web browser

### Steps to Install
1. **Download or Clone the Repository**
   ```sh
   git clone https://github.com/Ankit13github/collage_library_management_system
   ```
2. **Move the Project Folder** to the `htdocs` directory of XAMPP:
   ```sh
   mv college_library_management_system /xampp/htdocs/
   ```
3. **Start Apache and MySQL** from XAMPP Control Panel.
4. **Import the Database**:
   - Open **phpMyAdmin** (`http://localhost/phpmyadmin/`)
   - Create a new database named `library_db`.
   - Import the provided SQL file (`SQL file.sql`) into the database.
5. **Run the Project**:
   - Open your web browser and go to:
     ```
     http://localhost/college_library_management_system/
     ```
6. **Login Credentials** (Default):
   - **Admin Login**
     - Username: `admin@gmail.com`
     - Password: `admin@123`
   - **Student Login**
     - Signup first and log in with your credentials.

## Usage
- **Students:** Can search for books, issue and return books, and give feedback.
- **Admins:** Can add, update, or remove books, manage student records, track book issues/returns .

## Contributing
Feel free to contribute to this project by submitting pull requests.

## License
This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

---
**Author:** Ankit alviya 
**GitHub:** https://github.com/Ankit13github

