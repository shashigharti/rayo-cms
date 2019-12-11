;
(function ($, FRW, window, document, undefined) {
    "use strict"

    $(function () {
        $('.advance-search').click(function (e) {
            e.preventDefault();
            $('#adv-search-dropdown').toggleClass('show');
        });
    });
}(jQuery, FRW, window, document));
