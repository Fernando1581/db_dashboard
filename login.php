<?php
session_start();
 
// If already logged in, redirect to index
if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
 
$error = "";
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $username = $_POST['username'];
    $password = $_POST['password'];
 
    // Static admin login
    if ($username === "admin" && $password === "admin") {
 
        $_SESSION['username'] = "ADMIN";
        header("Location: index.php");
        exit();
 
    } else {
        $error = "Invalid username or password!";
    }
}
?>
 
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
 
<div class="add_client">
    <h2>Login Form</h2>
    
    <?php if ($error != ""): ?>
        <p style="color:red;"><?php echo $error; ?></p>
    <?php endif; ?>
    
    <form method="POST">
        <label>Username:</label>
        <input type="text" name="username" required>
    
        <label>Password:</label>
        <input type="password" name="password" required>
    
        <button type="submit">Login</button>
    </form>
</div>
 
</body>
</html>
