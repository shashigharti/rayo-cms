;
(function ($, FRW, window, document, undefined) {
    'use strict';
    FRW.DynamicElem = {
        init: function () {
            $(document.body).on('click', '.dynamic-elem__add', function () {
                let container = $(this).parent().parent(), parent = container.parent(), newElem = container.clone();
                let elems = [];
                container.find(':input').each(function (index, elem) {
                    let name = $(elem).attr('name'),
                        count = container.data('count');
                    $(elem).attr('name', name.replace(`${count}`, count + 1));
                });
                newElem.appendTo(parent);
                container.find('.dynamic-elem__btn').toggleClass('hide');
            });
            $(document.body).on('click', '.dynamic-elem__delete', function () {
                $(this).parent().parent().remove();
            });
        }
    };

    $(document).ready(function ($) {
        let selectObj = $('.dynamic-elem');
        if (selectObj.length <= 0) {
            return;
        }
        console.log("Dynamic Element");

        FRW.DynamicElem.init();
    });

}(jQuery, FRW, window, document));
