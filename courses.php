<?php include "../config/db.php"; ?>
<h2>Add Course</h2>
<form method="post">
    Code <input name="code" required>
    Name <input name="name" required>
    Intake <input name="intake" required>
    <button name="add">Add</button>
</form>

<?php
if (isset($_POST['add'])) {
    $conn->query("INSERT INTO courses
    (course_code,course_name,approved_intake,duration_years,total_semesters,year_of_established)
    VALUES ('$_POST[code]','$_POST[name]',$_POST[intake],3,6,2020)");
    echo "Course Added";
}
?>
