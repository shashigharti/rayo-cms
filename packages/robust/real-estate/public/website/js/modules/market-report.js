;
(function ($, FRW, window, document, undefined) {
    "use strict"
    let options = [];

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

        // Sort buttons
        let sort_buttons = document.getElementById('market--right__display').querySelectorAll('.market--right__display-content > span');

        sort_buttons.forEach((btn) => {
            options.push(btn.getAttribute('data-type'));
        });

        console.log(options);

        // Add Event Listener for Sort buttons
        sort_buttons.forEach((elem) => {
            elem.addEventListener("click", function (event) {
                let seletected_option = 'active';
                const exists = options.filter(option => option == seletected_option);
            });
        });

        // let sort_by_options = (() => {
        // })();


    });
}(jQuery, FRW, window, document));
