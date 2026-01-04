<?php
include "../config/db.php";

if (!isset($_SESSION['admin'])) {
    header("Location: ../admin_login.php");
    exit;
}

$admission_no = $_GET['id'];

// Update status
$conn->query("
    UPDATE admission_applications
    SET application_status = 'admitted'
    WHERE admission_no = '$admission_no'
");

// OPTIONAL: redirect back
header("Location: view_applications.php");
exit;
