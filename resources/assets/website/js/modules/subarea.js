;
( function( $, FRW, window, document, undefined ) {
    "use strict"
    FRW.SubArea = {
        init: function() {
            $('.subdivs--list__btn').on('click',function () {
                $('.subdivs--list').not($(this).children('.subdivs--list')).removeClass('show');
                $(this).children('.subdivs--list').toggleClass('show');
            });
        }
    };

    $( function() {
        FRW.SubArea.init();
    } );
}( jQuery, FRW, window, document ) );
