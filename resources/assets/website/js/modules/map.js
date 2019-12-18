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
                className:'leaflet-marker_icon',
                html: '<i class="material-icons">home</i>'
            });
            items.forEach(function (item) {
                const name = item.dataset.name;
                const slug = item.dataset.slug;
                const lat = item.dataset.lat;
                const lng = item.dataset.lng;
                const price = item.dataset.price;
                const marker = new L.Marker([lat,lng],{
                    title:name,
                    icon:icon
                });
                marker.bindPopup(`<p>Name : ${name} || </p> <p> Price : ${price} </p>`);
                marker.on('mouseover', function (e) {
                    this.openPopup();
                });
                marker.on('mouseout', function (e) {
                    this.closePopup();
                });
                marker.on('click',function () {
                    const base_url = window.location.origin;
                    const url = `${base_url}/real-estate/${slug}`;
                    window.open(url,'_blank');
                });
                markers.push(marker);
            });
            this.markerClusters.addLayers(markers);
            this.map.fitBounds(this.markerClusters.getBounds());
            this.map.addLayer(this.markerClusters);
            this.map.setZoom(zoom);
        }
    };
    $(function () {
        const map = document.getElementById('listingMap');
        if(map){
            FRW.Map.init();
        }

    });
}(jQuery, FRW, window, document));
