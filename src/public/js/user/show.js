const checkout = document.getElementById("checkout");
checkout.addEventListener("click", (e) => {
    if (!confirm(confirmMessage)) {
        e.preventDefault();
    }
});
