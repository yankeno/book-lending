window._ = require("lodash");

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require("axios");

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

import MicroModal from "micromodal";

MicroModal.init({
  disableScroll: true,
});

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

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });
