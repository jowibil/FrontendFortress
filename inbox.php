<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quest Submissions</title>
    <link rel="stylesheet" href="css/inbox.css">
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
                <span>HOME</span>
            </div>
            <div id="logoutbtn" onclick="logmeout()">
                <img src="pic/Exit.png" alt="Logout Button">
                <span>LOGOUT</span>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="left-pane">
            <div class="button" onclick="showContent(1)">Option 1</div>
            <div class="button" onclick="showContent(2)">Option 2</div>
            <div class="button" onclick="showContent(3)">Option 3</div>
            <div class="button" onclick="showContent(4)">Option 4</div>
            <div class="button" onclick="showContent(5)">Option 5</div>
        </div>

        <div class="right-pane" id="right-pane">
            <!-- Dynamic content will be loaded here -->
        </div>
    </div>



    <script src="js/inbox.js"></script>
</body>

</html>