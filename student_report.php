<?php
session_start();
if(!isset($_SESSION['role']) || $_SESSION['role']!='admin'){
    header("Location: ../../auth/login.php");
    exit;
}
?>
<?php include("../../config/db.php"); ?>
<h2>Student Report</h2>
<table border="1">
<tr><th>ID</th><th>Name</th><th>Dept</th><th>Reg No</th></tr>
<?php
$r=$conn->query("SELECT * FROM students");
while($s=$r->fetch_assoc()){
echo "<tr>
<td>{$s['student_id']}</td>
<td>{$s['student_name']}</td>
<td>{$s['department']}</td>
<td>{$s['register_no']}</td>
</tr>";
}
?>
</table>
