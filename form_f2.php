<?php
include("../../../config/db.php");

/* =========================
   COMMUNITY RULES
========================= */
$community = [
    "OC" => 31,
    "BC" => 26.5,
    "BCM" => 3.5,
    "MBC/DNC" => 20,
    "SC" => 15,
    "SCA" => 3,
    "ST" => 1
];

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
<title>DOTE – FORM F2</title>

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
    margin-bottom:10px;
}
table{
    width:100%;
    border-collapse:collapse;
    font-size:12px;
}
th,td{
    border:1px solid #c7d2fe;
    padding:6px;
    text-align:center;
}
th{
    background:#e0e7ff;
}
.sub{
    background:#f8fafc;
    font-weight:600;
}
.total{
    background:#ecfeff;
    font-weight:700;
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

<h2>DOTE – FORM F2</h2>
<p><b>Academic Year :</b> <?= $academic_year ?></p>
<p><b>Final Admission Status (Govt + Management Quota)</b></p>

<table>
<tr>
    <th rowspan="2">Course</th>
    <th rowspan="2">Approved Intake</th>
    <th rowspan="2">Govt</th>
    <th rowspan="2">Mgmt</th>
    <?php foreach($community as $c=>$p){ ?>
        <th colspan="3"><?= $c ?></th>
    <?php } ?>
</tr>
<tr>
<?php foreach($community as $c=>$p){ ?>
    <th>Allotted</th>
    <th>Filled</th>
    <th>Vacant</th>
<?php } ?>
</tr>

<?php
$q = mysqli_query($conn,"
    SELECT course_code, course_name, approved_intake
    FROM courses WHERE status='active'
");

while($r = mysqli_fetch_assoc($q)){

    $govt = round($r['approved_intake']/2);
    $mgmt = $r['approved_intake'] - $govt;

    // Govt community allotment
    $allotted = [];
    $sum = 0;
    foreach($community as $c=>$p){
        $allotted[$c] = floor($govt*$p/100);
        $sum += $allotted[$c];
    }
    $allotted["OC"] += ($govt-$sum);
?>
<tr>
<td><?= $r['course_name'] ?></td>
<td><?= $r['approved_intake'] ?></td>
<td><?= $govt ?></td>
<td><?= $mgmt ?></td>

<?php
foreach($community as $c=>$p){

    $filled = mysqli_fetch_assoc(mysqli_query($conn,"
        SELECT COUNT(*) c
        FROM students s
        JOIN admission_applications a ON s.admission_no=a.admission_no
        WHERE s.course_code='{$r['course_code']}'
          AND a.application_status='admitted'
          AND a.community='$c'
    "))['c'];

    $vacant = $allotted[$c] - $filled;
?>
<td><?= $allotted[$c] ?></td>
<td><?= $filled ?></td>
<td><?= $vacant < 0 ? 0 : $vacant ?></td>
<?php } ?>
</tr>
<?php } ?>

</table>

<div class="note">
<b>Note:</b> Form-F2 is the final consolidated DOTE submission report.
</div>

</div>

</body>
</html>
