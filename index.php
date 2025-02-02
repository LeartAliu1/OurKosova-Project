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
    <title>OurKosova</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="navbar">
        <div class="container">
            <div class="navbar-wrapper">
                <a class="logo" href="./index.php">OurKosova</a>
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

    <div class="header">
        <h1 class="title">
            OurKosova
        </h1>
    </div>

    <div class="reasons">
        <div class="container">
            <h2 class="reasons">Why Kosova is awesome</h2>
            <div class="row">
                <div class="col-4 border">
                    <div class="card">
                        <h2>
                            Small, but rich in foods
                        </h2>
                        <p>Kosovo, though small, boasts a rich food culture blending Balkan, Mediterranean, and Ottoman influences. Favorites include "flija" (layered pancake), "pite" (savory pie), "sarma" (stuffed grape leaves), and sweet "baklava" with Turkish coffee. Local gems like "ajvar" (pepper spread) and Rahovec wines add to its culinary charm.</p>
                    </div>
                </div>

                <div class="col-4 border">
                    <div class="card">
                        <h2>
                            Small, but rich in parks
                        </h2>
                        <p>Kosovo, though small, is rich in beautiful parks and natural landscapes. From the breathtaking "Germia Park" near Pristina to the rugged "Rugova Canyon" and "Sharr Mountains National Park", the country offers serene spaces for hiking, picnics, and outdoor activities. These parks showcase Kosovo's natural beauty, making it a haven for nature lovers.</p>
                    </div>
                </div>
                <div class="col-4 border">
                    <div class="card">
                        <h2>
                            Small, but rich in mountains
                        </h2>
                        <p>Kosovo, though small, is rich in majestic mountains that define its landscape. The "Sharr Mountains" and "Accursed Mountains" (Bjeshkët e Nemuna) offer stunning peaks, lush valleys, and trails perfect for hiking, skiing, and climbing. These ranges showcase Kosovo's natural beauty and are a paradise for outdoor enthusiasts.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="hero">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <img class="hero-img" src="https://upload.wikimedia.org/wikipedia/commons/6/64/G%C3%ABrmia_Park%2C_Prishtin%C3%AB%2C_Kosova.jpg" alt="">
                </div>
                <div class="col-6">
                    <h2>Germia Park</h2>
                    <p>Germia Park, near Pristina, is a beloved green escape with forests, trails, and a large outdoor pool. Perfect for hiking, cycling, or relaxing, it also features playgrounds, picnic areas, and cozy cafes, making it a peaceful retreat from city life.</p>
                    <a href="#"><span></span>Learn more!</a>
                </div>
                <div class="col-6">
                    <h2>Foods Here</h2>
                    <p>Flija is a traditional Kosovan dish of thin, layered batter cooked slowly over an open flame. Brushed with cream and butter, it has a rich, savory flavor. Often served with yogurt or honey, flija shines at family gatherings and special occasions.</p>
                    <a href="#"><span></span>Learn more!</a>
                </div>
                <div class="col-6">
                    <img class="hero-img" src="https://pbs.twimg.com/media/D4G3qmMXsAEuypF.jpg" alt="">
                </div>
                <div class="col-6">
                    <img class="hero-img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQefWG-NwArIBvTVAv83NfF1ocbq5Czvwi-pg&s" alt="">
                </div>
                <div class="col-6">
                    <h2>Rugova Mountains</h2>
                    <p>The Rugova Mountains in western Kosovo feature dramatic landscapes with towering peaks, deep canyons, and lush valleys. Popular for hiking and climbing, the area also boasts stunning waterfalls and the famous Rugova Canyon.</p>
                    <a href="#"><span></span>Learn more!</a>
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
            <a href="./contactus.php">Contact Us</a>
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