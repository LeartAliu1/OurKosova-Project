<?php
session_start();
require_once 'User.php';

$user = new User();

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    if ($user->register($username, $email, $password)) {
        echo "<script>alert('Registration successful! Please login.');</script>";
    } else {
        echo "<script>alert('Registration failed!');</script>";
    }
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if ($user->login($email, $password)) {
        echo "<script>alert('Login successful!');</script>";
    } else {
        echo "<script>alert('Invalid email or password!');</script>";
    }
}

if (isset($_GET['logout'])) {
    $user->logout();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parks</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="navbar">
        <div class="container">
          <div class="navbar-wrapper">
            <a class="logo" href="./index.html">OurKosova</a>
            <div class="menu">
    <a href="./food.php">Foods</a>
    <a href="./park.php">Parks</a>
    <a href="./Mountains.php">Mountains</a>
    <?php if ($user->isLoggedIn()): ?>
        <span>Welcome, <?php echo $_SESSION['username']; ?></span>
        <a href="?logout=true">Logout</a>
    <?php else: ?>
        <button class="btnLogin-popup">Login</button>
    <?php endif; ?>
</div>
          </div>
        </div>
      </div>
    
      <div class="header header-parks">
        <h1 class="title">
          Kosova Parks
        </h1>
      </div>
      <div class="parks">
        <div class="container">
            <div class="row">

                <div class="col-6">
                    <div class="park-card">
                        <img src="https://cdnb.artstation.com/p/assets/images/images/015/461/791/4k/christoph-schindelar-autumn-park-v5p2.jpg?1548423709"/>
                        <div class="park-content">
                            <p>Parku i qytetit</p>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="park-card">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/6/67/Vjeshta_ne_prishtine.jpg"/>
                        <div class="park-content">
                            <p>Parku i Germise</p>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
      <div class="social-media">
        <a href="https://www.facebook.com/">Facebook</a>
        <a href="https://www.instagram.com/">Instagram</a>
        <a href="https://www.snapchat.com/">Snapchat</a>
        <a href="https://www.x.com/">Twitter</a>
      </div>
      <div class="footer-menu">
        <a href="./food.html">Foods</a>
        <a href="./park.html">Parks</a>
        <a href="./Mountains.html">Mountains</a>
          <a href="./ContactUs.html">Contact Us</a>
      </div>
    </footer>
    <header>
      <div class="wrapper">
          <span class="icon-close">
              <ion-icon name="close-outline"></ion-icon>
          </span>
          <div class="form-box login">
    <h2>Login</h2>
    <form action="" method="POST">
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
        <button type="submit" name="login" class="btn">Login</button>
        <div class="login-register">
            <p>Don't have an account? <a href="#" class="register-link">Register</a></p>
        </div>
    </form>
</div>
  
<div class="form-box register">
    <h2>Register</h2>
    <form action="" method="POST">
        <div class="input-box">
            <span class="icon">
                <ion-icon name="person-outline"></ion-icon>
            </span>
            <input type="text" name="username" required>
            <label for="Username">Username</label>
        </div>
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
        <button type="submit" name="register" class="btn">Register</button>
        <div class="login-register">
            <p>Already have an account? <a href="#" class="login-link">Login</a></p>
        </div>
    </form>
</div>
      </div>
  </header>
  <script src="script.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
