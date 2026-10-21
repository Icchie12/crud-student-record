<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <div class="form-header">Add Student</div>
        <div class="form-body">
            <form method="POST">
                Student ID (6 digits): 
                <input type="text" name="student_id" pattern="\d{6}" placeholder="000006" required><br>

                Name: 
                <input type="text" name="name" placeholder="Juan Dela Cruz" required><br>

                Email: 
                <input type="email" name="email" placeholder="juandelacruz@gmail.com" required><br>

                Course:
                <select name="course" required>
                    <option value="">Select Course</option>
                    <option>Bachelor of Science in Information Technology</option>
                    <option>Bachelor of Science in Computer Science</option>
                    <option>Bachelor of Science in Information System</option>
                    <option>Bachelor of Science in Computer Engineering</option>
                </select><br>

                Year Level:
                <select name="year_level" required>
                    <option value="1">1st Year</option>
                    <option value="2">2nd Year</option>
                    <option value="3">3rd Year</option>
                    <option value="4">4th Year</option>
                    <option value="Irregular">Irregular</option>
                </select><br>

                Address: 
                <input type="text" name="address" placeholder="123 Sampaloc, Manila" required><br>

                Contact Number: 
                <input type="text" name="contact" pattern="\d{11}" placeholder="09123456789" required><br>

                <div class="form-buttons">
                    <a href="index.php" class="btn-red">Cancel</a>
                    <button type="submit" name="submit" class="btn-green">Add</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
    $id = $_POST['student_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];
    $year = $_POST['year_level'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];

    $check_id = mysqli_query($conn, "SELECT * FROM students WHERE student_id='$id'");
    if (mysqli_num_rows($check_id) > 0) {
        echo "<script>alert('Student ID already exists!'); window.location='add.php';</script>";
        exit;
    }

    $check_email = mysqli_query($conn, "SELECT * FROM students WHERE email='$email'");
    if (mysqli_num_rows($check_email) > 0) {
        echo "<script>alert('Email already exists!'); window.location='add.php';</script>";
        exit;
    }

    $insert = mysqli_query($conn, "INSERT INTO students (student_id, name, email, course, year_level, address, contact) 
                                   VALUES ('$id','$name','$email','$course','$year','$address','$contact')");

    if ($insert) {
        header("Location: index.php"); 
        exit;
    } else {
        echo "<script>alert('Error saving record!');</script>";
    }
}
?>
