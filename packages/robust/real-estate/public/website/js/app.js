//import("modules/lmap.js")
//import("modules/search.js")
//import("modules/market-report.js")
//import("modules/market-survey.js")
//import("modules/market-map-view.js")
//import("modules/advance-search.js")
//import("modules/tab-menu.js")
//import("modules/load-google-maps.js")


// Global Map loading for RealEstate and make it global
$(function () {
    $.when(loadGoogleMaps(3, 'AIzaSyBVMGPU0xbiE-XtO-U61AltLGW05KKF0cY'))
        .then(function () { // or .done(...)
            !!google.maps // true
        });
});