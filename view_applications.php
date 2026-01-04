<?php
include "../config/db.php";
if (!isset($_SESSION['admin'])) {
    header("Location: ../admin_login.php");
    exit;
}
?>

<h2>Admission Applications</h2>

<table border="1" cellpadding="6">
<tr>
    <th>Admission No</th>
    <th>Name</th>
    <th>Course</th>
    <th>Status</th>
    <th>Action</th>
</tr>

<?php
$result = $conn->query("SELECT * FROM admission_applications ORDER BY admission_no DESC");

while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>{$row['admission_no']}</td>";
    echo "<td>{$row['student_name']}</td>";
    echo "<td>{$row['course_code']}</td>";
    echo "<td>{$row['application_status']}</td>";
    echo "<td>";

    if ($row['application_status'] == 'waiting') {
        echo "<a href='approve_admission.php?id={$row['admission_no']}'>Approve</a>";
    } else {
        echo "Approved";
    }

    echo "</td></tr>";
}
?>
</table>
