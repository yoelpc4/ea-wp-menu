/**
 * First, we will load all of this project's Javascript utilities and other
 * dependencies. Then, we will be ready to develop a robust and powerful
 * application frontend using useful Laravel and JavaScript libraries.
 */

require("./bootstrap");

// ==============================================================
// Auto select left navbar
// ==============================================================
$(function () {
    const url = window.location;
    
    let element = $("ul#sidebarnav a")
        .filter(function () {
            return this.href == url;
        })
        .addClass("active").parent().addClass("active");
    
    while (true) {
        if (element.is("li")) {
            element = element.parent().addClass("in").parent().addClass("active").children("a").addClass("active");
        } else {
            break;
        }
    }
    
    $("#sidebarnav a").on("click", function (e) {
        if (!$(this).hasClass("active")) {
            // hide any open menus and remove all other classes
            $("ul", $(this).parents("ul:first")).removeClass("in");
            
            $("a", $(this).parents("ul:first")).removeClass("active");

            // open our new menu and add the open class
            $(this).next("ul").addClass("in");
            
            $(this).addClass("active");
        } else if ($(this).hasClass("active")) {
            $(this).removeClass("active");
            
            $(this).parents("ul:first").removeClass("active");
            
            $(this).next("ul").removeClass("in");
        }
    });
    
    $("#sidebarnav >li >a.has-arrow").on("click", function (e) {
        e.preventDefault();
    });
});

$(function () {
    "use strict";
    
    
    $(".preloader").fadeOut();
    
    jQuery(document).on("click", ".mega-dropdown", function (e) {
        e.stopPropagation();
    });

    // ==============================================================
    // This is for the top header part and sidebar part
    // ==============================================================
    const set = function () {
        const width = window.innerWidth > 0 ? window.innerWidth : this.screen.width;
        
        const topOffset = 55;
        if (width < 1170) {
            $("body").addClass("mini-sidebar");
            
            $(".navbar-brand span").hide();
            
            $(".sidebartoggler i").addClass("fa fa-bars");
        } else {
            $("body").removeClass("mini-sidebar");
            
            $(".navbar-brand span").show();
        }
        
        let height = (window.innerHeight > 0 ? window.innerHeight : this.screen.height) - 1;
        
        height = height - topOffset;
        
        if (height < 1) height = 1;
        
        if (height > topOffset) {
            $(".page-wrapper").css("min-height", height + "px");
        }
    };
    
    $(window).ready(set);
    
    $(window).on("resize", set);

    // ==============================================================
    // Theme options
    // ==============================================================
    $(".sidebartoggler").on("click", function () {
        if ($("body").hasClass("mini-sidebar")) {
            
            $("body").trigger("resize");
            
            $("body").removeClass("mini-sidebar");
            
            $(".navbar-brand span").show();
        } else {
            $("body").trigger("resize");
            
            $("body").addClass("mini-sidebar");
            
            $(".navbar-brand span").hide();
        }
    });
    
    // this is for close icon when navigation open in mobile view
    $(".nav-toggler").click(function () {
        $("body").toggleClass("show-sidebar");
        
        $(".nav-toggler i").toggleClass("fa fa-bars");
        
        $(".nav-toggler i").addClass("fa fa-times");
    });
    
    $(".search-box a, .search-box .app-search .srh-btn").on("click", function () {
        $(".app-search").toggle(200);
    });

    // ==============================================================
    // Tooltip
    // ==============================================================
    $('[data-toggle="tooltip"]').tooltip();

    // ==============================================================
    // Popover
    // ==============================================================
    $('[data-toggle="popover"]').popover();

    // ==============================================================
    // Right sidebar options
    // ==============================================================
    $(".right-side-toggle").click(function () {
        $(".right-sidebar").slideDown(50);
        
        $(".right-sidebar").toggleClass("shw-rside");
    });

    // ==============================================================
    // This is for the floating labels
    // ==============================================================
    $(".floating-labels .form-control")
        .on("focus blur", function (e) {
            $(this).parents(".form-group").toggleClass("focused", e.type === "focus" || this.value.length > 0);
        })
        .trigger("blur");

    // ==============================================================
    // Perfact scrollbar
    // ==============================================================
    $(".scroll-sidebar, .right-side-panel, .message-center, .right-sidebar").perfectScrollbar();

    // ==============================================================
    // Resize all elements
    // ==============================================================
    $("body").trigger("resize");

    // ==============================================================
    // Color variation
    // ==============================================================
    let templateSkins = [
        "skin-default",
        "skin-green",
        "skin-red",
        "skin-blue",
        "skin-purple",
        "skin-megna",
        "skin-default-dark",
        "skin-green-dark",
        "skin-red-dark",
        "skin-blue-dark",
        "skin-purple-dark",
        "skin-megna-dark"
    ];

    /**
     * Get a prestored setting
     *
     * @param String name Name of of the setting
     * @returns String The value of the setting | null
     */
    function get(name) {
        if (typeof Storage !== "undefined") {
            return localStorage.getItem(name);
        } else {
            swal.fire({
                title: "Warning",
                text: "Please use modern browser in order this application able to works properly!",
                type: "warning",
                showCancelButton: false,
                showConfirmButton: true,
                confirmButtonText: "Tutup",
                allowOutsideClick: false
            });
        }
    }

    /**
     * Store a new settings in the browser
     *
     * @param String name Name of the setting
     * @param String val Value of the setting
     * @returns void
     */
    function store(name, val) {
        if (typeof Storage !== "undefined") {
            localStorage.setItem(name, val);
        } else {
            swal.fire({
                title: "Warning",
                text: "Please use modern browser in order this application able to works properly!",
                type: "warning",
                showCancelButton: false,
                showConfirmButton: true,
                confirmButtonText: "Tutup",
                allowOutsideClick: false
            });
        }
    }

    /**
     * Replaces the old skin with the new skin
     * @param String cls the new skin class
     * @returns Boolean false to prevent link's default action
     */
    function changeSkin(cls) {
        const $body = $("body");
        
        templateSkins.forEach(templateSkin => $body.removeClass(templateSkin));
        
        $body.addClass(cls);
        
        store("skin", cls);
        
        return false;
    }

    function setup() {
        const tmp = get("skin");
        
        if (tmp && templateSkins.includes(tmp)) changeSkin(tmp);
        
        // Add the change skin listener
        $("[data-skin]").on("click", function (e) {
            if ($(this).hasClass("knob")) return;
            
            e.preventDefault();
            
            changeSkin($(this).data("skin"));
        });
    }

    setup();

    $("#themecolors").on("click", "a", function () {
        $("#themecolors li a").removeClass("working");
        
        $(this).addClass("working");
    });

    // ==============================================================
    // Select2
    // ==============================================================
    // register event select2 initialized on the modal rather than on the body
    $.fn.modal.Constructor.prototype._enforceFocus = function () {
    };

    const select2Custom = require("./custom/select2.js");

    $('.select2').select2({
        allowClear: $(this).data().hasOwnProperty("placeholder"),
        matcher: select2Custom.modelMatcher,
        placeholder: $(this).data("placeholder") || "Choose an option"
    });

    // ==============================================================
    // Bootstrap Datepicker
    // ==============================================================
    $(".datepicker").datepicker({
        autoclose: true,
        clearBtn: true,
        format: "dd/mm/yyyy",
        language: "id",
        todayHighlight: true
    });
});

