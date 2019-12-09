;
( function( $, FRW, window, document, undefined ) {
    "use strict"
    FRW.Email = {
        toFriend: function() {
            const EMAIL_FORM = $('#emailModal form');
            const URL = EMAIL_FORM.data('url');
            EMAIL_FORM.on('submit',function (e) {
                e.preventDefault();
                const DATA = EMAIL_FORM.serialize();
                $.ajax({
                    url:URL,
                    type:"POST",
                    data:DATA,
                    success:function (response) {
                        const modal = document.getElementById('emailModal');
                        const modalInstance = M.Modal.getInstance(modal);
                        M.toast({html: 'A message will be sent to your friend'});
                        modalInstance.close();
                    },
                    error:function (err) {
                        const modal = document.getElementById('emailModal');
                        const modalInstance = M.Modal.getInstance(modal);
                        M.toast({html: 'Something went wrong!!!'});
                        modalInstance.close();
                    }
                })
            });
        },
        moreInfo: function() {
            const EMAIL_FORM = $('#infoModal form');
            const URL = EMAIL_FORM.data('url');
            EMAIL_FORM.on('submit',function (e) {
                e.preventDefault();
                const DATA = EMAIL_FORM.serialize();
                $.ajax({
                    url:URL,
                    type:"POST",
                    data:DATA,
                    success:function (response) {
                        const modal = document.getElementById('infoModal');
                        const modalInstance = M.Modal.getInstance(modal);
                        M.toast({html: 'A message will be sent to agent'});
                        modalInstance.close();
                    },
                    error:function (err) {
                        const modal = document.getElementById('infoModal');
                        const modalInstance = M.Modal.getInstance(modal);
                        M.toast({html: 'Something went wrong!!!'});
                        modalInstance.close();
                    }
                })
            });
        }
    };

    $( function() {
        FRW.Email.toFriend();
        FRW.Email.moreInfo();
    } );
}( jQuery, FRW, window, document ) );
