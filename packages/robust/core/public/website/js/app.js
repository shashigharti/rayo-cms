//import("modules/modal.js")
//import("modules/social.js")
//import("modules/multi-select.js")
//import("modules/load-google-maps.js")


// Global Map loading for RealEstate and make it global
$(function () {
    let key = $('body').data('gapi-key');
    $.when(loadGoogleMaps(3, key, 'en', false, ['geometry', 'places']))
        .then(function () { // or .done(...)
            !!google.maps // true
            function gInitialize() {
                var input = document.getElementById('autocomplete_address');
                new google.maps.places.Autocomplete(input);
            }
            google.maps.event.addDomListener(window, 'load', gInitialize);
        });

});

