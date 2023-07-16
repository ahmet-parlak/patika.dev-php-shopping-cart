import { showSnackbar } from "./snackbar.js";

const addToCartButtons = document.querySelectorAll(".add-to-cart");
addToCartButtons.forEach((button) => {
    button.addEventListener("click", () => addToCart(button));
});

function addToCart(element) {
    const product = element.getAttribute('product');

    const url = "http://localhost/patika.dev/php/cart-app/add-to-cart.php";
    const data = new URLSearchParams({ "product": product });
    fetch(url, {
        method: "POST",
        body: data,
        headers: {
            "Content-type": "application/x-www-form-urlencoded"
        }
    })
        .then((response) => response.json())
        .then(function (json) {
            const message = json["message"];

            showSnackbar(message);
        });
}


/* Button Click Animation */
const buttons = document.querySelectorAll('.slide');

buttons.forEach(element => {
    element.addEventListener('click', () => {
        element.classList.remove('clicked');
        void element.offsetWidth; // Reflow
        element.classList.add('clicked');
    });

    element.addEventListener('animationend', () => {
        element.classList.remove('clicked');
    });
});
