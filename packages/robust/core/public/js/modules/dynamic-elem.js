;
(function ($, FRW, window, document, undefined) {
    'use strict';
    FRW.DynamicElem = {
        init: function (selectObj) {
            selectObj.on('click', function(e){
                let parent = $(this).parent();
                $(this).clone().appendTo(parent);
                $(this).find('.dynamic-elem__btn').toggleClass('hide');
            });
        }
    };

    $(document).ready(function ($) {
        let selectObj = $('.dynamic-elem');
        if (selectObj.length <= 0) {
            return;
        }

        FRW.DynamicElem.init(selectObj);
    });

}(jQuery, FRW, window, document));
