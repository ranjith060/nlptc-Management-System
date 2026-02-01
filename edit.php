<?php
include("../../config/db.php");
$id=$_GET['id'];
$s=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM students WHERE student_id='$id'"));
if(!$s) die("Invalid Student");
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Student</title>
<link rel="stylesheet" href="../style.css">
</head>

<body style="background:#f4f6f9;padding:30px;font-family:Segoe UI">

<div class="card">
<a href="list.php">← Back</a>
<h2>Edit Student</h2>

<form method="post" enctype="multipart/form-data">

<div class="grid">

<div><label>Student ID</label><input value="<?= $s['student_id'] ?>" readonly></div>
<div><label>Name</label><input name="student_name" value="<?= $s['student_name'] ?>"></div>

<div>
<label>Course</label>
<select name="course_code">
<?php
$cq=mysqli_query($conn,"SELECT course_code,course_name FROM courses");
while($c=mysqli_fetch_assoc($cq)){
$sel=$c['course_code']==$s['course_code']?"selected":"";
echo "<option value='{$c['course_code']}' $sel>{$c['course_name']}</option>";
}
?>
</select>
</div>

<div><label>Batch Year</label><input name="batch_year" value="<?= $s['batch_year'] ?>"></div>
<div><label>Year</label><input name="current_year" value="<?= $s['current_year'] ?>"></div>
<div><label>Semester</label><input name="current_semester" value="<?= $s['current_semester'] ?>"></div>

</div>

<button name="update">Update Student</button>
</form>
</div>

<?php
if(isset($_POST['update'])){
mysqli_query($conn,"
UPDATE students SET
student_name='{$_POST['student_name']}',
course_code='{$_POST['course_code']}',
batch_year='{$_POST['batch_year']}',
current_year='{$_POST['current_year']}',
current_semester='{$_POST['current_semester']}'
WHERE student_id='$id'
");
header("Location: list.php?updated=1");
}
?>

</body>
</html>
