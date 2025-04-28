function closePopup(index) {
    document.getElementById("popup-" + index).style.display = "none";
}

document.addEventListener("DOMContentLoaded", function () {
    let popups = document.querySelectorAll(".popup");
    popups.forEach((popup, index) => {
        setTimeout(() => {
            popup.style.opacity = "0";
            setTimeout(() => {
                popup.style.display = "none";
            }, 500);
        }, 5000);
    });
});

function closePopup1() {
document.getElementById("error-popup-overlay").style.display = "none";
}