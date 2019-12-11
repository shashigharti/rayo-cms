;
(function ($, FRW, window, document, undefined) {
    "use strict"

    $(function () {
        let advSearchElem = $('.advance-search');

        // Check if it has advance search
        if (advSearchElem.length > 0) {
            advSearchElem.click(function (e) {
                e.preventDefault();
                $('#adv-search-dropdown').toggleClass('show');
            });

            // $('#adv-search-dropdown select').each((index, elem) => {
            //     //console.log($(elem).data('selected'));
            //     console.log($(elem).data('selected'));
            // });
        }
    });
}(jQuery, FRW, window, document));
