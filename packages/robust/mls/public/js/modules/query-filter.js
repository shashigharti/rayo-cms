;
(function ($, FRW, window, document, undefined) {
    'use strict';
    FRW.QueryFilter = {
        init: function () {
            $(document).on('click','.add-query_filter',FRW.QueryFilter.addField);
            $(document).on('click','.remove-filter',FRW.QueryFilter.removeField);
        },
        addField:function (event) {
            event.preventDefault();
            const url = $(this).data('url');
            $.get(url).done((res) => {
                const container = $('.filter-container');
                container.append(res.view);
            });
        },
        removeField:function (event) {
            event.preventDefault();
            const container = $(this).closest('.filter-fields-container');
            container.remove();
        }
    }
    $(document).ready(function () {
        $(document).ajaxStart(function () {
            $('#loading-image').removeClass('hidden');
        });
        $(document).ajaxStop(function () {
            $('#loading-image').addClass('hidden');
        });
        if($('.filter-container')) {
            FRW.QueryFilter.init();
        }
    });

}(jQuery, FRW, window, document));

