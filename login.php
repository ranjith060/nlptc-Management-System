<?php
include "../config/db.php";

$username = trim($_POST['username']);
$password = trim($_POST['password']);

$sql = "SELECT password_hash FROM users WHERE username=? AND role='admin' AND is_active='yes'";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    if (password_verify($password, $row['password_hash'])) {
        $_SESSION['admin'] = $username;
        header("Location: ../admin_dashboard.php");
        exit;
    } else {
        echo "Invalid Password";
    }
} else {
    echo "Admin not found";
}
