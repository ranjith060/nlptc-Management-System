<?php
include("../../../config/db.php");

/* =========================
   COMMUNITY PERCENTAGE
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
    ORDER BY academic_year DESC LIMIT 1
"));
$academic_year = $ay['academic_year'] ?? '';
?>

<!DOCTYPE html>
<html>
<head>
<title>DOTE – FORM B</title>

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
}
th,td{
    border:1px solid #c7d2fe;
    padding:8px;
    text-align:center;
    font-size:13px;
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

<h2>DOTE – FORM B</h2>
<p><b>Academic Year :</b> <?= $academic_year ?></p>

<table>
<tr>
    <th rowspan="2">S.No</th>
    <th rowspan="2">Course Code</th>
    <th rowspan="2">Course Name</th>
    <th rowspan="2">Govt Quota</th>
    <th colspan="7">Community Wise Distribution</th>
</tr>
<tr>
<?php foreach($community as $c => $p){ ?>
    <th><?= $c ?></th>
<?php } ?>
</tr>

<?php
$i = 1;
$q = mysqli_query($conn,"
    SELECT course_code, course_name, approved_intake
    FROM courses WHERE status='active'
");

while($r = mysqli_fetch_assoc($q)){
    $govt = round($r['approved_intake'] / 2);
    $allocated = [];
    $sum = 0;

    foreach($community as $c => $p){
        $seats = floor($govt * $p / 100);
        $allocated[$c] = $seats;
        $sum += $seats;
    }

    // Balance seats → OC
    $allocated["OC"] += ($govt - $sum);
?>
<tr>
    <td><?= $i++ ?></td>
    <td><?= $r['course_code'] ?></td>
    <td><?= $r['course_name'] ?></td>
    <td><?= $govt ?></td>
    <?php foreach($community as $c => $p){ ?>
        <td><?= $allocated[$c] ?></td>
    <?php } ?>
</tr>
<?php } ?>

</table>

<div class="note">
<b>Note:</b> Balance seats due to rounding are added to OC as per DOTE norms.
</div>

</div>

</body>
</html>
