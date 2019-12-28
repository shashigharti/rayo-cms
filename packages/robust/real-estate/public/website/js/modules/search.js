;
"use strict"
// Global function for Search 
class Search {
    constructor() {
        this._container = $('.search-filter');
        this._qParams = {};
        let thisObj = this;

        $('.search-filter').on('change', function (e) {
            let prop = $(this).attr('name');
            prop = prop.replace(/[\[\]']+/g, '');
            if (!thisObj._qParams[prop]) {
                thisObj._qParams[prop] = 0;
            }
            thisObj._qParams[prop] = $(this).val();
        });
    }

    getQueryString() {
        return $.param(this._qParams);
    }
}