<?php include 'db.php'; ?>
<?php
$id = $_GET['id']; // ito yung value na galing sa URL
mysqli_query($conn, "DELETE FROM students WHERE student_id='$id'");
header("Location: index.php"); // balik sa dashboard
exit;
?>
