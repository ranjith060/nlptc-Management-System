<?php
include "config/db.php";
if (!isset($_SESSION['faculty'])) header("Location: faculty_login.php");
?>

<h2>Faculty Dashboard</h2>
<p>Welcome Faculty</p>
