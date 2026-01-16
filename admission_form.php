<?php
include("../../config/db.php");

$edit = false;
$data = [];

if (isset($_GET['id'])) {
    $edit = true;
    $admission_no = $_GET['id'];

    $res = mysqli_query($conn,
        "SELECT * FROM admission_applications WHERE admission_no='$admission_no'"
    );
    $data = mysqli_fetch_assoc($res);
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Application for Admission to Diploma Courses</title>

<style>
:root{
    --primary:#0f2a5c;
    --secondary:#1e40af;
    --light:#f8fafc;
    --border:#d1d5db;
}
*{box-sizing:border-box;font-family:"Segoe UI",sans-serif;}
body{margin:0;background:#eef2f7;}

.container{
    width:95%;
    max-width:1200px;
    margin:40px auto;
    background:#fff;
    padding:35px;
    border-radius:16px;
    box-shadow:0 30px 60px rgba(0,0,0,.18);
}
h2{text-align:center;color:var(--primary);}

.section{
    margin-bottom:30px;
    background:var(--light);
    border:1px solid var(--border);
    border-radius:14px;
    padding:22px;
}
.section h3{
    background:linear-gradient(90deg,var(--primary),var(--secondary));
    color:#fff;
    padding:12px 18px;
    border-radius:10px;
    margin:-22px -22px 20px;
}

.grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(240px,1fr));
    gap:18px;
}
label{font-size:13px;font-weight:600;}
input,select,textarea{
    width:100%;
    padding:10px;
    border-radius:8px;
    border:1px solid var(--border);
    margin-top:6px;
}
textarea{height:70px;resize:none;}

