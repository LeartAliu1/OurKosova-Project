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
    <title>Foods</title>
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

      <div class="header header-food">
        <h1 class="title">
            Kosova Foods
        </h1>
      </div>

    <div class="foods">
        <div class="container">
            <div class="row">

                <div class="col-6">
                    <div class="food-card">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/d/d6/Flija.png"/>
                        <div class="food-content">
                            <h3>Fli</h3>
                            <p>Dish</p>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="food-card">
                        <img src="https://agroweb.org/wp-content/uploads/2018/06/speca-te-mbushur.jpg"/>
                        <div class="food-content">
                            <h3>Filled Peppers</h3>
                            <p>Meal</p>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="food-card">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTQXJOX6GsijAB_UdEZH_ZlSbxDTNAoHsiSsA&s"/>
                        <div class="food-content">
                            <h3>Pasul</h3>
                            <p>Dish</p>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="food-card">
                        <img src="https://www.myalbanianfood.com/wp-content/uploads/2017/03/Albanian-Byrek-Mish-1300x731.jpg"/>
                        <div class="food-content">
                            <h3>Byrek</h3>
                            <p>Dish</p>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="food-card">
                        <img src="https://www.allrecipes.com/thmb/ygrgQsxwieOiubKfDHxjboPbXDo=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/9454-Greek-Baklava-mfs-197-d45ac334a0ec4e84883b09b6fc60312d.jpg"/>
                        <div class="food-content">
                            <h3>Bakllave</h3>
                            <p>Dessert</p>
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
