<?php
session_start();
/* Optional login check – you can remove if public */
if (!isset($_SESSION['role'])) {
    // comment next 2 lines if admission is public
    // header("Location: ../admin_login.php");
    // exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Admission Form</title>
    <style>
        body{
            background:#f2f2f2;
            font-family:"Times New Roman", serif;
        }
        .container{
            width:900px;
            margin:20px auto;
            background:#fff;
            padding:20px;
            border:1px solid #000;
        }
        h2{
            text-align:center;
            text-decoration:underline;
        }
        table{
            width:100%;
            border-collapse:collapse;
        }
        td{
            padding:8px;
        }
        input, select, textarea{
            width:95%;
            padding:5px;
        }
        .section{
            background:#e6e6e6;
            font-weight:bold;
            padding:6px;
            margin-top:15px;
        }
        button{
            padding:10px 30px;
            font-size:16px;
        }
        .header{
            text-align:center;
            margin-bottom:15px;
        }
        .header img{
            max-height:120px;
        }
    </style>
</head>

<body>

<div class="container">

<!-- ===== College Header ===== -->
<div class="header">
    <img src="../assets/images/college_header.png" alt="College Header">
</div>

<h2>STUDENT ADMISSION FORM</h2>

<form method="POST" action="save_student_admission.php" enctype="multipart/form-data">

<!-- ===== Admission Details ===== -->
<div class="section">Admission Details</div>
<table>
<tr>
<td>Admission Type</td>
<td>
<select name="course_applied" required>
<option value="">-- Select --</option>
<option>1st Year</option>
<option>Lateral Entry</option>
<option>Re-Admission</option>
<option>Transfer</option>
</select>
</td>
<td>Roll / Reg No</td>
<td><input name="roll_no"></td>
</tr>

<tr>
<td>Program</td>
<td colspan="3">
<select name="program" required>
<option value="">-- Select Program --</option>
<option>Diploma in Computer Engineering</option>
<option>Diploma in Mechanical Engineering</option>
<option>Diploma in Civil Engineering</option>
<option>Diploma in Electrical & Electronics Engineering</option>
<option>Diploma in Electronics & Communication Engineering</option>
<option>Diploma in Automobile Engineering</option>
</select>
</td>
</tr>

<tr>
<td>Date of Joining</td>
<td><input type="date" name="date_of_joining"></td>
<td>Period of Study</td>
<td><input name="period_of_study"></td>
</tr>
</table>

<!-- ===== Student Details ===== -->
<div class="section">Student Personal Details</div>
<table>
<tr>
<td>First Name</td><td><input name="first_name" required></td>
<td>Last Name</td><td><input name="last_name"></td>
</tr>

<tr>
<td>Date of Birth</td><td><input type="date" name="dob" required></td>
<td>Age</td><td><input name="age"></td>
</tr>

<tr>
<td>Gender</td>
<td>
<select name="gender">
<option>Male</option>
<option>Female</option>
<option>Other</option>
</select>
</td>
<td>Mother Tongue</td><td><input name="mother_tongue"></td>
</tr>

<tr>
<td>Religion</td><td><input name="religion"></td>
<td>Community</td>
<td>
<select name="community">
<option>OC</option>
<option>BC</option>
<option>BCM</option>
<option>MBC</option>
<option>SC</option>
<option>ST</option>
<option>Others</option>
</select>
</td>
</tr>

<tr>
<td>Caste</td><td><input name="caste"></td>
<td>Blood Group</td>
<td>
<select name="blood_group">
<option>A+</option><option>A-</option>
<option>B+</option><option>B-</option>
<option>AB+</option><option>AB-</option>
<option>O+</option><option>O-</option>
</select>
</td>
</tr>

<tr>
<td>Aadhar No</td><td><input name="aadhar_no"></td>
<td>UMIS No</td><td><input name="umis_no"></td>
</tr>

<tr>
<td>Phone</td><td><input name="mobile" required></td>
<td>Email</td><td><input name="email"></td>
</tr>

<tr>
<td>Address</td>
<td colspan="3"><textarea name="current_address"></textarea></td>
</tr>
</table>

<!-- ===== Parent Details ===== -->
<div class="section">Parent / Guardian Details</div>
<table>
<tr>
<td>Father Name</td><td><input name="father_name"></td>
<td>Father Occupation</td><td><input name="father_occupation"></td>
</tr>
<tr>
<td>Father Income</td><td><input name="father_income"></td>
<td>Father Mobile</td><td><input name="father_phone"></td>
</tr>

<tr>
<td>Mother Name</td><td><input name="mother_name"></td>
<td>Mother Occupation</td><td><input name="mother_occupation"></td>
</tr>
<tr>
<td>Mother Income</td><td><input name="mother_income"></td>
<td>Mother Mobile</td><td><input name="mother_phone"></td>
</tr>

<tr>
<td>Guardian Name</td><td><input name="guardian_name"></td>
<td>Guardian Mobile</td><td><input name="guardian_phone"></td>
</tr>
</table>

<!-- ===== Academic Marks (SSLC) ===== -->
<div class="section">SSLC Marks</div>
<table border="1">
<tr><th>Subject</th><th>Marks (out of 100)</th></tr>
<tr><td>Tamil</td><td><input name="tam_scored"></td></tr>
<tr><td>English</td><td><input name="eng_scored"></td></tr>
<tr><td>Maths</td><td><input name="mat_scored"></td></tr>
<tr><td>Science</td><td><input name="sci_scored"></td></tr>
<tr><td>Social Science</td><td><input name="soc_scored"></td></tr>
</table>

<br>
<center>
<button type="submit">SUBMIT ADMISSION</button>
</center>

</form>
</div>

</body>
</html>
