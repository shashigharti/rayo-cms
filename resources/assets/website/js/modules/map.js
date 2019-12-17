;
(function ($, FRW, window, document, undefined) {
    'use strict';
    FRW.Map = {
        init: function () {
            this.map = null;
            this.location = [];
            this.groups = null;
            this.colors = ["#F00", "#11055b", "#65f441", "#f46542"];
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
            const mapOptions = {
                center: new L.LatLng(26.4885708, 87.1275611), zoom: 7,
            };
            const map = document.getElementById('map');
            this.map = new L.Map(document.getElementById("map"), mapOptions);
            const roads = L.gridLayer.googleMutant({ type: 'roadmap' }).addTo(this.map);
            const data = map.dataset.ids;
            const url = map.dataset.url;
            const $this = this;
            $.post(url,{ids:data},function (response) {
                let markers = [];
                const data = response.data;
                console.log(data);
                Object.keys(data).map(function(key, index) {
                    const latitude = data[key].latitude;
                    const longitude = data[key].longitude;
                    const marker = new L.Marker([latitude,longitude],{
                        title:key,
                    });
                    markers.push(marker);
                });
                $this.markerClusters.addLayers(markers);
                $this.map.fitBounds($this.markerClusters.getBounds());
            });
        }
    };
    $(function () {
        const map = document.getElementById('#map');
        if(map){
            FRW.Map.init();
        }

    });
}(jQuery, FRW, window, document));
