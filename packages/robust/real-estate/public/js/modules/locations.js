;
( function( $, FRW, window, document, undefined ) {
    "use strict"
    FRW.Dropdown = {
        init: function() {
            const locations = $('.location--');
            locations.forEach(location => {
               const URL = location.data('url');
               console.log(url);
            });
        }
    };

    $( function() {
        FRW.Dropdown.init();
    } );
}( jQuery, FRW, window, document ) );
