;
(function ($, FRW, window, document, undefined) {
    "use strict"
    let selectedDisplayOptions = [];
    let selectedSortBy = 'Active';
    let mrLocations = {};
    let tags = [];

    class Tag {
        constructor(id, title) {
            this._id = id;
            this._title = title;
        }

        render() {
            let template = (() => {
                return `<span data-id=${this._id}>${this._title}</span>`;
            })();
            return template;
        }
    }

    class LocationItem {
        constructor(type, value, icon, url = null, id = null) {
            this._type = type;
            this._value = value;
            this._icon = icon;
            this._url = url;
            this._id = id;
        }

        isActive(selected_options, type) {
            return selected_options.includes(type);
        }

        render(selected_options) {
            let template = (() => {
                if (this._type == 'Title') {
                    return `
                    <p data-id="${this._id}"
                    data-type="${this._type}"
                    data-value="${this._value}"
                    data-class="${this._icon}">
                        <input type="checkbox" value="${this._value}">
                        <label>
                            <a href="${this._url}">${this._value}</a>
                        </label>
                    </p>`
                } else {
                    return `<p class="${this.isActive(selected_options, this._type) ? '' : 'hide'}" data-type="${this._type}" data-value="${this._value}" data-class="${this._icon}"><span><i class="${this._icon}" aria-hidden="true"></i>${this._type} : </span>${this._value}</p>`
                }
            })();
            return `
                ${template}
            `;
        }
    }

    class MRLocation {
        constructor(location_items, selected_display_options, sort_by = 'Active') {
            this.locationItems = location_items;
            this._selectedDisplayOptions = selected_display_options;
            this._sortBy = sort_by;
        }

        set selectedDisplayOptions(selectedDisplayOptions) {
            this._selectedDisplayOptions = selectedDisplayOptions;
        }

        render() {
            return `
            <div class="col market__search--lists-item--single">
            <div class="market__search--lists-item card">
            <div class="card-content">
            ${this.locationItems.map((locationItem) => {
                return locationItem.render(this._selectedDisplayOptions);
            }).join('')}
            </div>
            </div>
            </div>
        `;
        }
    }

    function getSelectedSortOption(elem, sort_buttons) {
        let status = (elem.getAttribute('data-status') == 'active') ? 'inactive' : 'active';
        sort_buttons.forEach((btn) => {
            btn.setAttribute('data-status', (status == 'active') ? 'inactive' : 'active');
            btn.classList.remove('active');
        });

        elem.setAttribute('data-status', status);
        elem.classList.add('active');
        selectedSortBy = elem.getAttribute('data-type');
    }

    function getSelectedDisplayOptions(display_buttons) {
        selectedDisplayOptions = [];
        display_buttons.forEach((btn) => {
            if (btn.getAttribute('data-status') == 'active') {
                selectedDisplayOptions.push(btn.getAttribute('data-type'));
            }
        });
    }

    function isNumber(n) { return !isNaN(parseFloat(n)) && !isNaN(n - 0) }

    function sortLocations() {
        mrLocations = mrLocations.sort(function (a, b) {
            let [location_item_a, location_item_b] = [a.locationItems.filter((item) => item._type == selectedSortBy),
            b.locationItems.filter((item) => item._type == selectedSortBy)];
            if (isNumber(location_item_a[0]._value)) {
                return parseFloat(location_item_a[0]._value) - parseFloat(location_item_b[0]._value);
            }

            return (location_item_a[0]._value < location_item_b[0]._value) ? -1 : 1;
        });
    }

    function initializeLocations(mr_locations) {
        mrLocations = mr_locations.map((location) => {
            let location_items = [...location.querySelectorAll('p')];
            mr_locations = location_items.map((location_item) => {
                let [type, value, icon, url, id] = [
                    location_item.getAttribute('data-type'),
                    location_item.getAttribute('data-value'),
                    location_item.getAttribute('data-class'),
                    location_item.getAttribute('data-url'),
                    location_item.getAttribute('data-id')
                ];

                return new LocationItem(type, value, icon, url, id);
            });

            return new MRLocation(mr_locations, selectedDisplayOptions);
        });
    }

    function renderLocations() {

        // Sort Location
        sortLocations();

        // Render Locations
        document.getElementById('market__search--lists').innerHTML = mrLocations.map(location => {
            location._selectedDisplayOptions = selectedDisplayOptions;
            return location.render();
        }).join('');

        // Display message if the locations container is empty
        if (mrLocations.length <= 0) {
            document.getElementById('market__search--lists').innerHTML = 'No records found!';
        }

        // Add event listeners for locations
        let locations = [...document.querySelectorAll("#market__search--lists .market__search--lists-item input")];
        locations.forEach((elem) => {
            elem.addEventListener("click", function (event) {

                // Initialize Variables
                let [parent, value, type, ids, compare_btn_url, btn_subdivision] =
                    [
                        this.parentNode,
                        this.getAttribute('value'),
                        document.querySelectorAll("[data-page]")[0].getAttribute('data-page'),
                        '',
                        document.getElementById("market__btns--compare").getAttribute('data-base-url'),
                        document.getElementById("market__btns--subdivisions")
                    ],
                    subdivision_btn_url = null,
                    map_btn_url = document.getElementById("market__btns--map").getAttribute('data-base-url');


                // Add/Remove Tag
                if (this.checked) {
                    tags.push(new Tag(parent.getAttribute('data-id'), this.getAttribute('value')));
                } else {
                    // Remove tag
                    tags = tags.filter((tag) => tag._title != value);
                }

                // Re - render Tags
                renderTags();

                // Generate URL
                ids = tags.map((tag) => tag._id);
                compare_btn_url = compare_btn_url + `?by=${type}&ids=${ids}`;
                map_btn_url = map_btn_url + `?by=${type}&ids=${ids}`;
                document.getElementById("market__btns--compare").setAttribute('href', compare_btn_url);
                document.getElementById("market__btns--map").setAttribute('href', map_btn_url);

                if (btn_subdivision) {
                    subdivision_btn_url = document.getElementById("market__btns--subdivisions").getAttribute('data-base-url');
                    subdivision_btn_url = subdivision_btn_url + `?by=${type}&ids=${ids}`;
                    document.getElementById("market__btns--subdivisions").setAttribute('href', subdivision_btn_url);
                }
            });

        });
    }

    function renderTags() {
        document.getElementById('market__tags').innerHTML = tags.map(tag => {
            return tag.render();
        }).join('');
    }

    function renderTemplate(locations) {
        let searchContainer = $('#market__search--lists'),
            location_type = $('#market__search--lists').data('page-type'),
            base_insight_url = searchContainer.data('insight-url'),
            template = ``;

        locations.forEach((location) => {
            template += `
                        <div class="col market__search--lists-item--single">
                            <div class="market__search--lists-item">
                                <div class="card-content">
                                    <p data-id="${location.slug}" data-type="Title"
                                                    data-value="${location.name}"
                                                    data-url="${base_insight_url}/${location_type}/${location.slug}"
                                                    data-class="">
                                                    <input type="checkbox" value="${location.name}">
                                                    <label><a href="${base_insight_url}/${location_type}/${location.slug}">${location.name}</a></label>
                                    </p>
                                    <p data-type="Active" data-value="${location.total_listings_active}" data-class="fa fa-bookmark">
                                        <span><i class="material-icons">bookmark</i>Active : ${location.total_listings_active}</span>
                                    </p>
                                    <p data-type="Sold" data-value="${location.total_listings_sold}" data-class="fa fa-shopping-cart">
                                        <span><i class="material-icons">shopping_cart</i>Sold : ${location.total_listings_sold}</span>
                                    </p>
                                    <p data-type="Average" data-value="${location.average_price_sold}" data-class="fa fa-percent">
                                        <span><i>%</i>Average : </span>$${location.average_price_sold}
                                    </p>
                                    <p data-type="Median" data-value="${location.median_price_sold}" data-class="fa fa-crosshairs">
                                        <span><i class="material-icons">adjust</i>Median : </span>$${location.median_price_sold}
                                    </p>
                                </div>
                            </div>
                        </div>
                    `;
        });
        searchContainer.html(template);
        searchContainer.trigger("loaded");
    }

    function initEventHandlers() {
        let display_buttons = document.getElementById('market--right__display').querySelectorAll('.market--right__display-content > span');
        let sort_buttons = document.getElementById('market--left__sort').querySelectorAll('a');

        // Add event listeners for display buttons
        getSelectedDisplayOptions(display_buttons);
        display_buttons.forEach((elem) => {
            elem.addEventListener("click", function (event) {
                this.classList.toggle('active');
                this.setAttribute('data-status', (this.getAttribute('data-status') == 'active') ? 'inactive' : 'active');
                getSelectedDisplayOptions(display_buttons);
                renderLocations();
            });
        });

        // Add event listeners for sort buttons
        sort_buttons.forEach((elem) => {
            elem.addEventListener("click", function (event) {
                getSelectedSortOption(this, sort_buttons);
                renderLocations();
            });
        });

        // Add event listeners on price selection
        $('.market__price-range-item a').on('click', function (e) {
            e.preventDefault();
            $('.market__price-range-item a').removeClass("active");
            $(this).toggleClass("active");

            // Get data from the server based on query params
            $.ajax({
                method: "GET",
                url: $(this).attr("href")
            }).done(function (response) {
                renderTemplate(response);
            });
        });
    }

    $(function () {
        let marketReportContainer = document.querySelector('.market-report, .market-insight'),
            isMarketReport = (marketReportContainer) ? true : false;

        let searchContainer = $('#market__search--lists');

        // Add event listeners on location selection
        $('.market-report__type').on('click', function (e) {
            window.location = $(this).data("href");
        });

        if (!isMarketReport || (searchContainer.length <= 0)) {
            return;
        }

        console.log('Market Report || Insight');

        // initialize event Handlers
        initEventHandlers();

        searchContainer.on('loaded', function () {
            let mr_locations = [...document.querySelectorAll("#market__search--lists .market__search--lists-item")];

            // Read all the initial locations from page and initialize locations array list
            initializeLocations(mr_locations);

            // Render Locations
            renderLocations();
        });

        // Trigger click event for anchor tag
        $('.market__price-range-item a.active').trigger('click');

        // Trigger loaded event for search list container for market report page only
        searchContainer.trigger("loaded");

    });
}(jQuery, FRW, window, document));
