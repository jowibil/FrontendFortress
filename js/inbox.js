function showContent(option) {
  const rightPane = document.getElementById("right-pane");
  rightPane.innerHTML = "";

  for (let i = 1; i <= 5; i++) {
    const card = document.createElement("div");
    card.className = "card";

    const cardImage = document.createElement("div");
    cardImage.className = "card-image";

    const cardInnerImage = document.createElement("img");
    cardInnerImage.src = "/FrontendFortress-main/pic/bbg.jpg";
    cardInnerImage.alt - "Default Background";

    const cardContent = document.createElement("div");
    cardContent.className = "card-content";
    cardContent.innerHTML = `
  <p>User ${option}-${i}</p>
  <div class="button-group">
    <button class="accept-button" onclick="alert('Accept User Submission ${option}-${i}')">Accept</button>
    <button class="download-button" onclick="alert('Downloading User ${option}-${i}')">Download</button>
  </div>
`;


    card.appendChild(cardImage);
    cardImage.appendChild(cardInnerImage);
    card.appendChild(cardContent);
    rightPane.appendChild(card);

    const allButtons = document.querySelectorAll(".button"); // select all buttons

    // Remove 'active' from all buttons first
    allButtons.forEach((btn) => btn.classList.remove("active"));

    // Then activate the clicked one
    const button = event.target;
    button.classList.add("active");
  }
}

function goHome() {
  window.location.href = "homepage.php";
}
function logmeout() {
  window.location.href = "logout.php";
}