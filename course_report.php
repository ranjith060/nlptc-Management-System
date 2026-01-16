<?php
session_start();
if(!isset($_SESSION['role']) || $_SESSION['role']!='admin'){
    header("Location: ../../auth/login.php");
    exit;
}
?>
<?php include("../../config/db.php"); ?>
<h2>Course Report</h2>
<table border="1">
<tr><th>Code</th><th>Name</th><th>Status</th></tr>
<?php
$r=$conn->query("SELECT * FROM courses");
while($c=$r->fetch_assoc()){
echo "<tr>
<td>{$c['course_code']}</td>
<td>{$c['course_name']}</td>
<td>{$c['status']}</td>
</tr>";
}
?>
</table>
