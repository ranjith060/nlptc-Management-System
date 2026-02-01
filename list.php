<?php
include("../../config/db.php");

// ================= FILTER CONDITIONS =================
$where = "WHERE 1";

if (!empty($_GET['course_code'])) {
    $where .= " AND s.course_code='{$_GET['course_code']}'";
}
if (!empty($_GET['batch_year'])) {
    $where .= " AND s.batch_year='{$_GET['batch_year']}'";
}
if (!empty($_GET['current_year'])) {
    $where .= " AND s.current_year='{$_GET['current_year']}'";
}
if (!empty($_GET['current_semester'])) {
    $where .= " AND s.current_semester='{$_GET['current_semester']}'";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Student Management</title>

<style>
body{
    background:#f4f6f9;
    font-family:Segoe UI,Arial;
    padding:30px;
}
.header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:20px;
}
h2{margin:0;color:#1e3a8a;}
.btn{
    background:#1e40af;
    color:#fff;
    padding:10px 22px;
    text-decoration:none;
    border-radius:30px;
    font-weight:600;
}
.btn-back{
    background:#475569;
}
.card{
    background:#fff;
    border-radius:16px;
    box-shadow:0 20px 40px rgba(0,0,0,.15);
    padding:20px;
}

/* ===== FILTER UI UPDATED ===== */
.filters{
    background:#eef2ff;
    border:1px solid #c7d2fe;
    padding:15px;
    border-radius:14px;
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(180px,1fr));
    gap:12px;
    margin-bottom:20px;
}
.filters select,
.filters button{
    padding:10px;
    border-radius:8px;
    border:1px solid #94a3b8;
}
.filters button{
    background:#1e40af;
    color:#fff;
    font-weight:600;
    cursor:pointer;
}
.filters button:hover{
    background:#1e3a8a;
}

/* ===== TABLE ===== */
table{
    width:100%;
    border-collapse:collapse;
}
th,td{
    padding:12px;
    border-bottom:1px solid #e5e7eb;
    text-align:center;
}
th{
    background:#e0e7ff;
}
tbody tr:hover{
    background:#f8fafc;
}
.action a{
    font-weight:600;
    margin:0 6px;
    text-decoration:none;
}
.edit{color:#2563eb;}
.delete{color:#dc2626;}
</style>
</head>

<body>

<div class="header">
    <div style="display:flex;gap:12px;align-items:center;">
        <a href="../dashboard.php" class="btn btn-back">← Back</a>
        <h2>Student Management</h2>
    </div>

    <a href="add.php" class="btn">+ Add Student</a>
</div>

<div class="card">

<!-- ================= FILTER FORM ================= -->
<form method="get" class="filters">

<select name="course_code">
    <option value="">All Courses</option>
    <?php
    $cq = mysqli_query($conn,"SELECT course_code,course_name FROM courses");
    while($c=mysqli_fetch_assoc($cq)){
        $sel = ($_GET['course_code']??'')==$c['course_code']?"selected":"";
        echo "<option value='{$c['course_code']}' $sel>{$c['course_name']}</option>";
    }
    ?>
</select>

<select name="batch_year">
    <option value="">All Batches</option>
    <?php
    for($y=date("Y")-5;$y<=date("Y")+1;$y++){
        $by = $y."-".($y+3);
        $sel = ($_GET['batch_year']??'')==$by?"selected":"";
        echo "<option $sel>$by</option>";
    }
    ?>
</select>

<select name="current_year">
    <option value="">Year</option>
    <option value="1">1st Year</option>
    <option value="2">2nd Year</option>
    <option value="3">3rd Year</option>
</select>

<select name="current_semester">
    <option value="">Semester</option>
    <?php for($i=1;$i<=6;$i++) echo "<option>$i</option>"; ?>
</select>

<button type="submit">Apply Filter</button>
</form>

<!-- ================= STUDENT TABLE ================= -->
<table>
<tr>
<th>ID</th>
<th>Name</th>
<th>Course</th>
<th>Batch</th>
<th>Year</th>
<th>Sem</th>
<th>Action</th>
</tr>

<?php
$q = mysqli_query($conn,"
    SELECT s.*, c.course_name
    FROM students s
    JOIN courses c ON s.course_code=c.course_code
    $where
    ORDER BY s.created_at DESC
");

while($r=mysqli_fetch_assoc($q)){
?>
<tr>
<td><?= $r['student_id'] ?></td>
<td><?= $r['student_name'] ?></td>
<td><?= $r['course_name'] ?></td>
<td><?= $r['batch_year'] ?></td>
<td><?= $r['current_year'] ?></td>
<td><?= $r['current_semester'] ?></td>
<td class="action">
    <a class="edit" href="view.php?id=<?= $r['student_id'] ?>">View</a> |
    <a class="edit" href="edit.php?id=<?= $r['student_id'] ?>">Edit</a> |
    <a class="delete"
       href="delete.php?id=<?= $r['student_id'] ?>"
       onclick="return confirm('Delete student?')">Delete</a>
</td>

</tr>
<?php } ?>

</table>

</div>
</body>
</html>
