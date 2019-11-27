;
(function ($, FRW, window, document, undefined) {
    "use strict"
    class Property {
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

    $(function () {


    });
}(jQuery, FRW, window, document));
