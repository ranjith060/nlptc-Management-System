<?php include "config/db.php"; ?>
<!DOCTYPE html>
<html>
<head>
<title>Student Admission</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<h2>Admission Application – NLPTC</h2>

<form method="post">

<h3>Basic Details</h3>
<input name="admission_no" placeholder="Admission No" required>
<input name="student_name" placeholder="Student Name" required>
<input type="date" name="dob" required>
<input name="phone" placeholder="Mobile No" required>

<h3>Course</h3>
<input name="course_code" placeholder="Course Code (CSE / MECH)" required>

<h3>Eligibility (SSLC Total Marks)</h3>
<input name="qualification" value="SSLC" readonly>
<input name="total_marks" placeholder="Total Obtained Marks" required>

<button name="apply">Apply</button>
</form>

<?php
if (isset($_POST['apply'])) {

  $conn->query("
    INSERT INTO admission_applications
    (admission_no,student_name,dob,phone,course_code)
    VALUES
    ('$_POST[admission_no]','$_POST[student_name]',
     '$_POST[dob]','$_POST[phone]','$_POST[course_code]')
  ");

  $conn->query("
    INSERT INTO eligibility
    (admission_no,qualification,total_obtained_marks)
    VALUES
    ('$_POST[admission_no]','$_POST[qualification]',
     '$_POST[total_marks]')
  ");

  echo "Application Submitted Successfully";
}
?>

</body>
</html>
