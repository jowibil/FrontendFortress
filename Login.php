<?php
session_start();
include 'database.php'; // Include the database connection file to establish a connection with the database

// Redirect logged-in users to dashboard
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header("Location: dashboard.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    // Validate user input
    if (empty($email) || empty($password) || empty($confirm_password)) {
        $_SESSION['error'] = "All fields are required.";
        header("Location: login.php");
        exit();
    }

    if ($password !== $confirm_password) {
        $_SESSION['error'] = "Passwords do not match.";
        header("Location: login.php");
        exit();
    }

    try {
        // Prepare an SQL statement to fetch the user record based on the provided email
        $stmt = $pdo->prepare("SELECT id, name, password FROM users WHERE email = ?");
        $stmt->execute([$email]); // Execute the query with the provided email
        $user = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch the result as an associative array

        // Check if user exists and verify the entered password with the hashed password from the database
        if ($user && password_verify($password, $user['password'])) {
            // Store user data in session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['logged_in'] = true;

            $_SESSION['success'] = "Login successful.";
            header("Location: homepage.php"); // Redirect to dashboard after successful login
            exit();
        } else {
            $_SESSION['error'] = "Invalid email or password"; // Error if credentials do not match
            header("Location: login.php");
            exit();
        }
    } catch (PDOException $e) {
        // Catch any database-related errors and store the error message in session
        $_SESSION['error'] = "Login failed: " . $e->getMessage();
        header("Location: login.php");
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
    <link rel="stylesheet" href="css/log.css">
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
        .login1{
            margin-right: 100px;
        }
    </style>
</head>

<body>
    <div class="all">
        <?php if (isset($_SESSION['error'])) { ?>
            <div class="alert-box alert-danger ps-4">
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
        <div class="logo">
            <img id="logo" src="pic/mobile logo.png" alt="Frontendfortress logo">
        </div>
        
        <p class="header">Welcome back, adventurer! Ready to continue where you left off? Your journey awaits!</p>
            
        <div class="login">
            <div class="login-nav container">
                <p class="login1"><img id="arrow" src="pic/→.png">Login</p>
                <p class="login2"><a class="nave" href="Signup.php">Register</a></p>
                <p class="login3">Login</p>
            </div>

            <div class="form">
                <form action="Login.php" method="post" class="forms">
                    <div class="input-top labels">
                    <label for="username">Enter your Email</label>
                    <input type="email" name="email" placeholder="Email" required><br>
                    </div>
                    <div class="labels">
                    <label for="username">Enter your Password</label>
                    <input type="password" name="password" placeholder="Password" required><br>
                    </div>
                    <div class="labels">
                    <label for="confirm_password">Confirm your Password</label>
                    <input type="password" name="confirm_password" placeholder="Confirm Password" required>
                    </div>

                    <div class="buttom">
        
                        <center>
                        <input type="submit" name="login" class="log_button" value="LOGIN">
                        </center>
                    </div>
                    
                </form>
            </div>

            <div class="bottom">
                <div class="register">
                    <p class="bots">Don’t have an account? <br><a href="Signup.php">Register</a></p>
                </div>
                <div class="register1">
                    <p class="bots">Don’t have an account? <a href="Signup.php">Register</a></p>
                </div>
                
            </div>
        </div>

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
    <script src="js/Login.js"></script>
    
</body>
</html>