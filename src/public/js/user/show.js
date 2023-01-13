const checkout = document.getElementById("checkout");
checkout.addEventListener("click", (e) => {
    if (!confirm("この本を借りますか？\n1度に借りられるのは3冊までです。")) {
        e.preventDefault();
    }
});
