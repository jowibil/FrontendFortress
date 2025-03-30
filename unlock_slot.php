<?php
session_start();
include 'database.php';

$user_id = $_SESSION['user_id'];
$cost = 50; // Gold cost per slot

// Check user's gold
$stmt = $pdo->prepare("SELECT gold FROM user_profiles WHERE user_id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user['gold'] < $cost) {
    $_SESSION['error'] = "Not enough gold!";
    header("Location: shop.php");
    exit();
}

// Find the first locked slot
$stmt = $pdo->prepare("SELECT * FROM quest_slots WHERE user_id = ? AND status = 'locked' LIMIT 1");
$stmt->execute([$user_id]);
$slot = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$slot) {
    $_SESSION['error'] = "No locked slots left to unlock!";
    header("Location: shop.php");
    exit();
}

// Unlock the slot and deduct gold
$stmt = $pdo->prepare("UPDATE quest_slots SET status = 'available' WHERE id = ?");
$stmt->execute([$slot['id']]);

$stmt = $pdo->prepare("UPDATE user_profiles SET gold = gold - ? WHERE user_id = ?");
$stmt->execute([$cost, $user_id]);

$_SESSION['success'] = "Slot unlocked!";
header("Location: dashboard.php");
exit();
?>
