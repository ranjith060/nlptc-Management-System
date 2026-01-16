<?php
session_start();
if(!isset($_SESSION['role']) || $_SESSION['role']!='admin'){
    header("Location: ../../auth/login.php");
    exit;
}
?>

<?php
include("../../config/db.php");
$id = $_GET['id'];

if(isset($_POST['save'])){
    $conn->query("
    UPDATE students
    SET register_no='{$_POST['regno']}'
    WHERE student_id='$id'
    ");
    header("Location: list.php");
}
?>

<h2>Assign Register Number</h2>
<form method="post">
Register No:
<input type="text" name="regno" required>
<button name="save">Save</button>
</form>
