;
(function ($, FRW, window, document, undefined) {
    'use strict';
    FRW.TestEmail = {
        init: function (selectObj) {
            selectObj.on('click', function () {
                console.log('ajax call for test email');
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
