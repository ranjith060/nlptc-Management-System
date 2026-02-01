<?php
include("../../config/db.php");

function upload($name){
 if(!isset($_FILES[$name]) || $_FILES[$name]['error']!=0) return null;
 $dir="../../uploads/faculty/";
 if(!is_dir($dir)) mkdir($dir,0777,true);
 $file=time()."_".$_FILES[$name]['name'];
 move_uploaded_file($_FILES[$name]['tmp_name'],$dir.$file);
 return $dir.$file;
}

if(isset($_POST['save'])){

$profile = upload("profile_photo");
$resume  = upload("resume_pdf");
$sslc    = upload("sslc_hsc_certificate");
$degree  = upload("higher_degree_proof");

mysqli_query($conn,"
INSERT INTO faculty(
 faculty_id,first_name,last_name,email,phone,
 course_code,designation,qualification,specialization,
 date_of_joining,pan_id,aadhar_id,
 resume_pdf,sslc_hsc_certificate,higher_degree_proof,
 profile_photo,status
) VALUES(
 '{$_POST['faculty_id']}','{$_POST['first_name']}','{$_POST['last_name']}',
 '{$_POST['email']}','{$_POST['phone']}',
 '{$_POST['course_code']}','{$_POST['designation']}',
 '{$_POST['qualification']}','{$_POST['specialization']}',
 '{$_POST['date_of_joining']}','{$_POST['pan_id']}','{$_POST['aadhar_id']}',
 '$resume','$sslc','$degree','$profile',
 '{$_POST['status']}'
)
");

header("Location: list.php");
}
