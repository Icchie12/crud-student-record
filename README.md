# crud-student-record
BSIT 3-1

A simple PHP + MySQL CRUD application for managing student records of CCIS.  
This project allows adding, editing, deleting, and filtering student information.

---

## 📂 Project Structure
- `index.php` → Main page, displays student records with filter/search options
- `add.php` → Form to add new student
- `edit.php` → Form to edit existing student
- `delete.php` → Deletes a student record
- `db.php` → Database connection file
- `style.css` → Styling for layout and responsive design
- `students.sql` → Database schema and sample data

---

## ⚙️ Setup Instructions
1. Install **XAMPP** (or any PHP + MySQL server).
2. Copy the project folder into `htdocs` (e.g., `htdocs/ccis-student-record`).
3. Open [http://localhost/phpmyadmin](http://localhost/phpmyadmin).
4. Create a database:  
   ```sql
   CREATE DATABASE ccis_student_db;
