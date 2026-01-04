<?php
session_start();
if(!isset($_SESSION['admin'])){
    header("Location: admin_login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>NLPTC Admin Dashboard</title>
<link rel="stylesheet" href="css/admin.css">
</head>
<body>

<!-- Header -->
<div class="header">
    <h1>Nanjiah Lingammal Polytechnic College – ERP</h1>
    <div class="user">
        Admin
        <a href="auth/logout.php">Logout</a>
    </div>
</div>

<!-- Sidebar -->
<div class="sidebar">
    <a href="admin_dashboard.php">Dashboard</a>
    <a href="admin/view_applications.php">Admissions</a>
    <a href="admin/add_student.php">Students</a>
    <a href="admin/add_faculty.php">Faculty</a>
    <a href="admin/add_course.php">Courses</a>
    <a href="admin/reports.php">Reports</a>
    <a href="admin/add_column.php">Settings</a>
</div>

<!-- Main -->
<div class="main">
    <h2>Dashboard Overview</h2>

    <?php include __DIR__."/admin/dashboard_home.php"; ?>

</div>

</body>
</html>
