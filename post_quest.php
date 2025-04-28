<?php
session_start();
include 'database.php'; // Ensure this file contains the PDO connection as $pdo

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['title']) || empty($_POST['short_description']) || empty($_POST['full_description']) || empty($_POST['difficulty'])) {
        $_SESSION['error'] = "All fields are required.";
        header("Location: homepage.php");
        exit();
    }

    $user_id = $_SESSION['user_id'];
    $title = trim($_POST['title']);
    $short_description = trim($_POST['short_description']);
    $full_description = trim($_POST['full_description']);
    $difficulty = trim($_POST['difficulty']);

    try {
        $stmt = $pdo->prepare("INSERT INTO quests (user_id, title, short_description, full_description, difficulty, created_at) VALUES (?, ?, ?, ?, ?, NOW())");
        $stmt->execute([$user_id, $title, $short_description, $full_description, $difficulty]);
        $_SESSION['success'] = "Quest posted successfully!";
        header("Location: homepage.php");
        exit();
    } catch (PDOException $e) {
        $_SESSION['error'] = "Database error: " . $e->getMessage();
        header("Location: homepage.php");
        exit();
    }
}
?>
