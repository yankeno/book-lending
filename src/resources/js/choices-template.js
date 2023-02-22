import Choices from "choices.js";

const ids = [
  "book-authors-choices",
  "book-category-choices",
  "book-publisher-choices",
];

document.addEventListener("DOMContentLoaded", () => {
  ids.forEach((id) => {
    const element = document.getElementById(id);
    if (element) {
      return new Choices(element, {
        removeItemButton: true,
        maxItemCount: -1,
        allowHTML: true,
        searchResultLimit: 100,
        searchPlaceholderValue: "検索ワード",
        noResultsText: "一致する情報は見つかりません",
        itemSelectText: "選択",
      });
    }
  });
});
