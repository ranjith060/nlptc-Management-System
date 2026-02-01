<?php
session_start();
if(!isset($_SESSION['role']) || $_SESSION['role']!='admin'){
    header("Location: ../../auth/login.php");
    exit;
}
?>
<h2>B-FORM</h2>
<p>Generate B-Form for DOTE submission</p>
