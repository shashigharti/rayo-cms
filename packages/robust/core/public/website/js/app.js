//import("modules/modal.js")
//import("modules/social.js")
//import("modules/multi-select.js")
//import("modules/load-google-maps.js")


// Global Map loading for RealEstate and make it global
$(function () {
    let key = $('body').data('gapi-key');
    $.when(loadGoogleMaps(3, key))
        .then(function () { // or .done(...)
            !!google.maps // true
        });
});

