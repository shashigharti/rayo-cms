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
        constructor(id, name, slug, price, location, image, url, asking = null, sold = null) {
            this._id = id;
            this._name = name;
            this._slug = slug;
            this._price = price;
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
                                    <p>Price ${this._price}</p>
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

    function loadProperties() {
        const listingContainer = document.getElementById('market-survey__listings');
        const url = listingContainer.getAttribute("data-url")

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
                    property.system_price,
                    new Location(property.latitude, property.longitude),
                    'website/images/banner.jpg',
                    '#'
                ));
            });
            renderProperties();
            $(listingContainer).trigger('loaded');
        });
    }

    function init() {
        let filters = document.querySelectorAll("search-filter");
        filters.forEach((filter) => {
            filter.addEventListener("change", function (event) {
                console.log('changed');
            });
        });
    }

    FRW.LMap = {
        init: function (properties) {
            let mapContainer = document.getElementById('leaflet__map-container'),
                zoom = mapContainer.getAttribute('data-zoom');
            this.map = new L.Map(mapContainer);
            this.markerClusters = L.markerClusterGroup({
                iconCreateFunction: function (cluster) {
                    let childCount = cluster.getChildCount();
                    let c = ' marker-cluster-';
                    if (childCount < 4) {
                        c += 'small';
                    } else if (childCount < 100) {
                        c += 'medium';
                    } else {
                        c += 'large';
                    }
                    return new L.DivIcon({
                        html: '<div><span>' + childCount + '</span></div>',
                        className: 'marker-cluster' + c, iconSize: new L.Point(40, 40)
                    });
                }
            });

            L.gridLayer.googleMutant({ type: 'roadmap' }).addTo(this.map);
            this.renderMarkers(properties);
            this.map.setZoom(zoom);

        },
        renderMarkers: function (properties = [], url = null) {
            let markers = [];
            const icon = new L.DivIcon({
                className: 'leaflet-marker_icon',
                html: '<i class="material-icons">home</i>'
            }),
                base_url = (url == null) ? window.location.origin : url;

            properties.forEach(function (property) {
                const marker = new L.Marker([property._location._lat, property._location._lng], {
                    title: property.name,
                    icon: icon
                });
                const url = `${base_url}/real-estate/${property.slug}`;
                const content = `
                    <div class="map--content">
                        <p class="map--content_title"><a href="${property.url}">${property.name}</a></p>
                        <img class="map--content_image" src="${property.image}" alt="${property.slug}">
                        <p class="map--content_footer">$${property.price}</p>
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
                this.markerClusters.addLayers(markers);
                this.map.fitBounds(this.markerClusters.getBounds());
                this.map.addLayer(this.markerClusters);
            }

        }
    };
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

        $(listingContainer).on('loaded', function () {
            // Initialize Map
            FRW.LMap.init(properties);
        });

    });
}(jQuery, FRW, window, document));
