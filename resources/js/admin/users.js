const uploadForm = document.querySelector("#upload-form");
const uploadButton = document.querySelector("#upload-btn");
const uploadInput = document.querySelector("#file");

uploadButton.onclick = () => uploadInput.click();
uploadInput.onchange = () => uploadForm.submit();
