<?php
require_once 'Database.php';

$database = new Database();
$conn = $database->getConnection();

$query = 'SELECT * FROM mountains';
$stmt = $conn->prepare($query);
$stmt->execute();
$mountains = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="Mountains">
    <div class="container">
        <div class="row">
            <?php foreach ($mountains as $mountain): ?>
                <div class="col-6">
                    <div class="Mountains-card">
                        <img src="<?php echo htmlspecialchars($mountain['image_url']); ?>" />
                        <div class="Mountains-content">
                            <h3><?php echo htmlspecialchars($mountain['name']); ?></h3>
                            <p><?php echo htmlspecialchars($mountain['description']); ?></p>
                        </div>
                    </div>
                    <button class="btn1" onclick="openMap('<?php echo htmlspecialchars($mountain['map_url']); ?>')">Show More</button>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
