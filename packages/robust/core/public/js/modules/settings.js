;
(function ($, FRW, window, document, undefined) {
    'use strict';
    FRW.TestEmail = {
        init: function (selectObj) {
            selectObj.on('click', function () {
                let url = $(this).data('url');
                const value = $('input[name="test_email"]').val();
                url = url + '?email=' + value;
                $.get(url).then(response => {
                   console.log(response);
                });
            });
        }
    };

    $(document).ready(function ($) {
        let selectObj = $('.dynamic-elem__btn.test-email__send');
        if (selectObj.length <= 0) {
            return;
        }

        FRW.TestEmail.init(selectObj);
    });

}(jQuery, FRW, window, document));
