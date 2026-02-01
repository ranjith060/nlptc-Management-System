<?php
include("../config/db.php");

/* =========================
   BASIC CHECK
========================= */
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Invalid request");
}

/* =========================
   GENERATE ADMISSION NO
========================= */
$admission_no = "ADM" . time();

/* =========================
   ADMISSION APPLICATION
========================= */
$sql_app = "INSERT INTO admission_applications (
    admission_no,
    student_name, dob, age, gender,
    mother_tongue, religion, community, caste,
    aadhar_no, phone, email, address,
    course_name, admission_type,
    father_name, father_mobile, father_occupation,
    mother_name, mother_mobile,
    guardian_name, guardian_relation,
    bank_name, bank_account_no, ifsc_code,
    transport_required, hostel_required,
    application_status
) VALUES (
    '$admission_no',
    '{$_POST['student_name']}',
    '{$_POST['dob']}',
    '{$_POST['age']}',
    '{$_POST['gender']}',
    '{$_POST['mother_tongue']}',
    '{$_POST['religion']}',
    '{$_POST['community']}',
    '{$_POST['caste']}',
    '{$_POST['aadhar_no']}',
    '{$_POST['phone']}',
    '{$_POST['email']}',
    '{$_POST['address']}',
    '{$_POST['course_name']}',
    '{$_POST['admission_type']}',
    '{$_POST['father_name']}',
    '{$_POST['father_mobile']}',
    '{$_POST['father_occupation']}',
    '{$_POST['mother_name']}',
    '{$_POST['mother_mobile']}',
    '{$_POST['guardian_name']}',
    '{$_POST['guardian_relation']}',
    '{$_POST['bank_name']}',
    '{$_POST['bank_account_no']}',
    '{$_POST['ifsc_code']}',
    '{$_POST['transport_required']}',
    '{$_POST['hostel_required']}',
    'waiting'
)";

if (!$conn->query($sql_app)) {
    die("Admission Application Error: " . $conn->error);
}

/* =========================
   QUALIFICATION DETAILS
========================= */
$sql_qual = "INSERT INTO admission_qualifications (
    admission_no, qualification,
    school_name, year_of_passing,
    subject_name, marks_secured, max_marks
) VALUES (
    '$admission_no',
    '{$_POST['qualification']}',
    '{$_POST['school_name']}',
    '{$_POST['year_of_passing']}',
    '{$_POST['subject_name']}',
    '{$_POST['marks_secured']}',
    '{$_POST['max_marks']}'
)";

if (!$conn->query($sql_qual)) {
    die("Qualification Error: " . $conn->error);
}

/* =========================
   DOCUMENT UPLOAD
========================= */
$upload_dir = "../uploads/$admission_no/";
if (!is_dir($upload_dir)) {
    mkdir($upload_dir, 0777, true);
}

function uploadFile($name, $dir) {
    if (!empty($_FILES[$name]['name'])) {
        $file = basename($_FILES[$name]['name']);
        $path = $dir . $file;
        move_uploaded_file($_FILES[$name]['tmp_name'], $path);
        return $path;
    }
    return NULL;
}

$sslc  = uploadFile("sslc_marksheet", $upload_dir);
$tc    = uploadFile("transfer_certificate", $upload_dir);
$comm  = uploadFile("community_certificate", $upload_dir);
$aad   = uploadFile("aadhar_document", $upload_dir);

$sql_doc = "INSERT INTO admission_documents (
    admission_no,
    sslc_marksheet,
    transfer_certificate,
    community_certificate,
    aadhar_document
) VALUES (
    '$admission_no',
    '$sslc',
    '$tc',
    '$comm',
    '$aad'
)";

if (!$conn->query($sql_doc)) {
    die("Document Upload Error: " . $conn->error);
}

/* =========================
   SUCCESS OUTPUT
========================= */
?>
<!DOCTYPE html>
<html>
<head>
    <title>Application Submitted</title>
    <link rel="stylesheet" href="../assets/css/main.css">
</head>
<body>

<div class="container">
    <h2 style="color:#16a34a;">Application Submitted Successfully</h2>
    <p>Your Admission Number:</p>
    <h3><?= $admission_no ?></h3>

    <p>Please keep this number for future reference.</p>

    <a href="../index.php">⬅ Back to Home</a>
</div>

</body>
</html>
