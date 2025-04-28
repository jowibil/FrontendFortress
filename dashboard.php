<?php
session_start();
include 'database.php'; // Ensure this file contains the PDO connection as $pdo

// Redirect if not logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id']; // Get the logged-in user's ID

// Fetch user profile data
try {
    $stmt = $pdo->prepare("SELECT users.name, user_profiles.level, user_profiles.exp, user_profiles.reward_coins, user_profiles.gold 
                           FROM users 
                           JOIN user_profiles ON users.id = user_profiles.user_id 
                           WHERE users.id = ?");
    $stmt->execute([$user_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        $_SESSION['error'] = "User profile not found.";
        header("Location: login.php");
        exit();
    }
} catch (PDOException $e) {
    $_SESSION['error'] = "Database error: " . $e->getMessage();
    header("Location: login.php");
    exit();
}

// Fetch all quests
$quests = [];
try {
    $stmt = $pdo->query("SELECT quests.id, quests.title, quests.short_description, quests.full_description, quests.difficulty, users.name AS posted_by 
                         FROM quests 
                         JOIN users ON quests.user_id = users.id 
                         ORDER BY quests.created_at DESC");
    $quests = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $_SESSION['error'] = "Database error: " . $e->getMessage();
}

// Fetch quest slots
$slots = [];
try {
    $stmt = $pdo->prepare("SELECT slot_number, quest_title, status FROM quest_slots WHERE user_id = ? ORDER BY slot_number ASC");
    $stmt->execute([$user_id]);
    $slots = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $_SESSION['error'] = "Database error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .quest-container {
            display: flex;
            flex-direction: row; /* Ensures scrolling starts from the right */
            overflow-x: auto;
            gap: 16px;
            padding-bottom: 10px;
            white-space: nowrap;
            scrollbar-width: thin;
            scrollbar-color: #ccc transparent;
            width: 100px;
        }

        .quest-card {
            min-width: 250px; /* Adjust the width based on your preference */
            flex: 0 0 auto;
        }

        /* Optional: Styling for Webkit-based browsers */
        .quest-container::-webkit-scrollbar {
            height: 8px;
        }

        .quest-container::-webkit-scrollbar-thumb {
            background-color: #888;
            border-radius: 4px;
        }

        .quest-container::-webkit-scrollbar-track {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h1>Welcome, <?php echo htmlspecialchars($user['name']); ?>!</h1>
        <p><strong>Level:</strong> <?php echo $user['level']; ?></p>
        <p><strong>Experience Points:</strong> <?php echo $user['exp']; ?></p>
        <p><strong>Reward Coins:</strong> <?php echo $user['reward_coins'] !== null ? $user['reward_coins'] : 0; ?></p>
        <p><strong>Gold:</strong> <?php echo $user['gold']; ?></p>
        
        <a href="logout.php" class="btn btn-danger">Logout</a>
        <a href="shop.php" class="btn btn-warning ms-3">Go to Shop</a>
        <button class="btn btn-primary ms-3" data-bs-toggle="modal" data-bs-target="#postQuestModal">Post a Quest</button>

        <hr>

        <!-- Quest Slots Section -->
        <h3 class="quest-slots-title">PENDING TASKS</h3>
        <div class="quest-slots-container">
            <?php foreach ($slots as $slot): ?>
                <div class="quest-slot">
                    <?php if ($slot['status'] === 'available' && empty($slot['quest_title'])): ?>
                        <span class="text-success">✔️ Available</span>
                    <?php elseif ($slot['status'] === 'occupied'): ?>
                        <strong><?php echo htmlspecialchars($slot['quest_title']); ?></strong>
                    <?php else: ?>
                        <span class="text-danger">🔒 Locked</span>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>


        <hr>

        <h2>All Quests</h2>
        <div class="quest-container">
            <?php foreach ($quests as $quest): ?>
                <div class="card quest-card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($quest['title']); ?></h5>
                        <p class="card-text"><?php echo htmlspecialchars($quest['short_description']); ?></p>
                        <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#questModal<?php echo $quest['id']; ?>">More Info</button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

                <?php foreach ($quests as $quest): ?>
            <!-- Quest Modal -->
            <div class="modal fade" id="questModal<?php echo $quest['id']; ?>" tabindex="-1" aria-labelledby="questModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"><?php echo htmlspecialchars($quest['title']); ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p><strong>Posted by:</strong> <?php echo htmlspecialchars($quest['posted_by']); ?></p>
                            <p><strong>Description:</strong> <?php echo nl2br(htmlspecialchars($quest['full_description'])); ?></p>
                            <p><strong>Difficulty:</strong> <?php echo htmlspecialchars($quest['difficulty']); ?></p>
                        </div>
                        <div class="modal-footer">
                            <form action="accept_quest.php" method="POST">
                                <input type="hidden" name="quest_id" value="<?php echo $quest['id']; ?>">
                                <button type="submit" class="btn btn-success">Accept Quest</button>
                            </form>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?> <!-- This is the correct endforeach -->
        </div> <!-- This closing div is incorrectly placed -->

    <!-- Post a Quest Modal -->
<div class="modal fade" id="postQuestModal" tabindex="-1" aria-labelledby="postQuestModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="postQuestModalLabel">Post a New Quest</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="post_quest.php" method="POST">
                    <div class="mb-3">
                        <label for="title" class="form-label">Quest Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="short_description" class="form-label">Short Description</label>
                        <input type="text" class="form-control" id="short_description" name="short_description" required>
                    </div>
                    <div class="mb-3">
                        <label for="full_description" class="form-label">Full Description</label>
                        <textarea class="form-control" id="full_description" name="full_description" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="difficulty" class="form-label">Difficulty</label>
                        <select class="form-select" id="difficulty" name="difficulty" required>
                            <option value="Easy">Easy</option>
                            <option value="Medium">Medium</option>
                            <option value="Hard">Hard</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Post Quest</button>
                </form>
            </div>
        </div>
    </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
