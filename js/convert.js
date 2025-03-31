let timeoutClear;
function convertreset() {
    const rewardreset = document.getElementById("rewardcoinsAmount");
    const goldreset = document.getElementById("goldcoinsAmount");

    rewardreset.value = "";
    goldreset.value = " ";

    const status = document.getElementById('conversionstatus');

    clearTimeout(timeoutClear);

    status.innerHTML = "Conversion has been cleared!";

    timeoutClear = setTimeout(() => {
        status.innerHTML = "";
    }, 3000);
}
function convertsuccess() {
    const input1 = document.getElementById("rewardcoinsAmount").value;
    const status = document.getElementById("conversionstatus");
    
    clearTimeout(timeoutClear);

    if (input1 === "") {
        status.innerHTML = "Please enter reward coins amount!";
    } else {
        status.innerHTML = "Conversion Successful!";
    }
    timeoutClear = setTimeout(() => {
        status.innerHTML = "";
    }, 3000);
}
function cashoutRequest(){
    const goldinput = document.getElementById("cashoutamount").value;
    const status = document.getElementById("cashoutstatus");

    clearTimeout(timeoutClear);

    if (goldinput === ""){
        status.innerHTML = "Please enter an amount!";
    } else {
        status.innerHTML = "Cashout request has been submitted!";
    }
    timeoutClear = setTimeout(() => {
        status.innerHTML = "";
    }, 3000);
}