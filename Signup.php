<?php
session_start();
include 'database.php'; // Ensure this file contains your database connection and initializes $pdo

// Function to initialize quest slots for a new user
function initializeQuestSlots($user_id, $pdo) {
    for ($i = 1; $i <= 4; $i++) {
        $status = ($i == 1) ? 'available' : 'locked'; // First slot available, others locked
        $stmt = $pdo->prepare("INSERT INTO quest_slots (user_id, slot_number, status) VALUES (?, ?, ?)");
        $stmt->execute([$user_id, $i, $status]);
    }
}

// Redirect logged-in users to the homepage
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']); // Sanitize email input
    $name = trim($_POST['name']); // Sanitize name input
    $password = trim($_POST['password']); // Sanitize password input
    $confirm_password = trim($_POST['confirm_password']); // Sanitize confirm password input
    $terms = isset($_POST['terms']); // Check if terms checkbox is checked

    // Validate terms agreement
    if (!$terms) {
        $_SESSION['error'] = "You must agree to the terms and conditions.";
        header("Location: signup.php");
        exit();
    }

    // Ensure all fields are filled
    if (empty($email) || empty($name) || empty($password) || empty($confirm_password)) {
        $_SESSION['error'] = "All fields are required.";
        header("Location: signup.php");
        exit();
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Invalid email format.";
        header("Location: signup.php");
        exit();
    }

    // Check if passwords match
    if ($password !== $confirm_password) {
        $_SESSION['error'] = "Passwords do not match.";
        header("Location: signup.php");
        exit();
    }

    // Hash the password for secure storage
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    try {
        // Check if email already exists
        $checkStmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
        $checkStmt->execute([$email]);
        if ($checkStmt->fetch()) {
            $_SESSION['error'] = "Email already exists.";
            header("Location: signup.php");
            exit();
        }

        // Insert new user
        $stmt = $pdo->prepare("INSERT INTO users (email, name, password, created_at) VALUES (?, ?, ?, NOW())");
        $stmt->execute([$email, $name, $hashed_password]);

        // Get the last inserted user ID
        $user_id = $pdo->lastInsertId();

        // Initialize quest slots for the new user
        initializeQuestSlots($user_id, $pdo);

        // Store user session data and redirect
        $_SESSION['user_id'] = $user_id;
        $_SESSION['name'] = $name;
        $_SESSION['success'] = "Signup successful!";
        header("Location: Login.php");
        exit();
    } catch (PDOException $e) {
        $_SESSION['error'] = "Signup failed: " . $e->getMessage();
        header("Location: signup.php");
        exit();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FrontendFortress</title>
    <link rel="stylesheet" href="css/sign.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/21d40f78df.js" crossorigin="anonymous"></script>
    <style>
        .alert-box {
            position: fixed;
            top: 20px;
            right: 20px;
            width: 300px;
            padding: 15px;
            border-radius: 8px;
            color: white;
            font-size: 14px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            opacity: 1;
            animation: slideIn 0.5s ease-in-out;
        }
        .alert-success { background-color:rgb(109, 65, 121); }
        .alert-danger { background-color:rgb(109, 65, 121);  }
        .close-btn {
            cursor: pointer;
            font-size: 18px;
            margin-left: 10px;
        }
        @keyframes slideIn {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        @keyframes fadeOut {
            from { opacity: 1; }
            to { opacity: 0; }
        }
    </style>
</head>

<body>
    <div class="all">
        <?php if (isset($_SESSION['error'])) { ?>
            <div class="alert-box alert-danger">
                <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
                <span class="close-btn">&times;</span>
            </div>
        <?php } ?>
        <?php if (isset($_SESSION['success'])) { ?>
            <div class="alert-box alert-success">
                <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
                <span class="close-btn">&times;</span>
            </div>
        <?php } ?>

        <div class="words">
            <center>
                <div class="logo1">
                    <img src="pic/logo.png" alt="Frontendfortress logo">
                </div>

                <div class="textt">
                    <p>Welcome back, adventurer! Ready to continue where you left off? Your journey awaits!</p>
                </div>
            </center>
        </div>

        <div class="logo">
            <img id="logo" src="pic/mobile logo.png" alt="Frontendfortress logo">
        </div>

        
        <p class="header">Welcome back, adventurer! Ready to continue where you left off? Your journey awaits!</p>
            
        <div class="login">
            <div class="login-nav container">
                <p class="login1"><i class="fa-solid fa-arrow-right"></i>Register</p>
                <p class="login3">Register</p>
                <p class="login2"><a class="nave" href="Login.php">Login</a></p>
            </div>

            <div class="form">
                <form action="Signup.php" method="post" class="forms">
                    <div class="input-top labels">
                    <label for="email">Enter your Email</label>
                    <input type="email" name="email" placeholder="Email" required><br>
                    </div>
                    <div class="labels">
                    <label for="name">Enter your name</label>
                    <input type="text" name="name" placeholder="name" required><br>
                    </div>
                    <div class="labels">
                    <label for="password">Enter your Password</label><br>
                    <input type="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="labels">
                    <label for="confirm_password">Confirm your Password</label><br>
                    <input type="password" name="confirm_password" placeholder="Confirm Password" required>
                    </div>

                    <div class="buttom">
                        <div class="buttom-checkbox">
                            <div class="checkbox">
                                <input type="checkbox" class="check" name="terms" required>
                            </div>
                            <div class="remember">
                                <p>By creating an account you accept our <span class="terms">Terms of Services</span> and <span class="terms">Privacy Policy.</span></p>
                            </div>
                        </div>
        
                        <center>
                        <input type="submit" value="REGISTER" class="log_button" name="submit">
                        </center>
                    </div>
        
                </form>
            </div>

            <div class="bottom">
                <div class="register">
                    <p class="bots">Already have an account? <br><a href="Login.php">Login</a></p>
                </div>
                <div class="register1">
                    <p class="bots">Already have an account? <a href="Login.php">Login</a></p>
                </div>
                
            </div>
        </div>

    </div>

    <script>
        document.querySelectorAll('.close-btn').forEach(button => {
            button.addEventListener('click', function() {
                let alertBox = this.parentElement;
                alertBox.style.animation = 'fadeOut 0.5s ease-in-out';
                setTimeout(() => alertBox.remove(), 500);
            });
        });

        setTimeout(() => {
            document.querySelectorAll('.alert-box').forEach(alert => {
                alert.style.animation = 'fadeOut 0.5s ease-in-out';
                setTimeout(() => alert.remove(), 500);
            });
        }, 5000);
    </script>
    
</body>
</html>