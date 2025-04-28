<?php
session_start();
include 'database.php'; // Ensure this has your PDO connection as $pdo

// Check if user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id']; // Get logged-in user's ID

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['quest_id'])) {
    $quest_id = $_POST['quest_id'];

    try {
        // Verify quest belongs to the logged-in user
        $stmt = $pdo->prepare("SELECT * FROM quests WHERE id = ? AND user_id = ?");
        $stmt->execute([$quest_id, $user_id]);
        $quest = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$quest) {
            $_SESSION['error'] = "You are not authorized to delete this quest.";
            header("Location: homepage.php"); // Replace with your homepage
            exit();
        }

        // Delete the quest
        $stmt = $pdo->prepare("DELETE FROM quests WHERE id = ?");
        $stmt->execute([$quest_id]);

        $_SESSION['success'] = "Quest deleted successfully.";
        header("Location: homepage.php"); // Replace with your homepage
        exit();
    } catch (PDOException $e) {
        $_SESSION['error'] = "Database error: " . $e->getMessage();
        header("Location: homepage.php");
        exit();
    }
} else {
    $_SESSION['error'] = "Invalid request.";
    header("Location: homepage.php");
    exit();
}
