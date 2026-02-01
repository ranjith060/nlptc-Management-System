<?php
session_start();
if(!isset($_SESSION['role']) || $_SESSION['role']!='admin'){
    header("Location: ../../auth/login.php");
    exit;
}
?>
<h2>Admin Profile</h2>
<p>Profile update feature (name, password)</p>
