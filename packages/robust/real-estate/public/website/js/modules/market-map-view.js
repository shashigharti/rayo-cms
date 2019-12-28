;
(function ($, FRW, window, document, undefined) {
    "use strict"
    let properties = [];
    class Location {
        constructor(lat, lng) {
            this._lat = lat;
            this._lng = lng;
        }
    }
    class Property {
        constructor(id, name, location) {
            this._id = id;
            this._name = name;
            this._location = location;
        }
    }
    function loadProperties() {
        const listingContainer = document.getElementById('market-survey__listings');
        // Read properties

        $(listingContainer).trigger('loaded');
    }

    $(function () {
        let isMarketReportMapView = (document.getElementsByClassName('map-view').length > 0) ? true : false;

        if (!isMarketReportMapView) {
            return;
        }

        // Declare and initialize map container
        let mapContainer = document.getElementById('leaflet__map-container');

        $(listingContainer).on('loaded', function () {
            // Initialize Map
            let map = new MarketSurveyMap(mapContainer, properties);
            map.render();
        });
    });
}(jQuery, FRW, window, document));
