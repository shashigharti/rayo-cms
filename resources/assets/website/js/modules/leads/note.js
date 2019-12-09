;
( function( $, FRW, window, document, undefined ) {
    "use strict"
    FRW.Note = {
        init: function() {
            const NOTE_FORM = $('#noteModal form');
            const URL = NOTE_FORM.data('url');


            NOTE_FORM.on('submit',function (e) {
                e.preventDefault();
                const DATA = NOTE_FORM.serialize();
                $.ajax({
                    url:URL,
                    type:"POST",
                    data:DATA,
                    success:function (response) {
                        const modal = document.getElementById('noteModal');
                        const modalInstance = M.Modal.getInstance(modal);
                        M.toast({html: 'Added Notes Successfully'});
                        modalInstance.close();
                    },
                    error:function (err) {
                        const modal = document.getElementById('noteModal');
                        const modalInstance = M.Modal.getInstance(modal);
                        M.toast({html: 'Something went wrong!!!'});
                        modalInstance.close();
                    }
                })
            });
        }
    };

    $( function() {
        FRW.Note.init();
    } );
}( jQuery, FRW, window, document ) );
