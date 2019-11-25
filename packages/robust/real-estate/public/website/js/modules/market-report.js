;
(function ($, FRW, window, document, undefined) {
    "use strict"
    let selectedDisplayOptions = [];
    let selectedSortOptions = [];
    let mrLocations = {};

    class LocationItem {
        constructor(type, value, active, selected_display_options) {
            this.type = type;
            this.value = value;
            this.active = active;
        }

        isActive(type) {
            return selectedDisplayOptions.includes(type);
        }

        render() {
            let template = (() => {
                if (this.type == 'title') {
                    return `<p class="single--list__block-item" data-type="${this.type}" data-value="${this.value}"><input type="checkbox"><label>${this.value}</label></p>`
                } else {
                    return `<p class="single--list__block-item ${this.isActive(this.type) ? '' : 'hide'}" data-type="${this.type}" data-value="${this.value}"><span><i class="fa fa-bookmark" aria-hidden="true"></i>${this.type} : </span>${this.value}</p>`
                }
            })();
            return template;
        }
    }

    class MRLocation {
        constructor(location_items) {
            this.locationItems = location_items;
        }
        render() {
            return `
            <div class="single--list__block">
            ${this.locationItems.map((locationItem) => {
                return locationItem.render();
            }).join('')}
            </div>
        `;
        }
    }

    function getSelectedOptions(sort_buttons) {
        selectedSortOptions = [];
        sort_buttons.forEach((btn) => {
            if (btn.getAttribute('data-status') == 'active') {
                selectedSortOptions.push(btn.getAttribute('data-type'));
            }
        });
    }

    function getSelectedDisplayOptions(display_buttons) {
        selectedDisplayOptions = [];
        display_buttons.forEach((btn) => {
            if (btn.getAttribute('data-status') == 'active') {
                selectedDisplayOptions.push(btn.getAttribute('data-type'));
            }
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

            return new MRLocation(mr_locations);
        });
    }

    function renderLocations() {
        document.getElementById('market__search--lists').innerHTML = mrLocations.map(location => {
            return location.render();
        }).join('');
    }

    $(function () {

        let mr_locations = [...document.getElementsByClassName("single--list__block")];
        let display_buttons = document.getElementById('market--right__display').querySelectorAll('.market--right__display-content > span');
        let sort_buttons = document.getElementById('market--left__sort').querySelectorAll('.market--left__sort--btns > a');

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
        getSelectedOptions(sort_buttons);
        sort_buttons.forEach((elem) => {
            elem.addEventListener("click", function (event) {
                this.setAttribute('data-status', (this.getAttribute('data-status') == 'active') ? 'inactive' : 'active');
                getSelectedOptions(sort_buttons);
                renderLocations();
            });
        });

        // Read all the initial locations from page and initialize locations array list
        initializeLocations(mr_locations);

        // Render Locations
        renderLocations();

    });
}(jQuery, FRW, window, document));
