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

            // Trigger Map Loaded Event
            $(document).trigger("map-loaded");

            // Initialize auto complete
            function autoCompleteInitialization() {
                let autoCompleteElem = new google.maps.places.Autocomplete(document.getElementById('autocomplete_address'));
                $(document).trigger("auto-complete-loaded", [autoCompleteElem]);
            }
            google.maps.event.addDomListener(window, 'load', autoCompleteInitialization);
        });

});

