;
(function ($, FRW, window, document, undefined) {
    "use strict";
    let properties = [];
    let selectedProperties = [];
    let comparePropertiesRows = {
        '_asking': {display: 'Asking Price'},
        '_sold': {display: 'Sold Price'},
        '_address': {display: 'Address'},
        '_days_on_market': {display: 'Days on market'},
        '_bedrooms': {display: 'Bedrooms'},
        '_baths': {display: 'Baths'},
        '_square_footage': {display: 'Square Footage'},
        '_year_built': {display: 'Year Built'},
        '_lot_size': {display: 'Lot Size'},
        '_acres': {display: 'Acres'},
        '_stories': {display: 'stories'}
    };
    let autoCompleteElem = null;

    class MarketSurveyMap extends LMap {
        render(properties, geocode = null) {
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
                const content = `
                    <div class="map--content">
                        <p class="map--content_title"><a href="${property._url}">${property._name}</a></p>
                        <img class="map--content_image" src="${property._image}" alt="${property._slug}">
                        <p class="map--content_footer">$${property._asking}</p>
                    </div>
                `;
                marker.bindPopup(content);
                marker.on('mouseover', function (e) {
                    this.openPopup();
                });
                marker.on('click', function () {
                    window.open(property._url, '_blank');
                });
                markers.push(marker);
            });

            if (markers.length > 0) {
                this._markerClusters.addLayers(markers);
                if (geocode != null) {
                    this._map.fitBounds([geocode.split(',').map(parseFloat)]);
                    this._map.setZoom(9);
                } else {
                    this._map.fitBounds(this._markerClusters.getBounds());
                }
                this._map.addLayer(this._markerClusters);
            }
        }

    }

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
            this._days_on_market = 33;
            this._bedrooms = 3;
            this._bath = 4;
            this._square_footage = 10;
            this._year_built = 10;
            this._lot_size = 20;
            this._acres = 40;
            this._stories = 20;
        }

        render() {
            return `
                <div class="col s6">
                    <div class="market-survey__listings--details-card">
                        <a href="${this._url}">
                            <img src="${this._image}">
                            <div class="card-overlay">
                                <input name="property" type="checkbox" value=${this._slug}>
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

    function renderCompareTable(selectedProperties) {
        let template = 'No property is selected to compare';
        if (Object.keys(selectedProperties).length > 0) {
            $('.market-survey__left-container .tabs a').removeClass('active');
            $('.tabs').tabs('select', 'leaflet__compare-container');

            template = `
                <table>
                    <thead>
                        <tr>
                            <th>Properties</th>
            ${Object.keys(selectedProperties).map(function (propertyIndex) {
                return "<th>" + selectedProperties[propertyIndex]._slug + "</th>";
            }).join(" ")}
                        </tr>
                    </thead>
                    <tbody>
            ${Object.keys(comparePropertiesRows).map(function (attrIndex) {
                return `
                                <tr>
                                    <td>${comparePropertiesRows[attrIndex].display}</td>
                ${Object.keys(selectedProperties).map(function (propertyIndex) {
                    return "<td>" + selectedProperties[propertyIndex][attrIndex] + "</td>";
                }).join(" ")}
                                </tr>`;
            }).join(" ")}
                    </tbody>
            </table>
            `;

        }
        document.getElementById('leaflet__compare-container').innerHTML = template;

    }

    function loadProperties(search_by = 'search') {
        const listingContainer = document.getElementById('market-survey__listings'),
            loadingElem = document.getElementById('market-survey__listings--details-block').getAttribute('data-loading-elem');
        let url = listingContainer.getAttribute("data-url"),
            property_url = listingContainer.getAttribute("data-property-url"),
            price_min, price_max, sold_status, lat, lng, address;

        if (search_by === 'address') {
            let elem = $('#autocomplete_address');
            url = elem.data("url");
            lat = autoCompleteElem.getPlace().geometry.location.lat();
            lng = autoCompleteElem.getPlace().geometry.location.lng();
            $('.market-survey__heading h1').html(autoCompleteElem.getPlace().formatted_address);

            url += `?lat=${lat}&lng=${lng}`;
        } else {
            // Append Price
            price_min = document.querySelector('.search-filter__price-min').selectedOptions[0].value;
            price_max = document.querySelector('.search-filter__price-max').selectedOptions[0].value;
            sold_status = document.querySelector('.search-filter__status').selectedOptions[0].value;
            url += `&price=${price_min}-${price_max}&sold_status=${sold_status}`;
        }


        // Display Loading
        $(loadingElem).toggleClass('hide');

        // Get data from the server and load properties array
        $.ajax({
            method: "GET",
            url: url
        }).done(function (response) {
            let records = response.records;
            records.forEach((property) => {
                if (property.latitude !== null || property.longitude !== null) {
                    let imageUrl = 'https://via.placeholder.com/150';

                    if (property.images.length > 0) {
                        imageUrl = property.images[0].url;
                    }
                    //getPropertyValues(property.property, Object.keys(comparePropertiesRows), response.fields);
                    properties.push(new Property(
                        property.id,
                        property.name,
                        property.slug,
                        new Location(property.latitude, property.longitude),
                        imageUrl,
                        property_url.replace('slug', property.slug),
                        property.system_price,
                        property.system_price
                    ));
                }
            });
            // Hide Loading
            $(loadingElem).toggleClass('hide');


            // Render Properties
            renderProperties();
            $(listingContainer).trigger('loaded');
        });
    }

    // https://stackoverflow.com/questions/7176908/how-to-get-index-of-object-by-its-property-in-javascript/54015295
    function findObjInArray(array, attr, value) {
        for (var i = 0; i < array.length; i += 1) {
            if (array[i][attr] === value) {
                return array[i];
            }
        }
        return -1;
    }

    function init() {
        let search = new Search();

        $('.search-filter').on('change', function (e) {
            loadProperties();
        });

        $(document).on('click', '.market-survey__listings--details-card :input[name="property"]', function (e) {
            let value_to_search = $(this).val();
            let elem = findObjInArray(properties, '_slug', value_to_search);

            if ($(this).prop("checked") === true) {
                // Add property
                if (elem !== -1) {
                    if (!selectedProperties[elem._slug]) {
                        selectedProperties[elem._slug] = '';
                    }
                    selectedProperties[elem._slug] = elem;
                }
            } else {
                // Remove if unchecked
                if (selectedProperties[elem._slug])
                    delete selectedProperties[elem._slug];
            }

            renderCompareTable(selectedProperties);
        });

        $(document).on("map-loaded", function (e) {
            let elem = $('[name=address]');
        });

        $(document).on("auto-complete-loaded", function (e, elem) {
            autoCompleteElem = elem;
            google.maps.event.addListener(autoCompleteElem, 'place_changed', function () {
                loadProperties('address');
            });
        });
    }

    function getPropertyValues(properties, property_types_to_read, fields_to_map) {
        let property_types_values = [];
        Object.keys(fields_to_map).forEach(function(index, field){
            console.log('_' + field);
            console.log(index);
           // property_types_values.push(('_' + field));
        });

        // properties.forEach(function (property) {
        //     property_types_to_read.forEach(function (property_type) {
        //         let field = property_type.substring(1);
        //         if (property.type === field) {
        //             console.log(fields_to_map[field]);
        //         }
        //     });
        //
        // });
    }


    $(function () {
        let isMarketSurvey = (document.getElementsByClassName('market-survey').length > 0),
            listingContainer = document.getElementById('market-survey__listings');
        if (!isMarketSurvey) {
            return;
        }

        console.log('Market Survey');

        // Initialize Event Handlers
        init();

        // Get Data from the Server
        loadProperties();

        // Declare and initialize map container
        let mapContainer = document.getElementById('leaflet__map-container'),
            map = new MarketSurveyMap(mapContainer),
            geocode = mapContainer.getAttribute('data-geocode');
        $(listingContainer).on('loaded', function () {
            map.render(properties, geocode);
        });


    });
}(jQuery, FRW, window, document));
