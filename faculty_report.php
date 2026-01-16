<?php
session_start();
if(!isset($_SESSION['role']) || $_SESSION['role']!='admin'){
    header("Location: ../../auth/login.php");
    exit;
}
?>
<?php include("../../config/db.php"); ?>
<h2>Faculty Report</h2>
<table border="1">
<tr><th>ID</th><th>Name</th><th>Dept</th></tr>
<?php
$r=$conn->query("SELECT * FROM faculty");
while($f=$r->fetch_assoc()){
echo "<tr>
<td>{$f['faculty_id']}</td>
<td>{$f['first_name']}</td>
<td>{$f['department']}</td>
</tr>";
}
?>
</table>
