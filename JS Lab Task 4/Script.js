var unitPrice = 1000;

var quantityInput = document.getElementById("quantity");
var totalPrice = document.getElementById("totalPrice");

quantityInput.addEventListener("input", calculateTotal);

function calculateTotal() {

    var quantity = parseInt(quantityInput.value);

    if (quantity < 0 || isNaN(quantity)) {
        quantity = 0;
        quantityInput.value = 0;
        alert("Quantity cannot be negative!");
    }

    var total = unitPrice * quantity;

    totalPrice.value = total;

    if (total > 1000) {
        alert("Congratulations! You are eligible for a gift coupon!");
    }
}
