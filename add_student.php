<?php
session_start();
include "../config/db.php";
if (!isset($_SESSION['admin'])) {
    header("Location: ../admin_login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Student</title>
<link rel="stylesheet" href="../css/admin.css">
</head>
<body>

<div class="main">
<h2>Add Student (Offline Admission)</h2>

<form method="post">
    <input type="text" name="student_id" placeholder="Student ID" required><br><br>
    <input type="text" name="student_name" placeholder="Student Name" required><br><br>
    <input type="date" name="dob" required><br><br>

    <select name="course_code" required>
        <option value="">-- Select Course --</option>
        <?php
        $res = $conn->query("SELECT course_code, course_name FROM courses");
        while($c = $res->fetch_assoc()){
            echo "<option value='{$c['course_code']}'>{$c['course_code']} - {$c['course_name']}</option>";
        }
        ?>
    </select><br><br>

    <input type="date" name="date_of_joining" required><br><br>
    <input type="text" name="batch_year" placeholder="Batch Year (2023-2026)" required><br><br>
    <input type="number" name="reg_no" placeholder="Register Number" required><br><br>

    <button type="submit" name="save">Add Student</button>
</form>

<?php
if (isset($_POST['save'])) {
    $conn->query("
        INSERT INTO students
        (student_id,student_name,dob,course_code,date_of_joining,batch_year,reg_no)
        VALUES
        ('$_POST[student_id]','$_POST[student_name]','$_POST[dob]',
         '$_POST[course_code]','$_POST[date_of_joining]',
         '$_POST[batch_year]','$_POST[reg_no]')
    ");
    echo "<p style='color:green'>Student Added Successfully</p>";
}
?>
</div>

</body>
</html>
