<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>CCIS Student Record</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">
        <h2>CCIS Student Record</h2>
        <div class="controls">
            <a class="btn" href="add.php">Add Student</a>
            <form method="GET" style="display:flex; gap:10px; flex-wrap:wrap;">
                
                <input type="text" name="search" placeholder="Search name/email"
                       value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">

                <select name="course">
                    <option value="" <?php if(empty($_GET['course'])) echo "selected"; ?>>All Courses</option>
                    <option value="Bachelor of Science in Information Technology" <?php if(isset($_GET['course']) && $_GET['course']=="Bachelor of Science in Information Technology") echo "selected"; ?>>Bachelor of Science in Information Technology</option>
                    <option value="Bachelor of Science in Computer Science" <?php if(isset($_GET['course']) && $_GET['course']=="Bachelor of Science in Computer Science") echo "selected"; ?>>Bachelor of Science in Computer Science</option>
                    <option value="Bachelor of Science in Information System" <?php if(isset($_GET['course']) && $_GET['course']=="Bachelor of Science in Information System") echo "selected"; ?>>Bachelor of Science in Information System</option>
                    <option value="Bachelor of Science in Computer Engineering" <?php if(isset($_GET['course']) && $_GET['course']=="Bachelor of Science in Computer Engineering") echo "selected"; ?>>Bachelor of Science in Computer Engineering</option>
                </select>

                <select name="year">
                    <option value="" <?php if(empty($_GET['year'])) echo "selected"; ?>>All Years</option>
                    <option value="1" <?php if(isset($_GET['year']) && $_GET['year']=="1") echo "selected"; ?>>1st Year</option>
                    <option value="2" <?php if(isset($_GET['year']) && $_GET['year']=="2") echo "selected"; ?>>2nd Year</option>
                    <option value="3" <?php if(isset($_GET['year']) && $_GET['year']=="3") echo "selected"; ?>>3rd Year</option>
                    <option value="4" <?php if(isset($_GET['year']) && $_GET['year']=="4") echo "selected"; ?>>4th Year</option>
                    <option value="Irregular" <?php if(isset($_GET['year']) && $_GET['year']=="Irregular") echo "selected"; ?>>Irregular</option>
                </select>

                <input type="submit" class="btn" value="Filter">
                <a href="index.php" class="btn">Reset</a>
            </form>
        </div>
    </div>

    <div class="table-wrapper">
        <table>
            <tr>
                <th>ID</th><th>Name</th><th>Email</th><th>Course</th><th>Year Level</th><th>Address</th><th>Contact</th><th>Actions</th>
            </tr>
            <?php
            $query = "SELECT * FROM students WHERE 1=1";

            if (!empty($_GET['search'])) {
                $search = mysqli_real_escape_string($conn, $_GET['search']);
                $query .= " AND (name LIKE '%$search%' OR email LIKE '%$search%')";
            }
            if (!empty($_GET['course'])) {
                $course = mysqli_real_escape_string($conn, $_GET['course']);
                $query .= " AND course='$course'";
            }
            if (!empty($_GET['year'])) {
                $year = mysqli_real_escape_string($conn, $_GET['year']);
                $query .= " AND year_level='$year'";
            }

            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row['student_id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['course']}</td>
                        <td>{$row['year_level']}</td>
                        <td>{$row['address']}</td>
                        <td>{$row['contact']}</td>
                        <td>
                            <a href='edit.php?id={$row['student_id']}'>Edit</a> |
                            <a href='delete.php?id={$row['student_id']}'>Delete</a>
                        </td>
                      </tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
