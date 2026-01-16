<?php
session_start();
session_destroy();
header("Location: login.php");
exit;
?>
<?php
session_start();
include("../config/db.php");

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users
            WHERE username='$username'
            AND password='$password'
            AND is_active='yes'";
    $res = $conn->query($sql);

    if($res->num_rows == 1){
        $row = $res->fetch_assoc();
        $_SESSION['username'] = $row['username'];
        $_SESSION['role']     = $row['role'];

        if($row['role'] == 'admin'){
            header("Location: ../admin/dashboard.php");
        }
        elseif($row['role'] == 'faculty'){
            header("Location: ../faculty/dashboard.php");
        }
        else{
            header("Location: ../student/dashboard.php");
        }
    } else {
        echo "<p style='color:red'>Invalid Username or Password</p>";
    }
}
?>

<form method="post">
Username <input type="text" name="username" required><br><br>
Password <input type="password" name="password" required><br><br>
<button name="login">Login</button>
</form>
