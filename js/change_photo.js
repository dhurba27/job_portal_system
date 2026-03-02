
const btn = document.getElementById("changePhotoBtn");
const input = document.getElementById("photoInput");
const submitBtn = document.getElementById("photoSubmit");
const error = document.getElementById("photoError");

btn.addEventListener("click", () => {
    input.click();
});

input.addEventListener("change", function () {

    const file = this.files[0];

    if (!file) return;
    submitBtn.click(); 
});