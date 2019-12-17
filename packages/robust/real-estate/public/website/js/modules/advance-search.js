;
(function ($, FRW, window, document, undefined) {
    "use strict"

    $(function () {
        let advSearchElem = $('.advance-search');
        let searchFrm = document.querySelector('#frm-search');

        // Check if it has advance search
        if (advSearchElem.length > 0) {
            let inputElements = [];
            advSearchElem.click(function (e) {
                e.preventDefault();
                $('#adv-search-dropdown').toggleClass('show');
            });

            inputElements = document.querySelectorAll('[data-selected]:not(.multi-select)');
            inputElements.forEach(elem => {
                // Set the selected value for all those elements who are not of class multi-select
                elem.value = elem.getAttribute('data-selected');
            });
        }

        // Check if it has search form
        if (searchFrm.length > 0) {

            console.log('it has search form');
        }

    });
}(jQuery, FRW, window, document));
