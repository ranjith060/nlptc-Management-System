<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>

    <!-- IMPORTANT CSS LINK -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
    <h2>Admin Login</h2>

    <form action="auth/login.php" method="post">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
</div>

</body>
</html>
