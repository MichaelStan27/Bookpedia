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
