;
(function ($, FRW, window, document, undefined) {
    'use strict';
    FRW.Map = {
        init: function () {
            this.map = null;
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
            const map = document.getElementById('listingMap');
            const zoom = map.dataset.zoom;


            this.map = new L.Map(document.getElementById('listingMap'));
            L.gridLayer.googleMutant({ type: 'roadmap' }).addTo(this.map);
            const items = document.querySelectorAll('#listingMap .listing-map_data');
            let markers = [];
            const icon = new L.DivIcon({
                className: 'leaflet-marker_icon',
                html: '<i class="material-icons">home</i>'
            });
            const base_url = window.location.origin;

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
            if (markers.length > 0) {
                this.markerClusters.addLayers(markers);
                this.map.fitBounds(this.markerClusters.getBounds());
                this.map.addLayer(this.markerClusters);
                this.map.setZoom(zoom);
            }
        }
    };
    $(function () {
        const map = document.getElementById('listingMap');
        if (map) {
            //FRW.Map.init();
        }

    });
}(jQuery, FRW, window, document));
