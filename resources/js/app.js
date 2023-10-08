import "./bootstrap";
import $ from "jquery";
import "flowbite";

                // Add a common class to all product info buttons
                const infoButtons = document.querySelectorAll(".product-info-button");
            
                infoButtons.forEach((button) => {
                    button.addEventListener("click", (event) => {
                        const productID = event.currentTarget.getAttribute("data-product-id");
                        const productPopup = document.getElementById(`product-popup${productID}`);
            
                        if (productPopup) {
                            productPopup.classList.remove("hidden");
                        }
                    });
                });
            
                // Add a common class to all close product popup buttons
                const closePopupButtons = document.querySelectorAll(".close-product-popup");
            
                closePopupButtons.forEach((button) => {
                    button.addEventListener("click", (event) => {
                        const productID = event.currentTarget.getAttribute("data-product-id");
                        const productPopup = document.getElementById(`product-popup${productID}`);
                        if (productPopup) {
                            productPopup.classList.add("hidden");
                        }
                    });
                });

// open cart popup
const cartButton = document.getElementById("cart-button");
const cartPopup = document.getElementById("cart-popup");
const closeCartButton = document.getElementById("close-cart-popup");

cartButton.addEventListener("click", () => {
    cartPopup.classList.remove("hidden");
});

closeCartButton.addEventListener("click", () => {
    cartPopup.classList.add("hidden");
});

$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});


window.addToCart = function (product_id, quantity) {
    if (quantity == 0 || quantity == null) {
        quantity = 1;
    }
    $.ajax({
        type: "POST",
        url: "add-to-cart",
        data:
            "&product_id=" +
            product_id +
            "&quantity=" +
            quantity,
        success: function (response) {
            // alert("success" + response.toString());
            // close product popup
            const productPopup = document.getElementById(`product-popup${product_id}`);
            if (productPopup) {
                productPopup.classList.add("hidden");
            }

            // update and open cart popup

            const cartPopup = document.getElementById("cart-popup");
            cartPopup.classList.remove("hidden");
        },
    });
};


window.removeFromCart = function (product_id) {
    $.ajax({
        type: "POST",
        url: "remove-from-cart",
        data: "&product_id=" + product_id,
        success: function (response) {
alert("success" + response.toString());
        },
    });
}

window.closePopup = function (product_id) {
    const productPopup = document.getElementById(`product-popup${product_id}`);
    if (productPopup) {
        productPopup.classList.add("hidden");
    }
}