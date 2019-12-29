;
"use strict"
// Global function for leaflet map
class LMap {
    constructor(container, base_url = null) {
        this._container = container;
        this._zoom = this._container.getAttribute('data-zoom');
        this._map = new L.Map(container);
        this._baseurl = (base_url == null) ? window.location.origin : base_url;
        this._markerClusters = L.markerClusterGroup({
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

        L.gridLayer.googleMutant({ type: 'roadmap' }).addTo(this._map);
        this._map.setZoom(this._zoom);
    }
    render(properties) {
        let markers = [];
        properties.forEach(function (property) {
            const icon = new L.DivIcon({
                className: 'leaflet-marker_icon',
                html: '<i class="material-icons">home</i>'
            });
            const marker = new L.Marker([property._location._lat, property._location._lng], {
                title: property.name,
                icon
            });
            const content = `
                    <div class="map--content">
                        <p class="map--content_title">${property._name}</p>
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