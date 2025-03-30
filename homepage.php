<!DOCTYPE html>

<body lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Homepage</title>
        <link rel="stylesheet" href="css/homepage.css">
        <link rel="stylesheet" href="css/modal.css">
        <link rel="stylesheet" href="css/postmodal.css">
        <link rel="stylesheet" href="css/reportmodal.css">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Oxanium:wght@200..800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Oxanium:wght@200..800&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=Michroma&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Oxanium:wght@200..800&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
        </style>
    </head>

    <body>

        <div class="header">
            <div class="leftnav">
                <div class="prof-pic">
                    <img src="pics/profpic.png" alt="">
                </div>
                <div class="ign-level">
                    <span class="ign">KATARINA</span>
                    <span class="lvl">LVL.69</span>
                </div>
                <div class="expbar">
                    <span><img src="pics/progbar.png" alt=""></span>
                </div>
            </div>
            <img src="pics/title.png" alt="" class="brand">
            <div class="rightnav">
                <div class="currency">
                    <img src="pics/exp coins.png" alt="" class="exp-coins">
                    <span class="exp-amnt">900000</span>
                    <img src="pics/gold coins.png" alt="" class="gold-coins">
                    <span class="gold-amnt">10000</span>
                </div>
                <div id="report">
                    <img src="pics/Warning.png" alt="">
                    <p>Report</p>
                </div>
                <div class="logout">
                    <img src="pics/Exit.png" alt="" class="logout-icon">
                    <span class="logout-txt">LOGOUT</span>
                </div>
            </div>
        </div>





        <div class="body-container">
            <div class="leftside-container">
                <div class="left-title">PENDING TASKS</div>
                <div class="task-cont" id="task-cont">
                    <!-- 1st slot open -->
                    <div class="slot-1"><img src="" alt="">
                        <h3></h3>
                    </div>
                    <div class="slot-2 locked"><img src="/FINALWEB/pics/Lock.png" alt="">
                        <h3></h3>
                    </div>
                    <div class="slot-3 locked"><img src="/FINALWEB/pics/Lock.png" alt="">
                        <h3></h3>
                    </div>
                    <div class="slot-4 locked"><img src="/FINALWEB/pics/Lock.png" alt="">
                        <h3></h3>
                    </div>
                    <div class="slot-5 locked"><img src="/FINALWEB/pics/Lock.png" alt="">
                        <h3></h3>
                    </div>
                </div>
            </div>

            <div class="middle-container">
                <div class="holder">
                    <div class="quest-title">QUEST CARDS</div>
                    <div class="quests-bg">
                        <div class="carousel" id="card-carousel">
                            <div class="card">
                                <div class="card-image">
                                    <div class="quest-price">
                                        <img src="pics/exp coins.png" alt="">
                                        <span id="price">10000</span>
                                    </div>
                                    <img src="pics/bbg.jpg" alt="" id="image-holder">
                                </div>
                                <div class="card-desc">
                                    <p class="card-description">Make a landing page for a shoe shop</p>
                                    <div class="cardbtn" id="card-btn">Learn More>></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button id="post-quest" onclick="openModal()">POST QUEST</button>
                </div>
            </div>





            <div class="rightside-container">
                <div class="btns">
                    <div class="btn">
                        <img src="pics/inbox.png" alt="">
                        <span>INBOX</span>
                    </div>
                    <div class="btn" onclick="openShop()">
                        <img src="pics/shopping cart.png" alt="">
                        <span>SHOP</span>
                    </div>
                </div>
                <div class="leadboards">
                    <h1>LEADERBOARDS</h1>
                    <div class="list">

                    </div>
                </div>
            </div>
        </div>

    </body>

    <!-- modal na mu show pag pisliton ang post quest na button -->
    <div id="post-modal">
        <div class="postmodal-content">
            <div class="header-bg">
                <h1>POST A QUEST</h1>
            </div>
            <div class="title-cont">
                <h3>QUEST TITLE</h3>
                <input type="text" name="postquest_title" id="postquest_title" maxlength="40" minlength="3" required
                    placeholder="Your Title">
            </div>
            <div class="details-cont">
                <h3>QUEST DETAILS</h3>
                <textarea name="postquest_details" id="postquest_details" required
                    placeholder="Your Quest details here..."></textarea>
            </div>
            <div class="bottom-cont">
                <div class="carddesc-cont">
                    <h3>CARD DESCRIPTION</h3>
                    <textarea name="carddescription" id="carddescription" required
                        placeholder="Description to be shown in the quest card" oninput="limitLines()"
                        maxlength="100"></textarea>
                    <p id="lineLimitMessage" style="color: red; display: none;">Line limit reached!</p>
                </div>
                <div class="reward-cont">
                    <div id="rc-cont">
                        <img src="pics\exp coins.png" alt="">
                        <span id="rc-label">REWARDS COINS</span>
                    </div>
                    <p>Choose Difficulty:</p>
                    <select id="dropdown" name="options" onchange="updateCoinEquivalent()">
                        <option value="option1">Easy</option>
                        <option value="option2">Medium</option>
                        <option value="option3">Hard</option>
                    </select>
                    <p id="RCE">Coin Equivalent: <span id="rc_equivalent"></span></p>
                </div>
            </div>
            <div class="postbtn-cont">
                <button id="close" onclick="closeModal()">CLOSE</button>
                <button id="create_quest">POST</button>
            </div>
        </div>
    </div>

    <!-- quest modal -->
    <div id="questModal" class="modal" style="display: none;">
        <div class="modal-content">
            <div id="content-left">
                <div id="commentModalContent">
                    <h2 id="commentTitle">COMMENTS</h2>
                    <div id="comments-container">

                        <!-- {{-- Comments Display --}} -->

                    </div>
                </div>

            </div>
            <div id="content-rightt">
                <div class="quest_title">
                    <div class="user">
                        <img src="pics/profpic.png" alt="">
                        <p><span id="modal-posted-by"></span></p>
                    </div>
                    <h2 id="modal-title" class="title" data-title="{{ $quest->title }}"></h2>
                </div>



                <div class="description-container">
                    <div class="disc_box">
                        <h2 class="discription">DESCRIPTION</h2>
                        <div id="modal-description"></div>
                    </div>
                </div>
                <div id="bottomSection">
                    <div id="leftsection">
                        <h1 class="com">COMMENTS</h1>
                        <div id="leftsectioncontent">

                            <!-- {{-- Form where to get comments --}} -->

                            <form action='' method="POST" id="commentForm">

                                <div class="player-profile" style="display: none">
                                    <img src="pics/profpic.png" alt="">
                                    <span class="player-ign"> KATARINA </span>
                                    <span name="quest_title" id="modal-title" value=""></span>
                                    <input type="hidden" name="quest_id" id="modal-id" value="">
                                </div>
                                <textarea type="text" name="user-comment" id="user-comment" placeholder="Type your comment here.."></textarea>
                                <button type="submit" class="send-icon">
                                    &#x27A4;
                                </button>
                            </form>


                        </div>
                    </div>
                    <div id="rightsection">
                        <div class="rightsectioncontent">
                            <div class="quest-pay">
                                <img src="pics/exp coins.png" alt="" class="exp-coins">
                                <span class="PriceAmount" id="modal-reward-coins"></span>
                            </div>
                            <button id="back-btn" class="close">BACK</button>
                            <button
                                type="button"
                                class="btn btn-primary accept-quest-btn"
                                id="accept-btn"
                                data-id=""
                                data-title="">
                                ACCEPT
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <p style="display: none"><strong>Difficulty:</strong> <span id="modal-difficulty"></span></p>
        <p style="display: none"><strong>Experience Points:</strong> <span id="modal-exp"></span></p>
    </div>

    <div id="reportmodal">
        <div id="reportmodalcontent">
            <p id="reportclosebtn">X</p>
            <div style="margin: 0px 0px 20px 0px;">
                <h1 id="reportmodalheader">Report Your Concerns</h1>
                <p id="reportmodalsubheading">Report issues affecting your experience.</p>
            </div>
            <div style="margin: 40px 0px 30px 0px;">
                <label for="reportedplayer" id="reportedplayerlabel">Player In-Game Name:</label>
                <input type="text" name="reportedplayer" id="reportedplayer">
            </div>
            <div style="margin: 40px 0px 20px 0px;">
                <label for="reportreason" id="reportreasonlabel">Add further details to the report.</label> <br>
                <textarea name="reportreason" id="reportreason"></textarea>
            </div>
            <button type="submit" id="reportsubmitbtn">Submit Report</button>
        </div>
    </div>






    <script>
        // limit line sa description sa card 
        function limitLines() {
            const textarea = document.getElementById("carddescription");
            const message = document.getElementById("lineLimitMessage");
            const maxLines = 5;
            const lines = textarea.value.split("\n");

            if (lines.length > maxLines) {
                textarea.value = lines.slice(0, maxLines).join("\n");
                message.style.display = "block";
            } else {
                message.style.display = "none";
            }
        }

        function openShop() {
            window.location.href = "shop.php";
        }

        function updateCoinEquivalent() {
            const dropdown = document.getElementById("dropdown");
            const rcEquivalent = document.getElementById("rc_equivalent");

            // Set coin equivalents based on the selected option
            const coinValues = {
                option1: 5000, // Easy
                option2: 10000, // Medium
                option3: 15000 // Hard
            };
            // Update the display based on the selected value
            rcEquivalent.textContent = coinValues[dropdown.value] || 0;
        }


        //function para sa learn more button — para ma abri ang QuestModal
        const Questmodal = document.getElementById("questModal");
        const openQuestModalBtn = document.getElementById("card-btn");
        const closeQuestBtn = document.getElementById("back-btn");
        openQuestModalBtn.onclick = function() {
            Questmodal.style.display = "flex";
        }

        closeQuestBtn.onclick = function() {
            Questmodal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                Questmodal.style.display = "none";
            }
        }
    </script>
    <script src="javascript/homepage.js"></script>
    <script src="javascript/shop.js"></script>

    </html>