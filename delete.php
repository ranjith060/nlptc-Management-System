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

$conn->query("DELETE FROM students WHERE student_id='$id'");
header("Location: list.php");
?>
