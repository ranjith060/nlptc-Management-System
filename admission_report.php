<?php
session_start();
if(!isset($_SESSION['role']) || $_SESSION['role']!='admin'){
    header("Location: ../../auth/login.php");
    exit;
}
?>
<?php include("../../config/db.php"); ?>
<h2>Admission Report</h2>
<table border="1">
<tr>
<th>Admission No</th>
<th>Name</th>
<th>Course</th>
<th>Status</th>
</tr>
<?php
$r=$conn->query("SELECT * FROM admission_applications");
while($row=$r->fetch_assoc()){
echo "<tr>
<td>{$row['admission_no']}</td>
<td>{$row['student_name']}</td>
<td>{$row['course_name']}</td>
<td>{$row['application_status']}</td>
</tr>";
}
?>
</table>
