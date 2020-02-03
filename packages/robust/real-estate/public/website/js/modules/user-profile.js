;
(function ($, FRW, window, document, undefined) {
    "use strict";
    let selectedIds = [];

    function resetCompareTable() {
        selectedIds = [];
        let elems = $(".user-favourite__table :input[name='listings[]']");
        $.each(elems, function (index, elem) {
            if ($(elem).prop("checked") == true) {
                $('.compare-favourite__table [data-id=' + $(elem).val() + ']').removeClass('hide');
                selectedIds.push($(elem).val());
            } else {
                $('.compare-favourite__table [data-id=' + $(elem).val() + ']').addClass('hide');
            }
        });
    }

    $(function () {
        let isUserFavourite = $('.user-favourite').length > 0;

        if (!isUserFavourite) {
            return false;
        }

        let mapElem = $('.user-favourite .show-on-map');
        $(".user-favourite__table :input[name='listings[]']").on('click', function (e) {
            resetCompareTable();
            mapElem.attr('href', mapElem.data('base-url') + '?ids=' + selectedIds.join(','));
        });
    });
}(jQuery, FRW, window, document));
