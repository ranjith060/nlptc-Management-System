<?php
include __DIR__ . "/../config/db.php";

$students = $conn->query("SELECT COUNT(*) c FROM students")->fetch_assoc()['c'];
$faculty  = $conn->query("SELECT COUNT(*) c FROM faculty")->fetch_assoc()['c'];
$courses  = $conn->query("SELECT COUNT(*) c FROM courses")->fetch_assoc()['c'];
$waiting  = $conn->query("
    SELECT COUNT(*) c 
    FROM admission_applications 
    WHERE application_status='waiting'
")->fetch_assoc()['c'];
?>

<div class="cards">
    <div class="card">Students<br><b><?= $students ?></b></div>
    <div class="card">Faculty<br><b><?= $faculty ?></b></div>
    <div class="card">Courses<br><b><?= $courses ?></b></div>
    <div class="card">Pending Admissions<br><b><?= $waiting ?></b></div>
</div>
