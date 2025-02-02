<?php
session_start(); // Start the session
error_reporting(E_ALL); // Enable error reporting
ini_set('display_errors', 1); // Display errors

// Include the database connection
include 'Database.php';
include 'User.php';

// Create a new database connection
$database = new Database();
$db = $database->getConnection();

// Create a new User object
$user = new User($db);

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Assign form data to the User object
    $user->email = $_POST['email'];
    $user->password = $_POST['password'];

    // Attempt to log in the user
    if ($user->login()) {
        // Redirect to the home page after successful login
        header("Location: index.php");
        exit();
    } else {
        echo "Login failed. Please check your email and password.";
    }
}
?>

<div class="form-box login">
    <h2>Login</h2>
    <form action="login.php" method="POST">
        <div class="input-box">
            <span class="icon">
                <ion-icon name="mail-outline"></ion-icon>
            </span>
            <input type="email" name="email" required>
            <label for="Email">Email</label>
        </div>
        <div class="input-box">
            <span class="icon">
                <ion-icon name="lock-closed-outline"></ion-icon>
            </span>
            <input type="password" name="password" required>
            <label for="Password">Password</label>
        </div>
        <div class="remember-forgot">
            <label><input type="checkbox"> Remember me</label>
            <a href="#">Forgot Password?</a>
        </div>
        <button type="submit" class="btn">Login</button>
        <div class="login-register">
            <p>Don't have an account? <a href="#" class="register-link">Register</a></p>
        </div>
    </form>
</div>