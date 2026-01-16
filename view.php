<?php
include("../../config/db.php");

$id = $_GET['id'] ?? "";

// ================= STUDENT =================
$student = mysqli_fetch_assoc(mysqli_query($conn,"
    SELECT s.*, c.course_name
    FROM students s
    JOIN courses c ON s.course_code=c.course_code
    WHERE s.student_id='$id'
"));

if(!$student) die("Invalid Student");

$admission_no = $student['admission_no'];

// ================= ADMISSION =================
$adm = mysqli_fetch_assoc(mysqli_query($conn,"
    SELECT * FROM admission_applications
    WHERE admission_no='$admission_no'
"));

// ================= DOCUMENTS =================
$docs = mysqli_fetch_assoc(mysqli_query($conn,"
    SELECT * FROM admission_documents
    WHERE admission_no='$admission_no'
"));

// ================= QUALIFICATIONS =================
$quals = mysqli_query($conn,"
    SELECT * FROM admission_qualifications
    WHERE admission_no='$admission_no'
");
?>

<!DOCTYPE html>
<html>
<head>
<title>Student Profile</title>

<style>
body{
    background:#f4f6f9;
    font-family:Segoe UI,Arial;
    padding:30px;
}
.card{
    background:#fff;
    border-radius:16px;
    box-shadow:0 20px 40px rgba(0,0,0,.15);
    padding:25px;
    margin-bottom:25px;
}
h2{color:#1e3a8a;margin-top:0;}
.grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
    gap:12px;
}
.label{font-weight:600;color:#475569;}
.value{color:#111827;}
table{
    width:100%;
    border-collapse:collapse;
}
th,td{
    padding:10px;
    border:1px solid #e5e7eb;
    text-align:center;
}
th{background:#e0e7ff;}
.back{
    text-decoration:none;
    font-weight:600;
    color:#475569;
}
.doc a{
    color:#2563eb;
    font-weight:600;
    text-decoration:none;
}
</style>
</head>

<body>

<a href="list.php" class="back">← Back to Students</a>
<br><br>
<a href="status.php?id=<?= $student['student_id'] ?>&status=<?= $student['status'] ?>"
   style="background:#dc2626;color:white;padding:10px 20px;border-radius:8px;text-decoration:none;">
   <?= $student['status']=='active'?'Block Student':'Unblock Student' ?>
</a>



<!-- ================= STUDENT ================= -->
<div class="card">
<h2>Student Basic Details</h2>
<div class="grid">
<div><span class="label">Student ID</span><br><?= $student['student_id'] ?></div>
<div><span class="label">Name</span><br><?= $student['student_name'] ?></div>
<div><span class="label">Course</span><br><?= $student['course_name'] ?></div>
<div><span class="label">Batch</span><br><?= $student['batch_year'] ?></div>
<div><span class="label">Year / Sem</span><br><?= $student['current_year']." / ".$student['current_semester'] ?></div>
<div><span class="label">Register No</span><br><?= $student['reg_no'] ?></div>
</div>
</div>

<!-- ================= ADMISSION ================= -->
<div class="card">
<h2>Admission Details</h2>
<div class="grid">
<div><span class="label">Admission No</span><br><?= $admission_no ?></div>
<div><span class="label">DOB</span><br><?= $adm['dob'] ?></div>
<div><span class="label">Gender</span><br><?= $adm['gender'] ?></div>
<div><span class="label">Community</span><br><?= $adm['community'] ?></div>
<div><span class="label">Aadhar</span><br><?= $adm['aadhar_no'] ?></div>
<div><span class="label">Phone</span><br><?= $adm['phone'] ?></div>
<div><span class="label">Address</span><br><?= $adm['address'] ?></div>
</div>
</div>

<!-- ================= QUALIFICATIONS ================= -->
<div class="card">
<h2>Academic Marks</h2>
<table>
<tr>
<th>Qualification</th>
<th>Subject</th>
<th>Marks</th>
<th>Max</th>
<th>%</th>
</tr>

<?php while($q=mysqli_fetch_assoc($quals)){ ?>
<tr>
<td><?= $q['qualification'] ?></td>
<td><?= $q['subject_name'] ?></td>
<td><?= $q['marks_secured'] ?></td>
<td><?= $q['max_marks'] ?></td>
<td><?= $q['percentage'] ?></td>
</tr>
<?php } ?>
</table>
</div>

<!-- ================= DOCUMENTS ================= -->
<div class="card">
<h2>Uploaded Documents</h2>

<div class="grid doc">
<?php if($docs['sslc_marksheet']){ ?>
<div><a href="<?= $docs['sslc_marksheet'] ?>" target="_blank">SSLC Marksheet</a></div>
<?php } ?>
<?php if($docs['hsc_marksheet']){ ?>
<div><a href="<?= $docs['hsc_marksheet'] ?>" target="_blank">HSC Marksheet</a></div>
<?php } ?>
<?php if($docs['transfer_certificate']){ ?>
<div><a href="<?= $docs['transfer_certificate'] ?>" target="_blank">Transfer Certificate</a></div>
<?php } ?>
<?php if($docs['community_certificate']){ ?>
<div><a href="<?= $docs['community_certificate'] ?>" target="_blank">Community Certificate</a></div>
<?php } ?>
<?php if($docs['aadhar_document']){ ?>
<div><a href="<?= $docs['aadhar_document'] ?>" target="_blank">Aadhar</a></div>
<?php } ?>
<?php if($docs['income_certificate']){ ?>
<div><a href="<?= $docs['income_certificate'] ?>" target="_blank">Income Certificate</a></div>
<?php } ?>
</div>

</div>
<a href="download_pdf.php?id=<?= $student['student_id'] ?>"
   style="background:#1e40af;color:white;padding:10px 20px;border-radius:8px;text-decoration:none;">
   Download PDF
</a>
</body>
</html>
