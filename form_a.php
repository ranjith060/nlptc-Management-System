<?php
include("../../../config/db.php");

/* =========================
   GET ACTIVE ACADEMIC YEAR
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
<title>DOTE – FORM A</title>

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
    margin-bottom:20px;
}
table{
    width:100%;
    border-collapse:collapse;
}
th,td{
    border:1px solid #c7d2fe;
    padding:10px;
    text-align:center;
}
th{
    background:#e0e7ff;
}
.footer{
    margin-top:20px;
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

<h2>DOTE – FORM A</h2>

<p><b>Academic Year :</b> <?= $academic_year ?></p>

<table>
<tr>
    <th>S.No</th>
    <th>Course Code</th>
    <th>Course Name</th>
    <th>Approved Intake</th>
    <th>Govt Quota</th>
    <th>Management Quota</th>
</tr>

<?php
$i = 1;

$q = mysqli_query($conn,"
    SELECT 
        c.course_code,
        c.course_name,
        c.approved_intake
    FROM courses c
    WHERE c.status='active'
");

while($r = mysqli_fetch_assoc($q)){

    $total = $r['approved_intake'];
    $govt  = round($total / 2);
    $mgmt = $total - $govt;
?>
<tr>
    <td><?= $i++ ?></td>
    <td><?= $r['course_code'] ?></td>
    <td><?= $r['course_name'] ?></td>
    <td><?= $total ?></td>
    <td><?= $govt ?></td>
    <td><?= $mgmt ?></td>
</tr>
<?php } ?>

</table>

<div class="footer">
    <b>Note:</b> Govt quota = 50% of approved intake as per DOTE norms.
</div>

</div>

</body>
</html>
