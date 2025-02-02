<?php

include 'User.php';

session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
echo "Checking for Database.php...<br>";
if (!file_exists('Database.php')) {
    die("Error: Database.php file not found!");
}

echo "Including Database.php...<br>";
include 'Database.php';
echo "Database.php included.<br>";

echo "Checking for Database class...<br>";
if (!class_exists('Database')) {
    die("Error: Database class not found!");
}

echo "Including User.php...<br>";
if (!include 'User.php') {
    die("Error: Failed to include User.php!");
}
echo "User.php included.<br>";

echo "Creating database connection...<br>";
$database = new Database();
$db = $database->getConnection();

if ($db === null) {
    die("Error: Database connection failed!");
} else {
    echo "Database connected successfully!<br>";
}
$user = new User($db);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $user->username = $_POST['username'];
    $user->email = $_POST['email'];
    $user->password = $_POST['password'];


    if ($user->register()) {

        header("Location: login.php");
        exit();
    } else {
        echo "Registration failed. Please try again.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Register</h2>
    <form action="register.php" method="POST">
        <div class="input-box">
            <label for="Username">Username</label>
            <input type="text" name="username" required>
        </div>
        <div class="input-box">
            <label for="Email">Email</label>
            <input type="email" name="email" required>
        </div>
        <div class="input-box">
            <label for="Password">Password</label>
            <input type="password" name="password" required>
        </div>
        <button type="submit" class="btn">Register</button>
    </form>
    <p>Already have an account? <a href="login.php">Login</a></p>
</body>
</html>