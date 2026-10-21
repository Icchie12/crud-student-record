<?php include 'db.php'; ?>
<?php
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM students WHERE student_id='$id'");
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <div class="form-header">Edit Student</div>
        <div class="form-body">
            <form method="POST">
                Name: 
                <input type="text" name="name" value="<?php echo $row['name']; ?>" placeholder="Juan Dela Cruz" required><br>

                Email: 
                <input type="email" name="email" value="<?php echo $row['email']; ?>" placeholder="juandelacruz@gmail.com" required><br>

                Course:
                <select name="course" required>
                    <option <?php if($row['course']=="Bachelor of Science in Information Technology") echo "selected"; ?>>Bachelor of Science in Information Technology</option>
                    <option <?php if($row['course']=="Bachelor of Science in Computer Science") echo "selected"; ?>>Bachelor of Science in Computer Science</option>
                    <option <?php if($row['course']=="Bachelor of Science in Information System") echo "selected"; ?>>Bachelor of Science in Information System</option>
                    <option <?php if($row['course']=="Bachelor of Science in Computer Engineering") echo "selected"; ?>>Bachelor of Science in Computer Engineering</option>
                </select><br>

                Year Level:
                <select name="year_level" required>
                    <option value="1" <?php if($row['year_level']=="1") echo "selected"; ?>>1st Year</option>
                    <option value="2" <?php if($row['year_level']=="2") echo "selected"; ?>>2nd Year</option>
                    <option value="3" <?php if($row['year_level']=="3") echo "selected"; ?>>3rd Year</option>
                    <option value="4" <?php if($row['year_level']=="4") echo "selected"; ?>>4th Year</option>
                    <option value="Irregular" <?php if($row['year_level']=="Irregular") echo "selected"; ?>>Irregular</option>
                </select><br>

                Address: 
                <input type="text" name="address" value="<?php echo $row['address']; ?>" placeholder="123 Sampaloc, Manila" required><br>

                Contact Number: 
                <input type="text" name="contact" value="<?php echo $row['contact']; ?>" pattern="\d{11}" placeholder="09123456789" required><br>

                <div class="form-buttons">
                    <a href="index.php" class="btn-red">Cancel</a>
                    <button type="submit" name="update" class="btn-green">Update</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

<?php
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];
    $year = $_POST['year_level'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];

    $check_email = mysqli_query($conn, "SELECT * FROM students WHERE email='$email' AND student_id!='$id'");
    if (mysqli_num_rows($check_email) > 0) {
        echo "<script>alert('Email already exists!'); window.location='edit.php?id=$id';</script>";
        exit;
    }

    $update = mysqli_query($conn, "UPDATE students 
                                   SET name='$name', email='$email', course='$course', year_level='$year', address='$address', contact='$contact' 
                                   WHERE student_id='$id'");

    if ($update) {
        header("Location: index.php");
        exit;
    } else {
        echo "<script>alert('Error updating record!');</script>";
    }
}
?>
