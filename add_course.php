<?php
include "../config/db.php";
if (!isset($_SESSION['admin'])) {
    header("Location: ../admin_login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Course</title>
<link rel="stylesheet" href="../css/admin.css">
</head>
<body>

<div class="main">
<h2>Add Course</h2>

<form method="post">
    <input type="text" name="course_code" placeholder="Course Code" required><br><br>
    <input type="text" name="course_name" placeholder="Course Name" required><br><br>
    <input type="number" name="intake" placeholder="Approved Intake" required><br><br>
    <input type="number" name="duration" placeholder="Duration (Years)" required><br><br>
    <input type="number" name="semesters" placeholder="Total Semesters" required><br><br>
    <input type="number" name="year" placeholder="Year of Established" required><br><br>

    <button type="submit" name="save">Add Course</button>
</form>

<?php
if (isset($_POST['save'])) {
    $conn->query("
        INSERT INTO courses
        (course_code,course_name,approved_intake,duration_years,total_semesters,year_of_established)
        VALUES
        ('$_POST[course_code]','$_POST[course_name]','$_POST[intake]',
         '$_POST[duration]','$_POST[semesters]','$_POST[year]')
    ");
    echo "<p style='color:green'>Course Added Successfully</p>";
}
?>

</div>
</body>
</html>
