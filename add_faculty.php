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
<title>Add Faculty</title>
<link rel="stylesheet" href="../css/admin.css">
</head>
<body>

<div class="main">
<h2>Add Faculty</h2>

<form method="post">
    <input type="text" name="faculty_id" placeholder="Faculty ID" required><br><br>
    <input type="text" name="first_name" placeholder="First Name" required><br><br>
    <input type="text" name="last_name" placeholder="Last Name" required><br><br>
    <input type="email" name="email" placeholder="Email"><br><br>
    <input type="text" name="phone" placeholder="Phone"><br><br>

    <select name="course_code" required>
        <option value="">-- Select Course --</option>
        <?php
        $res = $conn->query("SELECT course_code, course_name FROM courses");
        while($c = $res->fetch_assoc()){
            echo "<option value='{$c['course_code']}'>{$c['course_code']} - {$c['course_name']}</option>";
        }
        ?>
    </select><br><br>

    <input type="text" name="designation" placeholder="Designation"><br><br>
    <input type="text" name="qualification" placeholder="Qualification"><br><br>

    <button type="submit" name="save">Add Faculty</button>
</form>

<?php
if (isset($_POST['save'])) {
    $conn->query("
        INSERT INTO faculty
        (faculty_id,first_name,last_name,email,phone,course_code,designation,qualification)
        VALUES
        ('$_POST[faculty_id]','$_POST[first_name]','$_POST[last_name]',
         '$_POST[email]','$_POST[phone]','$_POST[course_code]',
         '$_POST[designation]','$_POST[qualification]')
    ");
    echo "<p style='color:green'>Faculty Added Successfully</p>";
}
?>
</div>

</body>
</html>
