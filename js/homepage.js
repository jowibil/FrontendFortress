document.getElementById("create_quest").addEventListener("click", () => {
  const carousel = document.getElementById("card-carousel");

  const card = document.createElement("div");
  card.classList.add("card");

  const cardImg = document.createElement("div");
  cardImg.classList.add("card-image");

  const questPrice = document.createElement("div");
  questPrice.classList.add("quest-price");

  const expImg = document.createElement("img");
  expImg.src = "/FINALWEB/pics/exp%20coins.png";
  expImg.alt = "Experience Coins";

  const priceSpan = document.createElement("span");
  priceSpan.id = "price";
  priceSpan.innerText = "TEST-10000";

  questPrice.appendChild(expImg);
  questPrice.appendChild(priceSpan);

  const mainImg = document.createElement("img");
  mainImg.src = "/FINALWEB/pics/bbg.jpg";
  mainImg.alt = "Quest Image";
  mainImg.id = "image-holder";

  cardImg.appendChild(questPrice);
  cardImg.appendChild(mainImg);

  const cardDesc = document.createElement("div");
  cardDesc.classList.add("card-desc");

  const description = document.createElement("p");
  description.classList.add("card-description");
  description.innerText = "TEST";

  const cardButton = document.createElement("div");
  cardButton.classList.add("cardbtn");
  cardButton.innerText = "Learn More >>";

  cardButton.addEventListener("click", openQuestModal);

  cardDesc.appendChild(description);
  cardDesc.appendChild(cardButton);

  card.appendChild(cardImg);
  card.appendChild(cardDesc);

  carousel.appendChild(card);
  
  let modal = document.getElementById("post-modal");
  modal.style.display = "none";

  //clear contents after post
  document.getElementById("postquest_details").value = "";
  document.getElementById("carddescription").value = "";
  document.getElementById("postquest_title").value = "";
  const dropdown = document.getElementById("dropdown");
  dropdown.value = "option1"; // Reset to default option
  updateCoinEquivalent();
});

function openModal() {
  const modal = document.getElementById("post-modal");
  modal.style.display = "flex";
  const dropdown = document.getElementById("dropdown");
  dropdown.value = "option1"; // Set to Easy
  updateCoinEquivalent();
}

function closeModal() {
  const modal = document.getElementById("post-modal");
  modal.style.display = "none";

  //clear contents after close
  document.getElementById("postquest_details").value = "";
  document.getElementById("carddescription").value = "";
  document.getElementById("postquest_title").value = "";
  const dropdown = document.getElementById("dropdown");
  dropdown.value = "option1"; // Reset to default option
  updateCoinEquivalent();
}

function openQuestModal(event) {
  const modal = document.getElementById("questModal");
  modal.style.display = "flex";
  selectedCard = event.currentTarget.closest(".card");
}

let selectedCard = null;

function closeQuestModal() {
  const modal = document.getElementById("questModal");
  modal.style.display = "none";
}

function deleteQuestModal() {
  if (selectedCard) {
    selectedCard.remove();
    closeQuestModal();
  }
}
// document
//   .getElementById("PostedModaldeletebutton")
//   .addEventListener("click", deleteModal);

document.addEventListener("DOMContentLoaded", function () {
  const unlockedSlots = JSON.parse(localStorage.getItem("unlockedSlots")) || [];
  const unlockTimes = JSON.parse(localStorage.getItem("unlockTimes")) || {};
  const currentTime = Date.now();

  for (let i = 2; i < 6; i++) {
    //2nd slot to 5th slot na
    const slot = document.querySelector(`.slot-${i}`); //changed loop

    if (unlockedSlots.includes(i)) {
      const unlockTime = unlockTimes[i];
      if (currentTime - unlockTime >= 2 * 60 * 1000) {
        // 24 hours in milliseconds
        // i 24 * 60 * 60 * 1000 para ma 24 hours
        unlockedSlots.splice(unlockedSlots.indexOf(i), 1);
        delete unlockTimes[i];
      } else {
        slot.classList.remove("locked");
        slot.classList.add("unlocked");
        const img = slot.querySelector("img");
        if (img) {
          img.remove();
        }
      }
    } else {
      slot.classList.remove("unlocked");
      slot.classList.add("locked");
      if (!slot.querySelector("img")) {
        const lockImg = document.createElement("img");
        lockImg.src = "/FINALWEB/pics/Lock.png";
        slot.appendChild(lockImg);
      }
    }
  }

  localStorage.setItem("unlockedSlots", JSON.stringify(unlockedSlots));
  localStorage.setItem("unlockTimes", JSON.stringify(unlockTimes));
});

//function to open slot
function handleSlotClick(event) {
  const slot = event.currentTarget;
  const img = slot.querySelector("img");

  if (img && img.src.includes("/FINALWEB/pics/Lock.png")) {
    alert("This slot is locked!");
  } else {
    window.location.href = "acceptedquest.html";
  }
}
document
  .querySelectorAll(".slot-1,.slot-2,.slot-3, .slot-4, .slot-5")
  .forEach((slot) => {
    slot.addEventListener("click", handleSlotClick);
  });


//function for report button to open report modal
document.getElementById("report").addEventListener("click", () => {
  const openreportmodal = document.getElementById("reportmodal");
  openreportmodal.style.display = "flex";
});
document.getElementById('reportclosebtn').addEventListener("click", () => {
  const closereportmodal = document.getElementById('reportmodal');
  closereportmodal.style.display = "none";
})