.table{
    width:100%;
    border-collapse:collapse;
    background:#fff;
}
.table th,.table td{
    border:1px solid var(--border);
    padding:8px;
    text-align:center;
}
.table th{background:#e0e7ff;}

.submit-box{text-align:center;margin-top:30px;}
button{
    background:linear-gradient(90deg,var(--primary),var(--secondary));
    color:#fff;
    padding:14px 40px;
    font-size:16px;
    border:none;
    border-radius:30px;
    cursor:pointer;
}
</style>

<script>
function calculateAge(){
    const dob = document.getElementById("dob").value;
    if(dob){
        const birth = new Date(dob);
        const today = new Date();
        let age = today.getFullYear() - birth.getFullYear();
        const m = today.getMonth() - birth.getMonth();
        if(m < 0 || (m === 0 && today.getDate() < birth.getDate())) age--;
        document.getElementById("age").value = age;
    }
}

function toggleReference(){
    let type = document.getElementById("reference_type").value;
    document.getElementById("ref_student").style.display="none";
    document.getElementById("ref_faculty").style.display="none";
    document.getElementById("ref_consultancy").style.display="none";
    document.getElementById("ref_alumni").style.display="none";
    if(type){
        document.getElementById("ref_"+type).style.display="grid";
    }
}
function setTodayDate(){
    const today = new Date();
    const yyyy = today.getFullYear();
    const mm = String(today.getMonth() + 1).padStart(2, '0');
    const dd = String(today.getDate()).padStart(2, '0');
    document.getElementById("date_of_joining").value = `${yyyy}-${mm}-${dd}`;
}

window.onload = function(){
    setTodayDate();
};
</script>
</head>

<body>
<div class="container">
    <!-- BACK BUTTON -->
<div style="margin-bottom:20px;">
    <a href="javascript:history.back()"
       style="
        display:inline-block;
        background:#e5e7eb;
        color:#0f2a5c;
        padding:8px 18px;
        border-radius:20px;
        text-decoration:none;
        font-weight:600;
       ">
        ← Back
    </a>
</div>

<h2>APPLICATION FOR ADMISSION TO DIPLOMA COURSES</h2>

<form action="save.php" method="post" enctype="multipart/form-data">

<!-- COURSE DETAILS -->
<div class="section">
<h3>Course & Admission Details</h3>
<div class="grid">
<div>
<label>Course Applied</label>
<select name="course_name" required>
<option value="">-- Select Course --</option>
<?php
$q = mysqli_query($conn,"SELECT course_name FROM courses WHERE status='active'");
while($c = mysqli_fetch_assoc($q)){
?>
<option value="<?= $c['course_name'] ?>">
    <?= $c['course_name'] ?>
</option>
<?php } ?>
</select>
</div>

<div>
<label>Admission Type</label>
<select name="admission_type">
<option>1st Year</option>
<option>Lateral</option>
<option>Re-Admission</option>
<option>Transfer</option>
</select>
</div>

<div>
<label>Date of Joining</label>
<input type="date" name="date_of_joining" id="date_of_joining">
</div>

<div>
<label>Period of Study</label>
<input type="text" name="period_of_study" value="3 Years">
</div>
</div>
</div>

<!-- STUDENT DETAILS -->
<div class="section">
<h3>Student Details</h3>
<div class="grid">
<div><label>Name</label><input name="student_name" required></div>
<div><label>SSLC / HSC Register No</label><input name="sslc_reg_no"></div>

<div>
<label>Date of Birth</label>
<input type="date" id="dob" name="dob" onchange="calculateAge()" required>
</div>

<div><label>Age</label><input id="age" name="age" readonly></div>

<div>
<label>Mother Tongue</label>
<select name="mother_tongue">
<option>Tamil</option><option>Malayalam</option>
<option>Kannada</option><option>Telugu</option>
</select>
</div>

<div>
<label>Gender</label>
<select name="gender">
<option>Male</option><option>Female</option>
</select>
</div>

<div><label>Religion</label><input name="religion"></div>

<div>
<label>Community</label>
<select name="community">
<option>SC</option><option>ST</option><option>DNC</option>
<option>MBC</option><option>BC</option><option>FC</option><option>Others</option>
</select>
</div>

<div><label>Caste</label><input name="caste"></div>
<div><label>Aadhar No</label><input name="aadhar_no"></div>
<div><label>UMIS No</label><input name="umis_no"></div>
<div><label>EMIS No</label><input name="emis_no"></div>

<div>
<label>Blood Group</label>
<select name="blood_group">
<option>A+</option><option>A-</option>
<option>B+</option><option>B-</option>
<option>O+</option><option>O-</option>
<option>AB+</option><option>AB-</option>
</select>
</div>

<div><label>Phone</label><input name="phone"></div>
<div><label>Email</label><input type="email" name="email"></div>
<div><label>Communication Address</label><textarea name="address"></textarea></div>
</div>
</div>

<!-- PARENT / GUARDIAN -->
<div class="section">
<h3>Parent / Guardian Details</h3>
<div class="grid">
<div><label>Father Name</label><input name="father_name"></div>
<div><label>Father Mobile</label><input name="father_mobile"></div>
<div><label>Father Occupation</label><input name="father_occupation"></div>
<div><label>Father Income</label><input name="father_income"></div>

<div><label>Mother Name</label><input name="mother_name"></div>
<div><label>Mother Mobile</label><input name="mother_mobile"></div>
<div><label>Mother Occupation</label><input name="mother_occupation"></div>
<div><label>Mother Income</label><input name="mother_income"></div>

<div><label>Guardian Name</label><input name="guardian_name"></div>
<div><label>Guardian Mobile</label><input name="guardian_mobile"></div>
<div><label>Guardian Occupation</label><input name="guardian_occupation"></div>
<div><label>Guardian Address</label><textarea name="guardian_address"></textarea></div>
</div>
</div>

<!-- BANK -->
<div class="section">
<h3>Student Bank Details</h3>
<div class="grid">
<div><label>Bank Name</label><input name="bank_name"></div>
<div><label>Branch</label><input name="bank_branch"></div>
<div><label>Account No</label><input name="bank_account_no"></div>
<div><label>IFSC Code</label><input name="ifsc_code"></div>
</div>
</div>

<!-- TRANSPORT -->
<div class="section">
<h3>Transport / Hostel</h3>
<div class="grid">
<div>
<label>College Bus</label>
<select name="transport_required">
<option>No</option><option>Yes</option>
</select>
</div>
<div><label>Place From</label><input name="transport_place_from"></div>
<div>
<label>Hostel Required</label>
<select name="hostel_required">
<option>No</option><option>Yes</option>
</select>
</div>
</div>
</div>

<!-- DOCUMENTS -->
<div class="section">
<h3>Documents Upload</h3>
<div class="grid">
<div><label>SSLC Marksheet</label><input type="file" name="sslc_marksheet"></div>
<div><label>Transfer Certificate</label><input type="file" name="transfer_certificate"></div>
<div><label>Community Certificate</label><input type="file" name="community_certificate"></div>
<div><label>Aadhar</label><input type="file" name="aadhar_document"></div>
<div><label>Income Certificate</label><input type="file" name="income_certificate"></div>
<div><label>Bank Passbook</label><input type="file" name="bank_passbook"></div>
</div>
</div>

<!-- REFERENCE -->
<div class="section">
<h3>Reference Details</h3>
<div class="grid">
<div>
<label>Reference Type</label>
<select name="reference_type" id="reference_type" onchange="toggleReference()">
<option value="">Select</option>
<option value="student">Student</option>
<option value="faculty">Faculty</option>
<option value="consultancy">Consultancy</option>
<option value="alumni">Alumni</option>
</select>
</div>
</div>

<div class="grid" id="ref_student" style="display:none;">
<div><label>Student Name</label><input name="ref_student_name"></div>
<div><label>Student Year</label><input name="ref_student_year"></div>
<div><label>Student Department</label><input name="ref_student_department"></div>
</div>

<div class="grid" id="ref_faculty" style="display:none;">
<div><label>Faculty Name</label><input name="ref_faculty_name"></div>
<div><label>Faculty Department</label><input name="ref_faculty_department"></div>
<div><label>Faculty Designation</label><input name="ref_faculty_designation"></div>
</div>

<div class="grid" id="ref_consultancy" style="display:none;">
<div><label>Consultancy Name</label><input name="ref_consultancy_name"></div>
<div><label>Consultancy Contact</label><input name="ref_consultancy_contact"></div>
</div>

<div class="grid" id="ref_alumni" style="display:none;">
<div><label>Alumni Name</label><input name="ref_alumni_name"></div>
<div><label>Passed Year</label><input name="ref_alumni_passed_year"></div>
<div><label>Department</label><input name="ref_alumni_department"></div>
</div>
</div>

<div class="submit-box">
<button type="submit">Submit Admission Application</button>
</div>

</form>
</div>
</body>
</html>
