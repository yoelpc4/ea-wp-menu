/**
 * First, we will load all of this project's Javascript utilities and other
 * dependencies. Then, we will be ready to develop a robust and powerful
 * application frontend using useful Laravel and JavaScript libraries.
 */

window.Popper = require('popper.js').default;

window.$ = window.jQuery = require('jquery');

require('bootstrap');

$(function() {
    $(".preloader").fadeOut();

    $('[data-toggle="tooltip"]').tooltip();
});
