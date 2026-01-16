<?php
session_start();
if(!isset($_SESSION['role']) || $_SESSION['role']!='admin'){
    header("Location: ../../auth/login.php");
    exit;
}
?>
<?php include("../../config/db.php");
if(isset($_POST['add'])){
$conn->query("ALTER TABLE {$_POST['table']}
ADD {$_POST['column']} VARCHAR(100)");
echo "Column Added";
}
?>
<form method="post">
Table <input name="table">
Column <input name="column">
<button name="add">Add Column</button>
</form>
