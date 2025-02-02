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
    <title>Mountains</title>
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


      <div class="header header-Mountains">
        <h1 class="title">
            Kosova Mountains
        </h1>
        <div class="slides">
            <div class="slide" style="background-image: url(https://cdnb.artstation.com/p/assets/images/images/016/096/593/4k/sergey-kuydin-screen-2500x1100-2019-02-22-22-12-55.jpg?1550914510);"></div>
            <div class="slide" style="background-image: url(https://trekbalkan.com/wp-content/uploads/2022/01/Gjeravica-Lake.jpg);"></div>
            <div class="slide" style="background-image: url(https://www.thebestviewpoints.com/wp-content/uploads/2020/05/AAA2941.jpg);"></div>
        </div>
        <h1 class="title">Kosova Mountains</h1>
        <button class="prev">&#10094;</button>
        <button class="next">&#10095;</button>
    </div>

      <div class="Mountains">
        <div class="container">
            <div class="row">

                <div class="col-6">
                    <div class="Mountains-card">
                        <img src="https://trekbalkan.com/wp-content/uploads/2022/01/Gjeravica-Lake.jpg"/>
                        <div class="Mountains-content">
                            <h3>Gjeravica</h3>
                            <p>Highest Peak</p>
                        </div>
                    </div>
                    <button class="btn1" onclick="openMap('https://mapcarta.com/13928934')">Show More</button>
                </div>
                
                <div class="col-6">
                    <div class="Mountains-card">
                        <img src="https://alpventurer.com/wp-content/uploads/2017/06/Great-Rudoka-2658-Kosovo-North-Macedonia-scaled.jpg"/>
                        <div class="Mountains-content">
                            <h3>Great Rudoka</h3>
                            <p>Sharr Mountains</p>
                        </div>
                    </div>
                      <button class="btn2" onclick="openMap('https://mapcarta.com/13918078')">Show More</button>
                </div>
                <div class="col-6">
                    <div class="Mountains-card">
                        <img src="https://funkytours.com/wp-content/uploads/2022/02/Hajla-Summit-1-1024x683.jpg"/>
                        <div class="Mountains-content">
                            <h3>Hajla</h3>
                            <p>Bistrica e Pejes River</p>
                        </div>
                    </div>
                     <button class="btn3" onclick="openMap('https://mapcarta.com/14004834')">Show More</button>
                </div>
                <div class="col-6">
                    <div class="Mountains-card">
                        <img src="https://botasot.info/media/botasot.info/images/2024/August/02/auto_11722588879.jpg"/>
                        <div class="Mountains-content">
                            <h3>Maja e Zeze</h3>
                            <p>Sharr Mountains</p>
                        </div>
                    </div>
                    <button class="btn4" onclick="openMap('https://mapcarta.com/14069352')">Show More</button>
                </div>
                <div class="col-6">
                    <div class="Mountains-card">
                        <img src="https://katror.info/wp-content/uploads/2023/07/Rugova.png"/>
                        <div class="Mountains-content">
                            <h3>Bjeshket e Rugoves</h3>
                            <p>Rugova Mountains</p>
                        </div>
                    </div>
                     <button class="btn5" onclick="openMap('https://mapcarta.com/Rugova_Mountains')">Show More</button>
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
          <a href="./food.php">Foods</a>
          <a href="./park.php">Parks</a>
          <a href="./Mountains.php">Mountains</a>
            <a href="./ContactUs.php">Contact Us</a>
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
