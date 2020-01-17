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

    $(function () {
        let marketReportMapViewContainer = document.getElementsByClassName('market-map-view'),
            isMarketReportMapView = (marketReportMapViewContainer.length > 0);

        if (!isMarketReportMapView) {
            return;
        }

        console.log('Market Report Map View');

        const items = document.querySelectorAll('#leaflet__map-container .leaflet__map-items');
        items.forEach(function (property) {
            properties.push(new Property(
                property.dataset.id,
                property.dataset.name,
                new Location(property.dataset.latitude, property.dataset.longitude)
            ));
        });

        // Declare and initialize map container
        let mapContainer = document.getElementById('leaflet__map-container');
        let map = new LMap(mapContainer);
        map.render(properties);
    });
}(jQuery, FRW, window, document));
