;
(function ($, FRW, window, document, undefined) {
    'use strict';
    FRW.DynamicElem = {
        init: function (selectObj) {

            selectObj.on('click', function(e){
                let parent = $(this).parent();
                let newElem = $(this).clone();
                newElem.appendTo(parent);
                newElem.find('.dynamic-elem__btn').toggleClass('hide');
                console.log(newElem);
            });
            
            cln = itm.cloneNode(true);
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
