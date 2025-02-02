<?php
require_once 'Database.php';

$db = (new Database())->getConnection();

$query = "SELECT * FROM parks";
$stmt = $db->prepare($query);
$stmt->execute();
$parks = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
                <?php foreach ($parks as $park): ?>
                    <div class="col-6">
                        <div class="park-card">
                            <img src="<?php echo htmlspecialchars($park['image_url']); ?>" alt="<?php echo htmlspecialchars($park['name']); ?>">
                            <div class="park-content">
                                <p><?php echo htmlspecialchars($park['name']); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
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
</body>
</html>
