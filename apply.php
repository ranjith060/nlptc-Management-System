<!DOCTYPE html>
<html>
<head>
    <title>Student Admission | NLPTC</title>
    <link rel="stylesheet" href="../assets/css/main.css">

    <style>
        /* ===== PAGE CENTER ===== */
        body{
            margin:0;
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:flex-start;
            background:#f4f6f9;
            font-family:'Segoe UI', Arial, sans-serif;
        }

        /* ===== MAIN CONTAINER ===== */
        .container{
            width:900px;
            max-width:95%;
            margin:40px auto;
            background:#fff;
            padding:40px;
            border-radius:14px;
            box-shadow:0 10px 25px rgba(0,0,0,0.08);
        }

        h1, p{
            text-align:center;
        }

        h2{
            background:#002b5c;
            color:#fff;
            padding:12px;
            border-radius:6px;
            margin-top:40px;
        }

        /* ===== FORM ALIGNMENT ===== */
        form{
            display:grid;
            grid-template-columns:1fr;
        }

        label{
            font-weight:600;
            margin-top:18px;
            display:block;
        }

        input, select, textarea{
            width:100%;
            padding:10px 12px;
            margin-top:6px;
            border-radius:6px;
            border:1px solid #cbd5e1;
            font-size:14px;
        }

        textarea{
            resize:vertical;
        }

        /* ===== SUBMIT BUTTON ===== */
        .submit-btn{
            margin-top:40px;
            text-align:center;
        }

        button{
            padding:12px 35px;
            font-size:16px;
            border:none;
            border-radius:8px;
            background:#2563eb;
            color:white;
            cursor:pointer;
        }

        button:hover{
            background:#1e40af;
        }
    </style>
</head>

<body>

<div class="container">

<h1>NANJIAH LINGAMMAL POLYTECHNIC COLLEGE</h1>
<p><b>Student Admission Application Form</b></p>

<form action="submit_application.php" method="post" enctype="multipart/form-data">

<!-- ================= PERSONAL DETAILS ================= -->
<h2>1. Personal Details</h2>

<label>Student Name</label>
<input type="text" name="student_name" required>

<label>Date of Birth</label>
<input type="date" name="dob" required>

<label>Age</label>
<input type="number" name="age">

<label>Gender</label>
<select name="gender">
    <option value="Male">Male</option>
    <option value="Female">Female</option>
</select>

<label>Mother Tongue</label>
<input type="text" name="mother_tongue">

<label>Religion</label>
<input type="text" name="religion">

<label>Community</label>
<input type="text" name="community">

<label>Caste</label>
<input type="text" name="caste">

<label>Aadhar Number</label>
<input type="text" name="aadhar_no" maxlength="12">

<label>Phone</label>
<input type="text" name="phone">

<label>Email</label>
<input type="email" name="email">

<label>Address</label>
<textarea name="address"></textarea>

<!-- ================= PARENT / GUARDIAN ================= -->
<h2>2. Parent / Guardian Details</h2>

<label>Father Name</label>
<input type="text" name="father_name">

<label>Father Mobile</label>
<input type="text" name="father_mobile">

<label>Father Occupation</label>
<input type="text" name="father_occupation">

<label>Mother Name</label>
<input type="text" name="mother_name">

<label>Mother Mobile</label>
<input type="text" name="mother_mobile">

<label>Guardian Name</label>
<input type="text" name="guardian_name">

<label>Guardian Relation</label>
<input type="text" name="guardian_relation">

<!-- ================= ACADEMIC DETAILS ================= -->
<h2>3. Academic Qualification</h2>

<label>Qualification</label>
<select name="qualification">
    <option value="SSLC">SSLC</option>
    <option value="HSC">HSC</option>
    <option value="ITI">ITI</option>
</select>

<label>School Name</label>
<input type="text" name="school_name">

<label>Year of Passing</label>
<input type="number" name="year_of_passing">

<label>Subject Name</label>
<input type="text" name="subject_name">

<label>Marks Secured</label>
<input type="number" name="marks_secured">

<label>Max Marks</label>
<input type="number" name="max_marks" value="100">

<!-- ================= DOCUMENT UPLOAD ================= -->
<h2>4. Document Upload</h2>

<label>SSLC Marksheet</label>
<input type="file" name="sslc_marksheet">

<label>Transfer Certificate</label>
<input type="file" name="transfer_certificate">

<label>Community Certificate</label>
<input type="file" name="community_certificate">

<label>Aadhar Document</label>
<input type="file" name="aadhar_document">

<!-- ================= BANK & FACILITIES ================= -->
<h2>5. Bank & Facilities</h2>

<label>Bank Name</label>
<input type="text" name="bank_name">

<label>Account Number</label>
<input type="text" name="bank_account_no">

<label>IFSC Code</label>
<input type="text" name="ifsc_code">

<label>Transport Required</label>
<select name="transport_required">
    <option value="No">No</option>
    <option value="Yes">Yes</option>
</select>

<label>Hostel Required</label>
<select name="hostel_required">
    <option value="No">No</option>
    <option value="Yes">Yes</option>
</select>

<!-- ================= SUBMIT ================= -->
<div class="submit-btn">
    <button type="submit" name="submit">Submit Application</button>
</div>

</form>

</div>

</body>
</html>
