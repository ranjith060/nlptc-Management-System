<?php
// nlptc/config/db.php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "nlptc_management_system";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to sanitize input (Idha ella file-layum use pannunga)
function sanitize($data, $conn) {
    return mysqli_real_escape_string($conn, htmlspecialchars(strip_tags(trim($data))));
}
?>