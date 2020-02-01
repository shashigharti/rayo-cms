;
(function ($, FRW, window, document, undefined) {
    "use strict"

    function resetCompareTable() {
        let elems = $(".user-favourite__table :input[name='listings[]']");
        $.each(elems, function (index, elem) {
            if ($(elem).prop("checked") == true) {
                $('.compare-favourite__table [data-id=' + $(elem).val() + ']').removeClass('hide');
            } else {
                $('.compare-favourite__table [data-id=' + $(elem).val() + ']').addClass('hide');
            }
        });
    }

    $(function () {
        let url = $('.user-favourite #compare-favourite').data('base-url');
        $(".user-favourite__table :input[name='listings[]']").on('click', function (e) {
            resetCompareTable();
        });
    });
}(jQuery, FRW, window, document));
