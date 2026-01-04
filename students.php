<?php include "../config/db.php"; ?>
<h2>Add Student</h2>
<form method="post">
    Student ID <input name="sid" required>
    Name <input name="name" required>
    Course Code
<select name="course" required>
<option value="">-- Select Course --</option>
<?php
$result = $conn->query("SELECT course_code, course_name FROM courses");
while ($row = $result->fetch_assoc()) {
    echo "<option value='{$row['course_code']}'>
          {$row['course_code']} - {$row['course_name']}
          </option>";
}
?>
</select>

    Reg No <input name="reg" required>
    <button name="add">Add</button>
</form>

<?php
if (isset($_POST['add'])) {
    $conn->query("INSERT INTO students
    (student_id,student_name,course_code,date_of_joining,batch_year,reg_no)
    VALUES
    ('$_POST[sid]','$_POST[name]','$_POST[course]',CURDATE(),'2023-2026','$_POST[reg]')");
    echo "Student Added";
}
?>


