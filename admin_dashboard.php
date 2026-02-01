<?php
session_start();
if(!isset($_SESSION['role']) || $_SESSION['role']!='admin'){
    header("Location: ../auth/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard | NLPTC</title>
    <style>
        body{
            margin:0;
            font-family: Arial, sans-serif;
            background:#f4f6f9;
        }
        .topbar{
            background:#002b5c;
            color:white;
            padding:15px;
            display:flex;
            justify-content:space-between;
            align-items:center;
        }
        .topbar h2{
            margin:0;
            font-size:20px;
        }
        .sidebar{
            width:230px;
            background:#1e293b;
            height:100vh;
            position:fixed;
            top:60px;
            left:0;
        }
        .sidebar a{
            display:block;
            padding:15px;
            color:#ddd;
            text-decoration:none;
            border-bottom:1px solid #2c3e50;
        }
        .sidebar a:hover{
            background:#2563eb;
            color:#fff;
        }
        .content{
            margin-left:230px;
            padding:30px;
        }
        .cards{
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(200px,1fr));
            gap:20px;
        }
        .card{
            background:#fff;
            padding:25px;
            border-radius:8px;
            box-shadow:0 0 10px rgba(0,0,0,0.1);
            text-align:center;
        }
        .card a{
            text-decoration:none;
            color:#002b5c;
            font-weight:bold;
        }
    </style>
</head>
<body>

<!-- TOP BAR -->
<div class="topbar">
    <h2>NANJIAH LINGAMMAL POLYTECHNIC COLLEGE</h2>
    <div>
        Welcome Admin |
        <a href="../auth/logout.php" style="color:#ffb3b3;">Logout</a>
    </div>
</div>

<!-- SIDEBAR -->
<div class="sidebar">
    <a href="admin_dashboard.php">Dashboard</a>
    <a href="admissions/list.php">Admissions</a>
    <a href="students/list.php">Students</a>
    <a href="faculty/list.php">Faculty</a>
    <a href="courses/list.php">Courses</a>
    <a href="academic_year/list.php">Academic Year</a>
    <a href="dote/seat_allocation.php">DOTE Module</a>
    <a href="reports/admission_report.php">Reports</a>
    <a href="settings/customization.php">Settings</a>
</div>

<!-- CONTENT -->
<div class="content">
    <h2>Admin Dashboard</h2>

    <div class="cards">
        <div class="card">
            <a href="admissions/list.php">Admissions</a>
        </div>
        <div class="card">
            <a href="students/list.php">Students</a>
        </div>
        <div class="card">
            <a href="faculty/list.php">Faculty</a>
        </div>
        <div class="card">
            <a href="courses/list.php">Courses</a>
        </div>
        <div class="card">
            <a href="dote/seat_allocation.php">DOTE</a>
        </div>
        <div class="card">
            <a href="reports/admission_report.php">Reports</a>
        </div>
    </div>
</div>

</body>
</html>
