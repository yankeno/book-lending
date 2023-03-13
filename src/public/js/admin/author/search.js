// 著者ステータス更新
const authorStatus = document.getElementById("author_status");
authorStatus.addEventListener("change", function () {
  this.form.submit();
});
// 「全て選択」用
const checkAll = document.getElementById("check-all");
const checks = document.getElementsByClassName("author-check");
checkAll.addEventListener("change", (e) => {
  Object.values(checks).forEach((check) => {
    // 各チェックボックスを「全て選択」と同じ状態にする
    check.checked = e.target.checked;
  });
});
const reactivation = document.getElementById("reactivation");
const suspension = document.getElementById("suspension");
reactivation.addEventListener("click", () => {
  document.account.action = `${appUrl}/admin/author/restore`;
  document.account.submit();
});
suspension.addEventListener("click", () => {
  document.account.action = `${appUrl}/admin/author/destroy`;
  document.account.submit();
});

// 著者名更新
const buttons = document.getElementsByClassName("author-modify");
for (let i = 0; i < buttons.length; i++) {
  buttons[i].addEventListener("click", (e) => {
    buttons[i].disabled = true;
    const postData = {
      name: document.getElementById(e.target.name).value,
    };
    const authorId = buttons[i].name;

    fetch(`${appUrl}/admin/author/update/${authorId}`, {
      method: "PUT",
      headers: {
        "Content-Type": "application/json",
        Accept: "application/json",
        "X-CSRF-TOKEN": csrfToken,
      },
      body: JSON.stringify(postData),
    })
      .then((result) => {
        if (!result.ok) {
          throw new Error();
        }
        return result.json();
      })
      .then((json) => {
        alert(json.message);
      })
      .catch((err) => {
        alert("著者情報の更新に失敗しました。");
      })
      .finally(() => {
        buttons[i].disabled = false;
      });
  });
}

// 著者登録
const register = document.getElementById("register");
const submitAuthor = document.getElementById("submit-author");
register.addEventListener("click", () => MicroModal.show("modal-register"));
