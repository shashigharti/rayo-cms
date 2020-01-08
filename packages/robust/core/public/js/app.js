//import("modules/tinymce-editor.js")
//import("modules/vendors.min.js")
//import("modules/plugins.js")
//import("modules/reloadable-select.js")
//import("modules/multi-select.js")
//import("modules/dynamic-elem.js")
//import("modules/settings.js")
//import("modules/load-google-maps.js")


// Global Map loading for RealEstate and make it global
$(function () {
    let key = $('body').data('gapi-key');
    $.when(loadGoogleMaps(3, key))
        .then(function () { // or .done(...)
            !!google.maps // true
        });
});


