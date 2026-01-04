<?php include "../config/db.php"; ?>
<h2>Student Report</h2>
<a href="export_report.php">Download CSV</a>
<hr>
<?php
$r = $conn->query("SELECT student_name,reg_no,course_code FROM students");
while ($row = $r->fetch_assoc()) {
    echo $row['student_name']." | ".$row['reg_no']." | ".$row['course_code']."<br>";
}
?>
