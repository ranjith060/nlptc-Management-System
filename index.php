<!DOCTYPE html>
<html>
<head>
<title>DOTE Reports</title>
<style>
body{font-family:Segoe UI;background:#f4f6f9;padding:30px}
.card{
    background:#fff;
    padding:25px;
    border-radius:16px;
    box-shadow:0 20px 40px rgba(0,0,0,.15);
    margin-bottom:20px;
}
h2{text-align:center;color:#1e3a8a}
table{width:100%;border-collapse:collapse}
th,td{padding:14px;text-align:center;border-bottom:1px solid #e5e7eb}
th{background:#e0e7ff}
.btn{
    padding:8px 16px;
    border-radius:20px;
    text-decoration:none;
    font-weight:600;
    margin:0 4px;
}
.pdf{background:#dc2626;color:#fff}
.excel{background:#16a34a;color:#fff}
.word{background:#2563eb;color:#fff}
.back{
    display:inline-block;
    margin-bottom:15px;
    background:#f1f5f9;
    padding:8px 18px;
    border-radius:30px;
    text-decoration:none;
    font-weight:600;
    color:#1e293b;
}
</style>
</head>

<body>

<a href="../dashboard.php" class="back">← Back to DOTE Dashboard</a>

<h2>DOTE REPORTS</h2>

<div class="card">
<table>
<tr>
    <th>Form</th>
    <th>Description</th>
    <th>Download</th>
</tr>

<?php
$forms = [
    "form_a"  => "Course & Intake Details",
    "form_b"  => "Quota Distribution",
    "form_c"  => "Community Wise Seat Allocation",
    "form_d"  => "Admitted Student Summary",
    "form_f1" => "Course Wise Admission Status",
    "form_f2" => "Final DOTE Consolidated Report"
];

foreach($forms as $key=>$title){
?>
<tr>
<td><?= strtoupper($key) ?></td>
<td><?= $title ?></td>
<td>
    <a class="btn pdf" href="<?= $key ?>.php?type=pdf">PDF</a>
    <a class="btn excel" href="<?= $key ?>.php?type=excel">Excel</a>
    <a class="btn word" href="<?= $key ?>.php?type=word">Word</a>
</td>
</tr>
<?php } ?>

</table>
</div>

</body>
</html>
