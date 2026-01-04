<?php
include "../config/db.php";

$u=$_POST['username'];
$p=$_POST['password'];

$q=$conn->query("SELECT * FROM users
                 WHERE username='$u' AND role='faculty'");

if ($r=$q->fetch_assoc()) {
  if (password_verify($p,$r['password_hash'])) {
    $_SESSION['faculty']=$u;
    header("Location: ../faculty_dashboard.php");
  }
}
echo "Invalid Faculty Login";
?>
