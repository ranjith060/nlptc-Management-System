<?php
include("../../config/db.php");

$id = $_POST['admission_no'];
$status = $_POST['status'];

mysqli_query($conn,"
    UPDATE admission_applications
    SET application_status='$status'
    WHERE admission_no='$id'
");

header("Location: view.php?id=$id");
exit;
