<?php
include "../config/db.php";
header("Content-Type: text/csv");
header("Content-Disposition: attachment; filename=students_report.csv");

$out = fopen("php://output", "w");
fputcsv($out, ["Name","Reg No","Course"]);

$q = $conn->query("SELECT student_name,reg_no,course_code FROM students");
while ($row = $q->fetch_assoc()) {
    fputcsv($out, $row);
}
fclose($out);
?>
