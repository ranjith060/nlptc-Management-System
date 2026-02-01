<?php include("../../config/db.php"); ?>

<h2>DOTE – Quota Distribution</h2>

<?php
$q = mysqli_query($conn,"
SELECT d.*, c.course_name
FROM dote_course_intake d
JOIN courses c ON d.course_code=c.course_code
");

while($r=mysqli_fetch_assoc($q)){
    echo "<h3>{$r['course_name']} ({$r['academic_year']})</h3>";

    $govt = $r['govt_quota'];
    $qm = mysqli_query($conn,"SELECT * FROM dote_quota_master");

    $used = 0;
    while($qv=mysqli_fetch_assoc($qm)){
        $seats = floor(($govt * $qv['percentage'])/100);
        $used += $seats;

        mysqli_query($conn,"
        REPLACE INTO dote_quota_allocation
        (academic_year,course_code,quota_code,allotted_seats)
        VALUES
        ('{$r['academic_year']}','{$r['course_code']}','{$qv['quota_code']}','$seats')
        ");

        echo "{$qv['quota_name']} : $seats<br>";
    }

    echo "<hr>";
}
?>
