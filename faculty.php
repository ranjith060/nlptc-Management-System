<?php include "../config/db.php"; ?>
<h2>Add Faculty</h2>
<form method="post">
    Faculty ID <input name="fid">
    Name <input name="name">
    Course Code <input name="course">
    <button name="add">Add</button>
</form>

<?php
if (isset($_POST['add'])) {
    $conn->query("INSERT INTO faculty (faculty_id,first_name,course_code)
    VALUES ('$_POST[fid]','$_POST[name]','$_POST[course]')");
    echo "Faculty Added";
}
?>
