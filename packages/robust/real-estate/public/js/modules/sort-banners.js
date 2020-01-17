;
(function ($, FRW, window, document, undefined) {
    "use strict";

    $(function () {
        if($(".banners").length === 0){
            return;
        }
        $('.banners').nestable({
            placeClass: 'dd-placeholder',
            rootClass: 'banners',
            listClass: 'banners-list',
            itemClass: 'banner-item',
            handleClass: 'banner-handle'
        });

    });
}(jQuery, FRW, window, document));
