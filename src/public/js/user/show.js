const procedure = document.getElementById("procedure");
procedure.addEventListener("click", (e) => {
    if (!confirm(confirmMessage)) {
        e.preventDefault();
    }
});
