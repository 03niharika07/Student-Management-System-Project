<?php
session_start();

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    // Demo login for project
    if ($username === "admin" && $password === "admin123") {
        $_SESSION["admin_logged_in"] = true;
        $_SESSION["admin_name"] = "Admin";
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login - Student Management System</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body class="login-body">

<div class="login-box">
    <h2>Admin Login</h2>
    <p class="small-text">Student Management System</p>

    <?php if ($error != "") { ?>
        <p class="error"><?php echo $error; ?></p>
    <?php } ?>

    <form method="POST" onsubmit="return validateLoginForm()">
        <label>Username</label>
        <input type="text" name="username" id="username" placeholder="Enter username">

        <label>Password</label>
        <input type="password" name="password" id="password" placeholder="Enter password">

        <button type="submit">Login</button>
    </form>

    <p class="hint">Username: admin | Password: admin123</p>
</div>

<script src="assets/script.js"></script>
</body>
</html>
