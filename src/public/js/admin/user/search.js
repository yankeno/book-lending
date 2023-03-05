const account = document.getElementById("account");
account.addEventListener("change", function () {
  this.form.submit();
});
const arrears = document.getElementById("arrears");
arrears.addEventListener("change", function () {
  this.form.submit();
});
const checkAll = document.getElementById("check-all");
const checks = document.getElementsByClassName("user-check");
checkAll.addEventListener("change", (e) => {
  Object.values(checks).forEach((check) => {
    // 各チェックボックスを「全て選択」と同じ状態にする
    check.checked = e.target.checked;
  });
});
const reactivation = document.getElementById("reactivation");
const suspension = document.getElementById("suspension");
reactivation.addEventListener("click", () => {
  document.account.action = "{{ route('admin.user.restore') }}";
  document.account.submit();
});
suspension.addEventListener("click", () => {
  document.account.action = "{{ route('admin.user.destroy') }}";
  document.account.submit();
});
