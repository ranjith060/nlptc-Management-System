<?php
include "../config/db.php";

$u = $_POST['username'];
$p = $_POST['password'];

$q = $conn->query("SELECT * FROM users
                   WHERE username='$u' AND role='student'");

if ($row = $q->fetch_assoc()) {
  if (password_verify($p,$row['password_hash'])) {
    $_SESSION['student']=$u;
    header("Location: ../student_dashboard.php");
  }
}
echo "Invalid Login";
?>
