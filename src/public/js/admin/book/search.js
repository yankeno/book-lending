const filter = document.getElementById("filter");
filter.addEventListener("change", function () {
  this.form.submit();
});
const category = document.getElementById("category");
category.addEventListener("change", function () {
  this.form.submit();
});
