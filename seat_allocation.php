<?php
session_start();
if(!isset($_SESSION['role']) || $_SESSION['role']!='admin'){
    header("Location: ../../auth/login.php");
    exit;
}
?>
<h2>DOTE Seat Allocation</h2>
<p>Seats allocated based on reservation rules (SC/ST/OBC/OC)</p>
