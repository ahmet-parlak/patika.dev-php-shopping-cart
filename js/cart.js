import { showSnackbar } from "./snackbar.js";

const increaseButtons = document.querySelectorAll(".increase-product");
increaseButtons.forEach((button) => {
    button.addEventListener("click", () => increaseProduct(button));
});

const decreaseButtons = document.querySelectorAll(".decrease-product");
decreaseButtons.forEach((button) => {
    button.addEventListener("click", () => decreaseProduct(button));
});

const removeButtons = document.querySelectorAll(".remove-product");
removeButtons.forEach((button) => {
    button.addEventListener("click", () => removeProduct(button));
});

const removeCartButton = document.querySelector(".remove-cart");
removeCartButton?.addEventListener("click", () => removeCart());




function increaseProduct(element) {
    const product = element.getAttribute('product');
    const url = "http://localhost/patika.dev/php/cart-app/cart-transactions.php";
    const data = new URLSearchParams({ "transaction": "increase-product", "product": product });
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

            if (json["success"] == "true") {
                const closestQuantityElement = element.closest('tr').querySelector('.quantity');
                const currentQuantity = parseInt(closestQuantityElement.textContent);
                closestQuantityElement.textContent = currentQuantity + 1;
                updateTotal();
            }
        });
}
function decreaseProduct(element) {
    const product = element.getAttribute('product');
    const url = "http://localhost/patika.dev/php/cart-app/cart-transactions.php";
    const data = new URLSearchParams({ "transaction": "decrease-product", "product": product });
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
            if (json["success"] == "true") {
                const closestQuantityElement = element.closest('tr').querySelector('.quantity');
                const currentQuantity = parseInt(closestQuantityElement.textContent) - 1;
                closestQuantityElement.textContent = currentQuantity;
                if (currentQuantity == 0) element.closest('tr').remove();
                updateTotal();
            }
        })


}
function removeProduct(element) {
    const product = element.getAttribute('product');
    const url = "http://localhost/patika.dev/php/cart-app/cart-transactions.php";
    const data = new URLSearchParams({ "transaction": "remove-product", "product": product });
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
            if (json["success"] == "true") {
                element.closest('tr').remove();
                updateTotal();
            }

        });
}
function removeCart() {
    const url = "http://localhost/patika.dev/php/cart-app/cart-transactions.php";
    const data = new URLSearchParams({ "transaction": "remove-cart" });
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
            if (json["success"] == "true") {
                location.reload();
            }
        });
}


function updateTotal() {
    const tbody = document.querySelector("tbody");
    const trList = tbody.querySelectorAll("tr");
    const productCountElement = document.querySelector(".product-count");
    const totalQuantityElement = document.querySelector(".total-quantity");

    /* Product Count */
    productCountElement.textContent = trList.length;

    if (productCountElement.textContent == "0") {
        location.reload();
    }

    /* Total Quantity */
    let totalQuantity = 0;
    trList.forEach(tr => {

        const quantityElement = tr.querySelector(".quantity");

        if (quantityElement) {
            const quantityValue = parseInt(quantityElement.textContent);
            totalQuantity += quantityValue;
        }
    });
    totalQuantityElement.textContent = totalQuantity;

}