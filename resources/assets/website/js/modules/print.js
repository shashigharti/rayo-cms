;
( function( $, FRW, window, document, undefined ) {
    "use strict"
    FRW.Print = {
        init: function() {
            $('.printer-trigger').on('click',function (e) {
                e.preventDefault();
                const url = this.dataset.url;
                $.get(url).then((response) => {
                    const printWindow = window.open();
                    printWindow.document.write(response);
                    printWindow.print();
                    printWindow.close();
                });
            })
        }
    };

    $( function() {
        FRW.Print.init();
    } );
}( jQuery, FRW, window, document ) );
