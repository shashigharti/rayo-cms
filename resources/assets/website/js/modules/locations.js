;
( function( $, FRW, window, document, undefined ) {
    "use strict"
    FRW.Locations = {
        init: function() {
            const locations = $('.advance-search_location');
            locations.each(function() {
                const location = $(this);
                const URL = location.data('url');
                $.get(URL).then(response => {
                    const options = response.data;
                    options.map(function (option) {
                        const child = `<option value="${option.id}">${option.name}</option>`;
                        location.append(child);
                    });
                });
            });
        }
    };

    $( function() {
        FRW.Locations.init();
    } );
}( jQuery, FRW, window, document ) );