// ==============================================================
// Datatables
// ==============================================================
require("./custom/datatables");

// ==============================================================
// Dropzone
// ==============================================================
// disables auto discover to prevents dropzone from attached twice
Dropzone.autoDiscover = false;

window.attachmentManager = {
    bindOpenInNewTab(file, url) {
        // unbind default click handler
        $(file.previewElement).unbind('click');

        // on thumbnail click create url from file
        $(file.previewElement).on('click', function () {
            window.open(url, '_blank');
        });
    },
    getIcon(file) {
        // get the last word after dot
        const ext = file.name.split('.').pop().toLowerCase();

        let icon = 'txt';

        if (ext === 'docx' || ext === 'doc') {
            icon = 'doc';
        } else if (ext === 'xlsx' || ext === 'xls') {
            icon = 'xls';
        } else if (ext === 'pdf') {
            icon = 'pdf';
        }

        return `/storage/images/icons/${icon}.svg`;
    },
    update(dropzone, uploadedFiles, uploadInputs) {
        uploadedFiles.content.forEach(attachment => {
            // define the mock file
            const mockFile = {
                id: attachment.id,
                name: attachment.name,
                size: attachment.size,
                type: attachment.type,
                dataURL: attachment.url || attachment.dataURL,
                accepted: true
            };

            // trigger addedfile event by mock file
            dropzone.emit('addedfile', mockFile);

            // determine whether file is image
            if (mockFile.type.match(/image*/)) {
                // download image then resize it to create the thumbnail
                dropzone.createThumbnailFromUrl(
                    mockFile,
                    dropzone.options.thumbnailWidth,
                    dropzone.options.thumbnailHeight,
                    dropzone.options.thumbnailMethod,
                    true,
                    thumbnail => dropzone.emit('thumbnail', mockFile, thumbnail)
                );
            } else {
                // get icon to create the thumbnail
                dropzone.emit('thumbnail', mockFile, this.getIcon(mockFile));
            }

            // trigger complete event by mock file
            dropzone.emit('complete', mockFile);

            // this line needed to ensure max files exceeded event is working
            dropzone.files.push(mockFile);

            // create a new input hidden with value is mock file's id
            uploadInputs.create(mockFile.id);

            this.bindOpenInNewTab(mockFile, mockFile.dataURL);
        });
    }
};

window.ApiToken = {
    async load() {
        const apiToken = sessionStorage.getItem('api_token');

        if (!apiToken) {
            return await this.get();
        }

        return apiToken;
    },
    get() {
        return axios
            .get('/update-token')
            .then(response => response.data)
            .then(data => data.token)
            .then(apiToken => {
                sessionStorage.setItem('api_token', apiToken);

                window.axios.defaults.headers.common['Authorization'] = `Bearer ${apiToken}`;

                return apiToken;
            })
            .catch(alertErrorMessage);
    }
};
