;
(function ($, FRW, window, document, undefined) {
    "use strict";
    FRW.LeadFilter = {
        init: function(elem){
            elem.on('change',function (e) {
                const id = $(this).val();
                let url = $(this).data('url');
                const queryString = window.location.search;
                const urlParams = new URLSearchParams(queryString);
                if(urlParams.has('agent')){
                    urlParams.set('agent',$(this).val());
                    url = url + '?' +  urlParams.toString();
                }else{
                    url = url + '?agent=' + $(this).val();
                }
                window.location.replace(url)
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
