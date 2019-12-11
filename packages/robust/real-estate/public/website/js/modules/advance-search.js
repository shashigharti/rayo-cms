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

            $('#adv-search-dropdown select').each((index, elem) => {
                let selectedElements = [];
                //elem = $(elem);

                // if (elem.data('selected')) {
                //     selectedElements = elem.data('selected').split(",");
                //     console.log(selectedElements);
                // }
                // // console.log($(elem).data('selected'));
                // console.log($(elem).data('selected'));
            });
        }
    });
}(jQuery, FRW, window, document));
