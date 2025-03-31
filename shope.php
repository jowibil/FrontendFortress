<?php
session_start();
include 'database.php'; 

$user_id = $_SESSION['user_id'];

try {
    $stmt = $pdo->prepare("SELECT gold FROM user_profiles WHERE user_id = ?");
    $stmt->execute([$user_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    $stmt = $pdo->prepare("SELECT COUNT(*) AS locked_slots FROM quest_slots WHERE user_id = ? AND status = 'locked'");
    $stmt->execute([$user_id]);
    $lockedSlots = $stmt->fetch(PDO::FETCH_ASSOC)['locked_slots'];

} catch (PDOException $e) {
    $_SESSION['error'] = "Database error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1>Shop</h1>
        <p><strong>Your Gold:</strong> <?php echo $user['gold']; ?></p>

        <?php if ($lockedSlots > 0): ?>
            <form action="unlock_slot.php" method="POST">
                <button type="submit" class="btn btn-warning">Unlock Slot (50 Gold)</button>
            </form>
        <?php else: ?>
            <p class="text-success">All quest slots are unlocked!</p>
        <?php endif; ?>

        <a href="dashboard.php" class="btn btn-primary mt-3">Back to Dashboard</a>
    </div>
</body>
</html>
