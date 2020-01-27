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
                if(id === '0'){
                    if(urlParams.has('agent')){
                        urlParams.delete('agent');
                    }
                    if(urlParams.toString() !== ''){
                        url = url + '?' +  urlParams.toString();
                    }
                    window.location.replace(url);
                }else{
                    if(urlParams.has('agent')){
                        urlParams.set('agent',id);
                    }else{
                        urlParams.append('agent',id);
                    }
                    url = url + '?' +  urlParams.toString();
                    window.location.replace(url);
                }
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
