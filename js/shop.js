function backHome() {
  window.location.href = "homepage.php";
}
function backLogin() {
  //path sa login
  window.location.href = "";
}

function showPrompt() {
  const prompt = document.getElementById("prompt");
  prompt.style.display = "flex";

  setTimeout(() => {
    prompt.style.display = "none";
  }, 3000);
}

function closePrompt() {
  const prompt = document.getElementById("prompt");
  prompt.style.display = "none";
}

let unlockedSlots = JSON.parse(localStorage.getItem("unlockedSlots")) || [];
let unlockTimes = JSON.parse(localStorage.getItem("unlockTimes")) || {};
const currentTime = Date.now();

function unlockSlot() {
  if (unlockedSlots.length < 6) {
    //changed number here 5 -> 6
    const nextSlotIndex = unlockedSlots.length;
    unlockedSlots.push(nextSlotIndex);
    unlockTimes[nextSlotIndex] = currentTime;

    localStorage.setItem("unlockedSlots", JSON.stringify(unlockedSlots));
    localStorage.setItem("unlockTimes", JSON.stringify(unlockTimes));

    const prompt = document.getElementById("prompt");
    prompt.style.display = "flex";

    setTimeout(() => {
      prompt.style.display = "none";
    }, 3000);
  } else if (unlockedSlots.length >= 6) {
    //changed number here 5 -> 6
    const prompt = document.getElementById("errorprompt");
    prompt.style.display = "flex";

    setTimeout(() => {
      prompt.style.display = "none";
    }, 3000);
  }
}
