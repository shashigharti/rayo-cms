;
(function ($, FRW, window, document, undefined) {
    "use strict"
    let properties = [];
    let qParams = {};
    class Location {
        constructor(lat, lng) {
            this._lat = lat;
            this._lng = lng;
        }
    }

    class Property {
        constructor(id, name, slug, location, image, url, asking = null, sold = null) {
            this._id = id;
            this._name = name;
            this._slug = slug;
            this._location = location;
            this._image = image;
            this._url = url;
            this._asking = asking;
            this._sold = sold;
        }

        render() {
            return `
                <div class="col s6">
                    <div class="market-survey__listings--details-card">
                        <a href="${this._url}">
                            <img class="${this._image}">
                            <div class="card-overlay">
                                <input type="checkbox" value=${this._slug}>
                                <div class="card--details">
                                    <p>Sold ${this._sold}</p>
                                    <p>${this._name}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            `;
        }
    }

    function renderProperties() {
        let template = properties.map(function (property) {
            return property.render();
        }).join(" ");

        document.getElementById('market-survey__listings--details-block').innerHTML = `
            <div class="row">
                ${template}
            </div>
        `;

    }

    function loadProperties(query_string = '') {
        const listingContainer = document.getElementById('market-survey__listings');
        let url = listingContainer.getAttribute("data-url");

        if (query_string != '') {
            //url += "?" + query_string;
        }

        // Get data from the server and load properties array
        $.ajax({
            method: "GET",
            url: url
        }).done(function (response) {
            response.forEach((property) => {
                properties.push(new Property(
                    property.id,
                    property.name,
                    property.slug,
                    new Location(property.latitude, property.longitude),
                    'website/images/banner.jpg',
                    '#',
                    property.system_price,
                    property.system_price
                ));
            });
            renderProperties();
            $(listingContainer).trigger('loaded');
        });
    }

    function init() {
        let search = new Search();

        $('.search-filter').on('change', function (e) {
            loadProperties(search.getQueryString());
        });
    }

    class MarketSurveyMap extends LMap {
        render(properties) {
            let markers = [], base_url;
            const icon = new L.DivIcon({
                className: 'leaflet-marker_icon',
                html: '<i class="material-icons">home</i>'
            });
            base_url = this._baseurl;

            properties.forEach(function (property) {
                const marker = new L.Marker([property._location._lat, property._location._lng], {
                    title: property.name,
                    icon: icon
                });
                const url = `${base_url}/real-estate/${property._slug}`;
                const content = `
                    <div class="map--content">
                        <p class="map--content_title"><a href="${property._url}">${property._name}</a></p>
                        <img class="map--content_image" src="${property._image}" alt="${property._slug}">
                        <p class="map--content_footer">$${property._price}</p>
                    </div>
                `;
                marker.bindPopup(content);
                marker.on('mouseover', function (e) {
                    this.openPopup();
                });
                marker.on('click', function () {
                    window.open(url, '_blank');
                });
                markers.push(marker);
            });

            if (markers.length > 0) {
                this._markerClusters.addLayers(markers);
                this._map.fitBounds(this._markerClusters.getBounds());
                this._map.addLayer(this._markerClusters);
            }
        }

    }

    $(function () {
        let isMarketSurvey = (document.getElementsByClassName('market-survey').length > 0) ? true : false,
            listingContainer = document.getElementById('market-survey__listings');
        if (!isMarketSurvey) {
            return;
        }

        // Initialize Event Handlers
        init();

        // Get Data from the Server
        loadProperties();

        // Declare and initialize map container
        let mapContainer = document.getElementById('leaflet__map-container');
        let map = new MarketSurveyMap(mapContainer);

        $(listingContainer).on('loaded', function () {
            map.render(properties);
        });
    });
}(jQuery, FRW, window, document));
