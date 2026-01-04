<?php
include "../config/db.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // 1️⃣ Generate Admission No
    $admission_no = "ADM" . time();

    // 2️⃣ Student basic details
    $student_name = $_POST['first_name']." ".$_POST['last_name'];
    $dob = $_POST['dob'];
    $phone = $_POST['mobile'];
    $course_code = $_POST['program'];

    // 3️⃣ Upload Student Photo
    $student_photo = "";
    if (!empty($_FILES['student_photo']['name'])) {
        $student_photo = $admission_no."_student.jpg";
        move_uploaded_file(
            $_FILES['student_photo']['tmp_name'],
            "../uploads/students/photos/".$student_photo
        );
    }

    // 4️⃣ Insert into admission_applications
    $conn->query("
        INSERT INTO admission_applications
        (admission_no, student_name, dob, phone, course_code, student_photo, application_status)
        VALUES
        ('$admission_no','$student_name','$dob','$phone','$course_code','$student_photo','waiting')
    ");

    // 5️⃣ Calculate marks
    $total_marks =
        $_POST['tam_scored'] +
        $_POST['eng_scored'] +
        $_POST['mat_scored'] +
        $_POST['sci_scored'] +
        $_POST['soc_scored'];

    $percentage = round(($total_marks / 500) * 100, 2);

    // 6️⃣ Insert into eligibility
    $conn->query("
        INSERT INTO eligibility
        (admission_no, qualification, total_obtained_marks, percentage)
        VALUES
        ('$admission_no','SSLC','$total_marks','$percentage')
    ");

    // 7️⃣ Upload documents
    if (!empty($_FILES['documents']['name'][0])) {
        for ($i = 0; $i < count($_FILES['documents']['name']); $i++) {
            $doc_name = $admission_no."_".$_FILES['documents']['name'][$i];
            move_uploaded_file(
                $_FILES['documents']['tmp_name'][$i],
                "../uploads/students/documents/".$doc_name
            );
        }
    }

    echo "<h2>Admission Submitted Successfully</h2>";
    echo "<p>Your Admission No: <b>$admission_no</b></p>";
}
?>
