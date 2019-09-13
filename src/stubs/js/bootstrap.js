/**
 * First, we will load all of this project's Javascript utilities and other
 * dependencies. Then, we will be ready to develop a robust and powerful
 * application frontend using useful Laravel and JavaScript libraries.
 */

window._ = require("lodash");

window.Popper = require("popper.js").default;

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */
window.$ = window.jQuery = require("jquery");

require("bootstrap");

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end.
 */
window.axios = require("axios");

/**
 * Next we will register the x requested with, CSRF token, and API token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

const csrfToken = document.head.querySelector('meta[name="csrf-token"]');

if (csrfToken) {
    window.axios.defaults.headers.common["X-CSRF-TOKEN"] = csrfToken.content;
} else {
    swal.fire({
        title: "Error",
        text: "CSRF token not found",
        type: "error",
        showCancelButton: false,
        showConfirmButton: true,
        confirmButtonText: "Close",
        allowOutsideClick: false
    });
}

const apiToken = document.head.querySelector('meta[name="api-token"]');

window.axios.defaults.headers.common["Authorization"] = `Bearer ${apiToken.content}`;

/**
 * Load the nprogress for progress bar purpose
 */
window.NProgress = require("nprogress");

/**
 * Start the progress before request begin
 */
axios.interceptors.request.use(
    config => {
        NProgress.start();
        return config;
    }
);

/**
 * End the progress after response fulfilled
 */
axios.interceptors.response.use(
    response => {
        NProgress.done();

        return response;
    }
);

/**
 * Load moment for time manipulation purpose
 */
window.moment = require("moment");

/**
 * Load jquery perfect scrollbar for custom scrollbar purpose
 */
window.perfectScrollbar = require("perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min");

/**
 * Load node waves for click effect purpose
 */
require("node-waves");

/**
 * Load sweetalert2 for alert purpose
 * Define default alert for error message
 */
window.swal = require("sweetalert2");

window.alertErrorMessage = error => {
    swal.fire({
        title: "Error",
        text: error.message,
        type: "error",
        showCancelButton: false,
        showConfirmButton: true,
        confirmButtonText: "Close",
        allowOutsideClick: false
    });
};

/**
 * Load select2 for select element purpose
 */
require("select2");

/**
 * Load bootstrap datepicker for datepicker purpose
 */
window.datepicker = require("bootstrap-datepicker");

require("bootstrap-datepicker/js/locales/bootstrap-datepicker.id");

/**
 * Load dropzone for file upload purpose
 */
window.Dropzone = require("dropzone");

/**
 * Load datatables for table purpose
 */
window.dt = require("datatables.net");

require("datatables.net-bs4");

/**
 * Load datatables button for table action purpose
 */
window.buttons = require("datatables.net-buttons");

require("datatables.net-buttons-bs4");

require("datatables.net-buttons/js/buttons.html5");

require("datatables.net-buttons/js/buttons.print");

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo'

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     encrypted: true
// });
