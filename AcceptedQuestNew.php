<?php
$title = isset($_GET['title']) ? htmlspecialchars($_GET['title']) : 'No quest title provided.';
$full_description = isset($_GET['desc']) ? nl2br(htmlspecialchars($_GET['desc'])) : 'No description provided.';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Accepted Quest</title>
    <link rel="stylesheet" href="css/AcceptedQuestNew.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Oxanium:wght@200..800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Oxanium:wght@200..800&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Michroma&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Oxanium:wght@200..800&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
    </style>

</head>

<body>
    <div class="navbar">
        <h3>FRONTEND FORTRESS</h3>
        <div id="navbtn">
            <div id="homebtn" onclick="goHome()">
                <img src="pic/home 1.png" alt="Homepage Button">
            </div>
            <div id="logoutbtn" onclick="logmeout()">
                <img src="pic/Exit.png" alt="Logout Button">
            </div>
        </div>
    </div>

    <div class="parent">
        <div class="body">
            <div class="title">
                <h3><?php echo $title ?></h3>
            </div>
            <div class="detail-container">
                <div class="details">
                    Dolphins are intelligent marine mammals known for their playful behavior and complex communication skills.

                    Here are some key facts about dolphins:

                    1. Dolphins are part of the cetacean family.
                    2. They use echolocation to navigate and hunt.
                    3. Most species live in shallow seas of the continental shelves.

                    Important characteristics include:
                    - Highly social animals
                    - Can swim up to 25 miles per hour
                    - Communicate through clicks and whistles

                    Fun Fact:

                    Dolphins have been known to help humans in the wild by guiding them away from danger or helping fishermen herd fish.

                    That's why many people consider dolphins to be both fascinating and friendly creatures.

                </div>
                <div class="filesubmit">
                    <div id="drop-area">
                        <p>Add here</p>
                        <input type="file" id="fileElem" multiple style="display: none;">
                    </div>
                    <div id="file-list">
                        <ul></ul>
                    </div>
                    <h3>Upload your file(s) here</h3>

                </div>

            </div>
        </div>
    </div>

    <script src="js/AcceptedQuest.js"></script>
</body>

</html>