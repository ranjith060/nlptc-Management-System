<?php
session_start();
include("../config/db.php");

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users
            WHERE username='$username'
              AND password='$password'
              AND is_active='yes'";

    $res = $conn->query($sql);

    if ($res && $res->num_rows == 1) {
        $row = $res->fetch_assoc();

        $_SESSION['username'] = $row['username'];
        $_SESSION['role']     = $row['role'];

        if ($row['role'] == 'admin') {
            header("Location: ../admin/dashboard.php");
            exit;
        } elseif ($row['role'] == 'faculty') {
            header("Location: ../faculty/dashboard.php");
            exit;
        } else {
            header("Location: ../student/dashboard.php");
            exit;
        }
    } else {
        $error = "Invalid Username or Password";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login | NLPTC</title>

    <style>
        * {
            box-sizing: border-box;
            font-family: "Segoe UI", sans-serif;
        }

        body {
            margin: 0;
            height: 100vh;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-box {
            width: 360px;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.25);
            animation: floatIn 0.8s ease;
        }

        @keyframes floatIn {
            from {
                transform: translateY(40px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .login-box h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #1e3c72;
        }

        label {
            font-size: 14px;
            font-weight: 600;
            color: #444;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0 15px;
            border-radius: 6px;
            border: 1px solid #ccc;
            transition: 0.3s;
        }

        input:focus {
            outline: none;
            border-color: #1e3c72;
            box-shadow: 0 0 6px rgba(30,60,114,0.4);
        }

        button {
            width: 100%;
            padding: 10px;
            background: #1e3c72;
            color: #fff;
            border: none;
            border-radius: 6px;
            font-size: 15px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background: #16305c;
            transform: translateY(-1px);
        }

        .error {
            color: red;
            text-align: center;
            margin-bottom: 10px;
            font-size: 14px;
        }

        .footer-text {
            text-align: center;
            margin-top: 15px;
            font-size: 12px;
            color: #777;
        }
        .back-link {
    display: block;
    text-align: center;
    margin-top: 12px;
    font-size: 14px;
    color: #1e3c72;
    text-decoration: none;
    font-weight: 600;
}

.back-link:hover {
    text-decoration: underline;
}

    </style>
</head>

<body>

<div class="login-box">
    <h2>User Login</h2>

    <?php
    if (isset($error)) {
        echo "<div class='error'>$error</div>";
    }
    ?>

    <form method="post">
        <label>Username</label>
        <input type="text" name="username" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <button type="submit" name="login">Login</button>
    </form>

    <div class="footer-text">
        © NLPTC Admission System
    </div>
    <a href="../index.php" class="back-link">← Back to Home</a>
</div>

</body>
</html>
