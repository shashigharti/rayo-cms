;
(function ($, FRW, window, document, undefined) {
    "use strict"
    let properties = [];
    let qParams = {};

    class Property {
        constructor(id, title, asking, location, sold) {
            this._id = id;
            this._title = title;
            this._asking = asking;
            this._location = location;
            this._sold = sold;
        }

        render() {
            return `
                <div class="col s12 m7">
                    <div class="card">
                        <div class="card-image">
                            <input type="checkbox" value=${this._id}>                            
                            <span class="card-title">${this._asking}</span>
                            <p>${this._sold}</p>
                            <a href="#">${this._location}</a>
                            <img src="${this._img}">
                        </div>
                    </div>
                </div>`;
        }
    }

    function renderProperties() {
        document.getElementById('market-survey__listings--content').innerHTML = properties.map(function (property) {
            return property.render();
        });
    }

    function loadProperties() {
        const listingContainer = document.getElementById('market-survey__listings');
        const url = listingContainer.getAttribute("data-href")

        // Get data from the server and load properties array
        $.ajax({
            method: "GET",
            url: url
        }).done(function (response) {
            response.forEach((property) => {
                properties.push(property);
            });
            listingContainer.trigger('loaded');
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
        init: function (items) {
            let zoom = document.getElementById('leaflet__map-container').getAttribute('data-zoom');
            this.map = new L.Map(document.getElementById('leaflet__map-container'));
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
            this.renderMarkers();
            this.map.setZoom(zoom);

        },
        renderMarkers: function (url = null, items = []) {
            let markers = [];
            const icon = new L.DivIcon({
                className: 'leaflet-marker_icon',
                html: '<i class="material-icons">home</i>'
            }),
                base_url = (url == null) ? window.location.origin : url;

            if (items.length <= 0) {
                items = document.querySelectorAll('#leaflet__map-container .leaflet__map-data');
            }

            items.forEach(function (item) {
                const name = item.dataset.name;
                const image = item.dataset.image;
                const slug = item.dataset.slug;
                const lat = item.dataset.lat;
                const lng = item.dataset.lng;
                const price = item.dataset.price;
                const marker = new L.Marker([lat, lng], {
                    title: name,
                    icon: icon
                });
                const url = `${base_url}/real-estate/${slug}`;
                const content = `
                    <div class="map--content">
                        <p class="map--content_title"><a href="${url}">${name}</a></p>
                        <img class="map--content_image" src="${image}" alt="${slug}">
                        <p class="map--content_footer">$${price}</p>
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
            this.markerClusters.addLayers(markers);
            this.map.fitBounds(this.markerClusters.getBounds());
            this.map.addLayer(this.markerClusters);
        }
    };
    $(function () {
        let isMarketSurvey = (document.getElementsByClassName('market-survey').length > 0) ? true : false;
        if (!isMarketSurvey) {
            return;
        }

        // Initialize Event Handlers
        init();

        // Get Data from the Server
        loadProperties()

        // Initialize Map
        FRW.LMap.init(properties);


    });
}(jQuery, FRW, window, document));
