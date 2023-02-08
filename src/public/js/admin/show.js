const procedure = document.getElementById("delete");
procedure.addEventListener("click", (e) => {
  if (!confirm("図書を削除しますか？\nこの操作は取り消せません。")) {
    e.preventDefault();
  }
});
