;
(function ($, FRW, window, document, undefined) {
    "use strict"
    let properties = [];

    class Property {
        constructor(id, title, asking, location, sold) {
            this._id = id;
            this._title = title;
            this._asking = asking;
            this._location = location;
            this._sold = sold;
        }

        render() {
            return `
                <div class="col s12 m7">
                    <div class="card">
                        <div class="card-image">
                            <input type="checkbox" value=${this._id}>                            
                            <span class="card-title">${this._asking}</span>
                            <p>${this._sold}</p>
                            <a href="#">${this._location}</a>
                            <img src="${this._img}">
                        </div>
                    </div>
                </div>`;
        }
    }

    function renderProperties() {
        document.getElementById('market-survey__listings--content').innerHTML = properties.map(function (property) {
            return property.render();
        });
    }

    $(function () {
        // let isMarketSurvey = (document.getElementsByClassName('market-survey').length > 0) ? true : false;

        // if (!isMarketSurvey) {
        //     return;
        // }
        // for (let i = 1; i < 5; i++) {
        //     properties.push(new Property(i, "Test" + i, "Test" + i, "Test" + i, "Test" + i));
        // }

        // renderProperties();
    });
}(jQuery, FRW, window, document));
