;
(function ($, FRW, window, document, undefined) {
    "use strict";
    FRW.LeadFilter = {
        init: function(elem){
            elem.on('change',function (e) {
                const id = $(this).val();
                window.location.href = $(this).data('url') + '?agent=' + id
            })
        },
    };

    $(function () {
        const filter = $('.lead-filter__agent');
        if(filter.length === 0){
            return;
        }
        FRW.LeadFilter.init(filter);
    });
}(jQuery, FRW, window, document));
