;
(function ($, FRW, window, document, undefined) {
    "use strict"
    let selectedDisplayOptions = [];
    let selectedSortOptions = [];

    class LocationItem {
        constructor(type, value, active) {
            this.type = type;
            this.value = value;
            this.active = active;
        }

        render() {
            let template = (() => {
                if (this.type == 'title') {
                    return `<p><input type="checkbox"><label>${this.value}</label></p>`
                } else {
                    return `<p><span><i class="fa fa-bookmark" aria-hidden="true"></i>${this.type} : </span>${this.value}</p>`
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

    $(function () {
        let mrLocations = {};

        // Read Initial Locations
        let mr_locations = [...document.getElementsByClassName("single--list__block")];

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
        document.getElementById('market__search--lists').innerHTML = mrLocations.map(location => {
            return location.render();
        }).join('');

        // Display buttons 
        let display_buttons = document.getElementById('market--right__display').querySelectorAll('.market--right__display-content > span');


        // Add event listener for display buttons
        sort_buttons.forEach((elem) => {
            elem.addEventListener("click", function (event) {
                selectedDisplayOptions = [];
                this.setAttribute('data-status', (this.getAttribute('data-status') == 'active') ? 'inactive' : 'active');


                sort_buttons.forEach((btn) => {
                    if (btn.getAttribute('data-status') == 'active') {
                        selectedDisplayOptions.push(btn.getAttribute('data-type'));
                    }
                });

                console.log(selectedDisplayOptions);
            });
        });

        // Sort buttons
        let sort_buttons = document.getElementById('market--left__sort').querySelectorAll('.market--left__sort--btns > a');

        // Add event listener for sort buttons
        sort_buttons.forEach((elem) => {
            elem.addEventListener("click", function (event) {
                selectedDisplayOptions = [];
                this.setAttribute('data-status', (this.getAttribute('data-status') == 'active') ? 'inactive' : 'active');


                sort_buttons.forEach((btn) => {
                    if (btn.getAttribute('data-status') == 'active') {
                        selectedSortOptions.push(btn.getAttribute('data-type'));
                    }
                });

                console.log(selectedSortOptions);
            });
        });


    });
}(jQuery, FRW, window, document));
