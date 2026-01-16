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

if(isset($_POST['update'])){
    $conn->query("
    UPDATE students SET
    student_name='{$_POST['name']}',
    department='{$_POST['dept']}',
    year_of_study='{$_POST['year']}',
    phone='{$_POST['phone']}'
    WHERE student_id='$id'
    ");
    header("Location: list.php");
}

$data = $conn->query("SELECT * FROM students WHERE student_id='$id'")->fetch_assoc();
?>

<h2>Edit Student</h2>
<form method="post">
Name: <input value="<?= $data['student_name'] ?>" name="name"><br><br>
Dept: <input value="<?= $data['department'] ?>" name="dept"><br><br>
Year: <input value="<?= $data['year_of_study'] ?>" name="year"><br><br>
Phone: <input value="<?= $data['phone'] ?>" name="phone"><br><br>
<button name="update">Update</button>
</form>
