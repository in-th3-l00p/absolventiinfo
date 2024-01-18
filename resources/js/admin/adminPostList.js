const uploadForm = document.querySelector("#upload-form");
const uploadInput = document.querySelector("#upload-form-input");
const uploadButton = document.querySelector("#upload-form-button");

uploadButton.onclick = () => uploadInput.click();
uploadInput.onchange = () => uploadForm.submit();
