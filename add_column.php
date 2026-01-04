<?php include "../config/db.php"; ?>
<h2>Add Column (Admin Customization)</h2>
<form method="post">
    Table <input name="table">
    Column <input name="column">
    Type <input name="type" placeholder="VARCHAR(50)">
    <button name="add">Add</button>
</form>

<?php
if (isset($_POST['add'])) {
    $conn->query("ALTER TABLE $_POST[table] ADD $_POST[column] $_POST[type]");
    echo "Column Added";
}
?>
