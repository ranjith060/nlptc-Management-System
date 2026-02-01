<?php
include("../../config/db.php");

$ay = $_POST['academic_year'];
$course = $_POST['course_code'];
$total = $_POST['total_intake'];

$govt = floor($total / 2);
$mgmt = $total - $govt;

mysqli_query($conn,"
REPLACE INTO dote_course_intake
(academic_year,course_code,total_intake,govt_quota,mgmt_quota)
VALUES
('$ay','$course','$total','$govt','$mgmt')
");

header("Location: dashboard.php");
