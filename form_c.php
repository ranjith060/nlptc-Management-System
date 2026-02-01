<?php
include("../../../config/db.php");

/* =========================
   ACADEMIC YEAR
========================= */
$ay = mysqli_fetch_assoc(mysqli_query($conn,"
    SELECT academic_year 
    FROM academic_periods 
    ORDER BY academic_year DESC 
    LIMIT 1
"));
$academic_year = $ay['academic_year'] ?? '';
?>

<!DOCTYPE html>
<html>
<head>
<title>DOTE – FORM C</title>

<style>
body{
    font-family:Segoe UI,Arial;
    background:#f4f6f9;
    padding:30px;
}
.header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:20px;
}
.back-btn{
    background:#f1f5f9;
    padding:8px 16px;
    border-radius:30px;
    text-decoration:none;
    font-weight:600;
    color:#1e293b;
}
.back-btn:hover{
    background:#e0e7ff;
    color:#1e40af;
}
.card{
    background:#fff;
    padding:25px;
    border-radius:16px;
    box-shadow:0 20px 40px rgba(0,0,0,.15);
}
h2{
    text-align:center;
    color:#1e3a8a;
    margin-bottom:15px;
}
table{
    width:100%;
    border-collapse:collapse;
    font-size:13px;
}
th,td{
    border:1px solid #c7d2fe;
    padding:8px;
    text-align:center;
}
th{
    background:#e0e7ff;
}
.note{
    margin-top:15px;
    font-size:13px;
    color:#475569;
}
</style>
</head>

<body>

<div class="header">
    <a href="../dashboard.php" class="back-btn">← Back</a>
</div>

<div class="card">

<h2>DOTE – FORM C</h2>
<p><b>Academic Year :</b> <?= $academic_year ?></p>
<p><b>Category :</b> Government Quota – Admitted Students</p>

<table>
<tr>
    <th>S.No</th>
    <th>Admission No</th>
    <th>Student Name</th>
    <th>Course</th>
    <th>Community</th>
</tr>

<?php
$i = 1;

$q = mysqli_query($conn,"
    SELECT 
        s.student_name,
        s.admission_no,
        c.course_name,
        a.community
    FROM students s
    JOIN courses c ON s.course_code = c.course_code
    JOIN admission_applications a ON s.admission_no = a.admission_no
    WHERE a.application_status='admitted'
    ORDER BY c.course_name, a.community, s.student_name
");

while($r = mysqli_fetch_assoc($q)){
?>
<tr>
    <td><?= $i++ ?></td>
    <td><?= $r['admission_no'] ?></td>
    <td><?= $r['student_name'] ?></td>
    <td><?= $r['course_name'] ?></td>
    <td><?= $r['community'] ?></td>
</tr>
<?php } ?>

</table>

<div class="note">
<b>Note:</b> This list contains only Government quota admitted candidates, generated automatically from admission records.
</div>

</div>

</body>
</html>
