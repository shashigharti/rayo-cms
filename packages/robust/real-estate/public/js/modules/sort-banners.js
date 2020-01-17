;
(function ($, FRW, window, document, undefined) {
    "use strict";

    $(function () {
        if($(".dd").length === 0){
            return;
        }
        $('.dd').nestable({
            placeClass: 'blue lighten-5'
        });

    });
}(jQuery, FRW, window, document));
