<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SHOP</title>
  <link rel="stylesheet" href="css/homepage.css" />
  <link rel="stylesheet" href="css/shop.css" />
  <link rel="stylesheet" href="css/conversion.css" />
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap");
    @import url("https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Oxanium:wght@200..800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap");
    @import url("https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Oxanium:wght@200..800&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap");
    @import url("https://fonts.googleapis.com/css2?family=Michroma&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Oxanium:wght@200..800&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap");
  </style>
</head>

<body>
  <div class="header">
    <div class="leftnav">
      <div class="prof-pic">
        <img src="pics/profpic.png" alt="" />
      </div>
      <div class="ign-level">
        <span class="ign">KATARINA</span>
        <span class="lvl">LVL.69</span>
      </div>
      <div class="expbar">
        <span><img src="pics/progbar.png" alt="" /></span>
      </div>
    </div>
    <img
      src="pics/title.png"
      alt=""
      class="brand"
      style="width: 803px; height: 335px; top: -50px" />
    <div class="rightnav">
      <div class="home" onclick="backHome()">
        <img src="pics/home 1.png" alt="" class="home-icon" />
        <span id="home-text">HOME</span>
      </div>
      <div class="logout" onclick="   ">
        <img src="pics/Exit.png" alt="" class="logout-icon" />
        <span class="logout-txt">LOGOUT</span>
      </div>
    </div>
  </div>
  <!-- body -->
  <!-- <div id="container">
    <img src="pics/exp coins.png" alt="" />
    <span id="reward-coins">TRY</span>
    <img src="pics/gold coins.png" alt="" />
    <span id="gold-coins">TRY</span>
  </div>

  <div id="shopContainer">
    <div id="itemContainer_1">
      <h1>Experience Points<br />Boost</h1>
      <div id="item-holder">
        <img src="pics/Potion.png " alt="" />
      </div>
      <div class="item-price">
        <img src="pics/gold coins.png" alt="" />
        <span id="price">10000</span>
      </div>
      <button id="buyButton" onclick="showPrompt()">BUY</button>
    </div>
    <div id="itemContainer_2">
      <h1>Quest Slot</h1>
      <div id="item-holder"></div>
      <div class="item-price">
        <img src="pics/gold coins.png" alt="" />
        <span id="price">10000</span>
      </div>
      <button id="buyButton" onclick="unlockSlot()">BUY</button>
    </div>
    <div id="bodyContainer">
      <div id="convertContainer">
        <h3>Convert</h3>
        <div id="RewardCoinsCointainer">
          <img src="pics/exp coins.png" alt="" />
          <input
            type="text"
            inputmode="numeric"
            name="rewardcoinsAmount"
            id="rewardcoinsAmount"
            maxlength="9" />
        </div>
        <div id="GoldCoinsContainer">
          <img src="pics/gold coins.png" alt="" />
          <span
            name="goldcoinsAmount"
            id="goldcoinsAmount"
            maxlength="9"></span>
        </div>
        <br />
        <p id="conversionstatus"></p>
        <div id="conversionbuttonscontainer">
          <button id="resetconversion" onclick="convertreset()">RESET</button>
          <button id="convertbutton" onclick="convertsuccess()">
            CONVERT
          </button>
        </div>
      </div>
      <div id="cashoutContainer">
        <h3>CASHOUT</h3>
        <p id="cashoutparagraph">Enter the amount you wish to cashout.</p>
        <p id="cashoutparagraph">10 Gold ≈ PHP 10</p>
        <div id="cashoutamountcontainer">
          <img src="pics/gold coins.png" alt="" />
          <input
            type="text"
            inputmode="numeric"
            name="cashoutamount"
            id="cashoutamount"
            maxlength="9" />
        </div>
        <br />
        <p id="cashoutstatus"></p>
        <div id="cashoutbuttoncontainer">
          <button id="cashoutbutton" onclick="cashoutRequest()">
            CASHOUT
          </button>
        </div>
      </div>
    </div>
  </div> -->
  <!-- Shop Body -->
  <div id="container">
  </div>

  <div id="shopContainer">
    <div id="itemContainer_1">
      <h1>Experience Points<br>Bomb</h1>
      <div id="item-holder">
        <img src="pics/Potion.png" alt="" class="Potions">
      </div>
      <div class="item-price">
        <img src="pics/gold coins.png" alt="" class="gold-coins">
        <span id="price">70</span>
      </div>
      <form action="" method="POST">
        <button id="buyButton" type="submit">BUY</button>
      </form>
    </div>
    <div id="itemContainer_2">
      <h1>Quest Slot</h1>
      <div id="item-holder">

      </div>
      <div class="item-price">
        <img src="pics/gold coins.png" alt="" class="gold-coins">
        <span id="price">100</span>
      </div>
      <div class="shop-slots">
        <form method="POST" action="">
          <input type="hidden" name="task_id" value="">
          <button id="buyButton" type="submit">Unlock Slot</button>
        </form>
        <p>All slots are unlocked.</p>
      </div>
    </div>
    <div id="bodyContainer">
      <div id="convertContainer">
        <h3>Convert</h3>
        <div id="RewardCoinsCointainer">
          <form action="" method="POST">
            <input type="number" inputmode="numeric" name="rewardcoins" min="1" required id="rewardcoinsAmount">
        </div>
        <div id="GoldCoinsContainer">
          <img src="pics/exp coins.png" alt="" class="ConverterPic"><span class="convertervalue" id="price">1000</span><span id="equals">=</span>
          <img src="pucs/gold coins.png" alt="" class="ConverterPic"><span class="convertervalue" id="goldcon">1</span></span>
        </div>
        <br>
        <p id="conversionstatus"></p>
        <div id="conversionbuttonscontainer">
          <button id="resetconversion" type="reset">RESET</button>
          <button id="convertbutton" type="submit">CONVERT</button>
        </div>
        </form>
      </div>
      <div id="cashoutContainer">
        <h3 class="ch">CASHOUT</h3>
        <div class="info-container">
          <span class="info-icon">ℹ️</span>
          <div class="info-text" id="cashoutparagraph">10 Gold ≈ PHP 10</div>
        </div>
        <div id="cashoutamountcontainer">
          <form action="" method="POST">
            <div>
              <label for="gold_requested">Gold Requested:</label>
              <input type="number" name="gold_requested" id="cashoutamount" required>
            </div>
            <div>
              <label for="payment_method">Payment Method:</label>
              <select id="cashoutamount" name="payment_method" id="payment_method" required>
                <option value="gcash">GCash</option>
                <option value="paymaya">PayMaya</option>
                <option value="bank_transfer">Bank Transfer</option>
              </select>
            </div>
            <div>
              <label for="mobile_number">Mobile Number:</label>
              <input type="text" name="mobile_number" id="cashoutamount" required>
            </div>
            <div id="cashoutbuttoncontainer">
              <button type="submit" id="cashoutbutton" onclick="cashoutRequest()">CASHOUT</button>
            </div>
          </form>
        </div>
        <br>
        <p id="cashoutstatus"></p>
      </div>
    </div>
  </div>

  <div id="prompt">
    <div id="promptContent">
      <div id="closepromptbutton" onclick="closePrompt()">X</div>
      <h1>Succesful Purchase!</h1>
      <p>The item has been bought succesfully!</p>
    </div>
  </div>

  <div id="errorprompt">
    <div id="errorpromptContent">
      <div id="errorclosepromptbutton" onclick="closePrompt()">X</div>
      <h1>Purchase Limit!!</h1>
      <p>All quests slot has been purchased!</p>
    </div>
  </div>
</body>
<script>
</script>
<script src="javascript/shop.js"></script>
<script src="javascript/convert.js"></script>

</html>