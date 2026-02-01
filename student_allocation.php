<?php include("../../config/db.php"); ?>

<h2>Student Allocation (Community Wise)</h2>

<?php
$q = mysqli_query($conn,"
SELECT s.student_id,s.student_name,a.community,c.course_name
FROM students s
JOIN admission_applications a ON s.admission_no=a.admission_no
JOIN courses c ON s.course_code=c.course_code
ORDER BY c.course_name,a.community
");

while($r=mysqli_fetch_assoc($q)){
    echo "{$r['course_name']} - {$r['community']} - {$r['student_name']}<br>";
}
?>
