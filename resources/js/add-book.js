const lend_cb = document.querySelector("#lend_type");
const sell_cb = document.querySelector("#sell_type");
const input_loan_price = document.querySelector("#loan_price");
const input_sale_price = document.querySelector("#sale_price");

lend_cb?.addEventListener("click", () => {
    if (lend_cb.checked) {
        input_loan_price.classList.remove("hidden");
    } else {
        input_loan_price.classList.add("hidden");
    }
});

sell_cb?.addEventListener("click", () => {
    if (sell_cb.checked) {
        input_sale_price.classList.remove("hidden");
    } else {
        input_sale_price.classList.add("hidden");
    }
});
