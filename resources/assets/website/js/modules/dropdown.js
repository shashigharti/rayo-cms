;
( function( $, FRW, window, document, undefined ) {
    "use strict"
    FRW.Dropdown = {
        init: function() {
            const handle = $('#mega-dropdown');
            console.log(handle);
            handle.on('click',function () {
                $('#mega-dropdown_content').removeClass('hidden');
            });
            const Close = $('#mega-dropdown_close');
            Close.on('click',function () {
                $('#mega-dropdown_content').addClass('hidden');
            })
        }
    };

    $( function() {
        FRW.Dropdown.init();
    } );
}( jQuery, FRW, window, document ) );
