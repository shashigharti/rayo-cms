;
(function ($, FRW, window, document, undefined) {
    'use strict';
    FRW.DataReMap = {
        init: function () {
            $(document).on('click','.data-remap_add',FRW.DataReMap.addField);
        },
        addField:function (event) {
            event.preventDefault();
            const url = $(this).data('url');
            $.get(url).done((res) => {
               const container = $('.field-container');
               container.append(res.view);
            });
        }
    }
    $(document).ready(function () {
        $(document).ajaxStart(function () {
            $('#loading-image').removeClass('hidden');
        });
        $(document).ajaxStop(function () {
            $('#loading-image').addClass('hidden');
        });
        if($('.data_remap_key')) {
            FRW.DataReMap.init();
        }
    });

}(jQuery, FRW, window, document));

