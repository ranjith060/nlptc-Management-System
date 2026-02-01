<?php
include("../../config/db.php");

$id = $_GET['id'];
$status = $_GET['status'];

$new = ($status=='active') ? 'inactive' : 'active';

mysqli_query($conn,"
UPDATE students SET status='$new' WHERE student_id='$id'
");

header("Location: view.php?id=$id");
exit;
