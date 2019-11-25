;
(function ($, FRW, window, document, undefined) {
    "use strict"
    let selectedDisplayOptions = [];
    let selectedSortBy = 'Active';
    let mrLocations = {};
    let selectedProperties = [];

    class Tag {
        constructor(title) {
            this._title = title;
        }

        render() {
            let template = (() => {
                return `<span>${this._title}<i class="fa fa-times" aria-hidden="true"></i></span>`;
            })();
            return template;
        }
    }

    class LocationItem {
        constructor(type, value, active) {
            this._type = type;
            this._value = value;
        }

        isActive(selected_options, type) {
            return selected_options.includes(type);
        }

        render(selected_options) {
            let template = (() => {
                if (this._type == 'Title') {
                    return `<p class="single--list__block-item" data-type="${this._type}" data-value="${this._value}"><input type="checkbox"><label>${this._value}</label></p>`
                } else {
                    return `<p class="single--list__block-item ${this.isActive(selected_options, this._type) ? '' : 'hide'}" data-type="${this._type}" data-value="${this._value}"><span><i class="fa fa-bookmark" aria-hidden="true"></i>${this._type} : </span>${this._value}</p>`
                }
            })();
            return template;
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
            <div class="single--list__block">
            ${this.locationItems.map((locationItem) => {
                return locationItem.render(this._selectedDisplayOptions);
            }).join('')}
            </div>
        `;
        }
    }

    function getSelectedSortOption(elem, sort_buttons) {
        let status = (elem.getAttribute('data-status') == 'active') ? 'inactive' : 'active';
        sort_buttons.forEach((btn) => {
            btn.setAttribute('data-status', (status == 'active') ? 'inactive' : 'active');
        });

        elem.setAttribute('data-status', status);
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
            let location_items = [...location.querySelectorAll('p.single--list__block-item')];
            mr_locations = location_items.map((location_item) => {
                let [type, value] = [
                    location_item.getAttribute('data-type'),
                    location_item.getAttribute('data-value')
                ];

                return new LocationItem(type, value, true);
            });

            return new MRLocation(mr_locations, selectedDisplayOptions);
        });
    }

    function renderLocations() {
        sortLocations();
        document.getElementById('market__search--lists').innerHTML = mrLocations.map(location => {
            location._selectedDisplayOptions = selectedDisplayOptions;
            return location.render();
        }).join('');
    }

    function renderTags() {
        selectedProperties.map((tag) => {
            console.log(tag);
        });
    }

    $(function () {

        let mr_locations = [...document.getElementsByClassName("single--list__block")];
        let display_buttons = document.getElementById('market--right__display').querySelectorAll('.market--right__display-content > span');
        let sort_buttons = document.getElementById('market--left__sort').querySelectorAll('a');

        // Add event listeners for display buttons
        getSelectedDisplayOptions(display_buttons);
        display_buttons.forEach((elem) => {
            elem.addEventListener("click", function (event) {
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

        // Read all the initial locations from page and initialize locations array list
        initializeLocations(mr_locations);

        // Render Locations
        renderLocations();

    });
}(jQuery, FRW, window, document));
