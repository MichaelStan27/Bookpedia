const { data } = require("autoprefixer");
const { isNull } = require("lodash");

const cartItemContainer = document.querySelector("#cartItemContainer");
const cartTotalContainer = document.querySelector("#cartTotalContainer");

init();

function init() {
    const listDurationInput = document.querySelectorAll(
        "input[data-id='durationInput']"
    );

    listDurationInput.forEach((input) => {
        input.addEventListener("change", () =>
            updateItem({
                cartId: input.getAttribute("id"),
                duration: input.value,
            })
        );
    });
}

function updateItem({ cartId, duration }) {
    const queryParam = new URLSearchParams({
        cartId,
        duration,
    });

    fetch(`/api/cart-container?${queryParam}`).then((resp) => {
        if (resp.status !== 200) {
            console.error("ERROR");
        } else {
            resp.json().then((result) => {
                cartItemContainer.innerHTML = result.cartItems;
                cartTotalContainer.innerHTML = result.cartTotal;

                init();
            });
        }
    });
}

const listAddToCartBtn = document.querySelectorAll(
    "button[data-id='addToCartBtn']"
);
listAddToCartBtn?.forEach((button) => {
    button.addEventListener("click", (e) => {
        e.preventDefault();
        addToCart(button);
    });
});

function addToCart(button) {
    const book_id = button.getAttribute("book-id");
    const data = new FormData(button.parentNode);
    fetch(`/add-to-cart/${book_id}`, {
        method: "POST",
        body: data,
    }).then((resp) => {
        if (resp.status !== 200) {
            console.error("ERROR");
        } else {
            resp.json().then((result) => {
                var body = document.querySelector("body");
                var cartCount = document.querySelector("#cartCount");
                let toast = document.querySelector("#toast");

                if (result.cartQty) cartCount.innerText = result.cartQty;

                if (toast) body.removeChild(toast);
                body.children[0].insertAdjacentHTML(
                    "beforebegin",
                    result.toast
                );
                toast = document.querySelector("#toast");
                setTimeout(() => {
                    toast.style.opacity = 0;
                }, 1500);
            });
        }
    });
}
