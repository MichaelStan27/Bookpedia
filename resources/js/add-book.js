const lend_cb = document.querySelector("#lend_type");
const sell_cb = document.querySelector("#sell_type");
const input_loan_price = document.querySelector("#loan_price_field");
const input_sale_price = document.querySelector("#sale_price_field");

//Initial state reading checkbox checked to displaying price field
if (lend_cb?.checked == false) {
    input_loan_price.classList.add("hidden");
}
if (sell_cb?.checked == false) {
    input_sale_price.classList.add("hidden");
}

lend_cb?.addEventListener("change", () => {
    if (lend_cb.checked) {
        input_loan_price.classList.remove("hidden");
    } else {
        input_loan_price.classList.add("hidden");
        document.querySelector("#loan_price").value = "";
    }
});

sell_cb?.addEventListener("change", () => {
    if (sell_cb.checked) {
        input_sale_price.classList.remove("hidden");
    } else {
        input_sale_price.classList.add("hidden");
        document.querySelector("#sale_price").value = "";
    }
});

let inputImg = document.querySelector("#image");

function preview_book_image() {
    const photoPreview = document.querySelector("#preview-img");

    const fileReader = new FileReader();
    fileReader.readAsDataURL(inputImg.files[0]);

    fileReader.addEventListener("load", (oFREvent) => {
        photoPreview.children[1].src = oFREvent.target.result;
    });

    photoPreview.classList.remove("hidden");
}

inputImg?.addEventListener("change", () => preview_book_image());
