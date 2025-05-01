function goHome() {
    window.location.href = "homepage.php";
}

function logmeout() {
    window.location.href = "logout.php"
}


// file submission script
  const dropArea = document.getElementById("drop-area");
  const fileInput = document.getElementById("fileElem");
  const fileList = document.querySelector("#file-list ul");

  dropArea.addEventListener("click", () => fileInput.click());

  dropArea.addEventListener("dragover", (e) => {
    e.preventDefault();
    dropArea.classList.add("dragover");
  });

  dropArea.addEventListener("dragleave", () => {
    dropArea.classList.remove("dragover");
  });

  dropArea.addEventListener("drop", (e) => {
    e.preventDefault();
    dropArea.classList.remove("dragover");
    showFiles(e.dataTransfer.files);
  });

  fileInput.addEventListener("change", (e) => {
    showFiles(e.target.files);
  });

  function showFiles(files) {
    fileList.innerHTML = "";
    for (let file of files) {
      const li = document.createElement("li");
      li.textContent = file.name;
      fileList.appendChild(li);
    }
  }
