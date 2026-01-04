<?php
include "config/db.php";
if (!isset($_SESSION['student'])) header("Location: student_login.php");
?>

<h2>Student Dashboard</h2>

<?php
$u = $_SESSION['student'];
$res = $conn->query("SELECT * FROM users WHERE username='$u'");
$r = $res->fetch_assoc();

echo "Admission No: ".$r['admission_no']."<br>";
echo "Student ID: ".$r['student_id']."<br>";
?>
