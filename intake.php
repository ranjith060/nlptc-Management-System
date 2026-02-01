<?php include("../../config/db.php"); ?>

<!DOCTYPE html>
<html>
<head>
<title>DOTE Course Intake</title>
<style>
body{font-family:Segoe UI;background:#f4f6f9;padding:30px}
.card{background:#fff;padding:30px;border-radius:14px;
box-shadow:0 20px 40px rgba(0,0,0,.15);max-width:600px;margin:auto}
label{font-weight:600;display:block;margin-top:12px}
input,select{width:100%;padding:10px;margin-top:6px}
button{margin-top:20px;background:#1e40af;color:#fff;
padding:12px 30px;border:none;border-radius:30px;font-weight:600}
.header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:25px;
}
.back-btn{
    display:inline-flex;
    align-items:center;
    gap:6px;
    background:#f1f5f9;
    color:#1e293b;
    padding:8px 16px;
    border-radius:30px;
    text-decoration:none;
    font-weight:600;
    box-shadow:0 4px 10px rgba(0,0,0,0.1);
    transition:0.3s;
}
.back-btn:hover{
    background:#e0e7ff;
    color:#1e40af;
    transform:translateX(-3px);
}

</style>
</head>

<body>
<div class="header">
    <a href="dashboard.php" class="back-btn">← Back</a>
    <h2>Course Intake</h2>
</div>

<div class="card">
<h2>DOTE – Course Intake</h2>

<form method="post" action="save_intake.php">

<label>Academic Year</label>
<select name="academic_year" required>
<?php
$ay = mysqli_query($conn,"SELECT DISTINCT academic_year FROM academic_period");
while($r=mysqli_fetch_assoc($ay)){
    echo "<option>{$r['academic_year']}</option>";
}
?>
</select>

<label>Course</label>
<select name="course_code" required>
<?php
$cq = mysqli_query($conn,"SELECT course_code,course_name FROM courses");
while($c=mysqli_fetch_assoc($cq)){
    echo "<option value='{$c['course_code']}'>{$c['course_name']}</option>";
}
?>
</select>

<label>Total Intake</label>
<input type="number" name="total_intake" required>

<button>Save Intake</button>
</form>
</div>

</body>
</html>
