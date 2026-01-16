<?php
include("../../config/db.php");
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Student</title>

<style>
body{
    background:#f4f6f9;
    font-family:Segoe UI,Arial;
    padding:30px;
}
.card{
    max-width:950px;
    margin:auto;
    background:#fff;
    padding:30px;
    border-radius:16px;
    box-shadow:0 20px 40px rgba(0,0,0,.15);
}
h2{text-align:center;color:#1e3a8a;}
label{font-weight:600;margin-top:12px;display:block;}
input,select,textarea{
    width:100%;
    padding:10px;
    margin-top:6px;
    border-radius:8px;
    border:1px solid #ccc;
}
textarea{resize:none;height:70px;}
input:focus,select:focus{
    outline:none;border-color:#2563eb;
}
.grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(240px,1fr));
    gap:16px;
}
.actions{
    margin-top:30px;
    display:flex;
    justify-content:space-between;
}
button{
    background:#1e40af;
    color:#fff;
    padding:12px 36px;
    border:none;
    border-radius:30px;
    font-weight:600;
    cursor:pointer;
}
.back{
    text-decoration:none;
    font-weight:600;
    color:#475569;
}
</style>
</head>

<body>

<div class="card">
<a href="list.php" class="back">← Back to Students</a>

<h2>Add Student</h2>

<form method="post" enctype="multipart/form-data">

<div class="grid">

<!-- BASIC -->
<div><label>Student ID</label><input name="student_id" required></div>
<div><label>Student Name</label><input name="student_name" required></div>
<div><label>Date of Birth</label><input type="date" name="dob" required></div>
<div>
<label>Gender</label>
<select name="gender">
<option>Male</option><option>Female</option>
</select>
</div>

<div><label>Mother Tongue</label><input name="mother_tongue"></div>
<div><label>Religion</label><input name="religion"></div>
<div><label>Community</label><input name="community"></div>
<div><label>Caste</label><input name="caste"></div>

<div><label>Aadhar No</label><input name="aadhar_no"></div>
<div><label>UMIS No</label><input name="umis_no"></div>
<div><label>EMIS No</label><input name="emis_no"></div>

<div>
<label>Blood Group</label>
<select name="blood_group">
<option>A+</option><option>A-</option><option>B+</option><option>B-</option>
<option>O+</option><option>O-</option><option>AB+</option><option>AB-</option>
</select>
</div>

<div><label>Phone</label><input name="phone"></div>
<div><label>Email</label><input type="email" name="email"></div>
<div><label>Address</label><textarea name="address"></textarea></div>

<div>
<label>Course</label>
<select name="course_code" required>
<option value="">Select Course</option>
<?php
$cq=mysqli_query($conn,"SELECT course_code,course_name FROM courses WHERE status='active'");
while($c=mysqli_fetch_assoc($cq)){
echo "<option value='{$c['course_code']}'>{$c['course_name']}</option>";
}
?>
</select>
</div>

<div><label>Date of Joining</label><input type="date" name="date_of_joining" required></div>
<div><label>Batch Year</label><input name="batch_year" placeholder="2023-2026" required></div>
<div><label>Register No</label><input name="reg_no" required></div>

<div>
<label>Current Year</label>
<select name="current_year">
<option value="1">1</option><option value="2">2</option><option value="3">3</option>
</select>
</div>

<div>
<label>Current Semester</label>
<select name="current_semester">
<?php for($i=1;$i<=6;$i++) echo "<option>$i</option>"; ?>
</select>
</div>

<div>
<label>Student Photo</label>
<input type="file" name="student_photo">
</div>

</div>

<div class="actions">
<button name="save">Save Student</button>
</div>

</form>
</div>

<?php
if(isset($_POST['save'])){

function upload($k,$d="../../uploads/students/"){
if(!isset($_FILES[$k])||$_FILES[$k]['error']!=0) return null;
if(!is_dir($d)) mkdir($d,0777,true);
$f=time()."_".$_FILES[$k]['name'];
move_uploaded_file($_FILES[$k]['tmp_name'],$d.$f);
return $d.$f;
}

$photo=upload("student_photo");

mysqli_query($conn,"
INSERT INTO students(
student_id,student_name,dob,mother_tongue,gender,religion,community,caste,
aadhar_no,umis_no,emis_no,blood_group,phone,email,address,student_photo,
course_code,date_of_joining,batch_year,reg_no,current_year,current_semester
) VALUES (
'{$_POST['student_id']}','{$_POST['student_name']}','{$_POST['dob']}',
'{$_POST['mother_tongue']}','{$_POST['gender']}','{$_POST['religion']}',
'{$_POST['community']}','{$_POST['caste']}',
'{$_POST['aadhar_no']}','{$_POST['umis_no']}','{$_POST['emis_no']}',
'{$_POST['blood_group']}','{$_POST['phone']}','{$_POST['email']}',
'{$_POST['address']}','$photo',
'{$_POST['course_code']}','{$_POST['date_of_joining']}','{$_POST['batch_year']}',
'{$_POST['reg_no']}','{$_POST['current_year']}','{$_POST['current_semester']}'
)
");

header("Location: list.php?added=1");
exit;
}
?>

</body>
</html>
