//For handle Pop up
const popup = document.querySelector("#popup");

if (popup) {
    document.body.style.overflowY = "hidden";
}

const popupBtn = document.querySelector("#popupBtn");

popupBtn?.addEventListener("click", () => {
    popup.style.display = "none";
    document.body.style.overflowY = "auto";
});
