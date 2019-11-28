
;
( function( $, FRW, window, document, undefined ) {
    "use strict"
    FRW.Login = {
        init: function() {
            const LOGIN_FORM = $('#login--form');
            LOGIN_FORM.on('submit',function (e) {
                const URL = LOGIN_FORM.data('url');
                e.preventDefault();
                const DATA = LOGIN_FORM.serialize();
                $.ajax({
                    url:URL,
                    type:"POST",
                    data:DATA,
                    success:function (response) {
                        $(location).attr('href','/profile');
                    },
                    error:function (err) {
                        $.each(err.responseJSON.errors, function(key,value) {
                            M.toast({html: value})
                        });
                    }
                })
            });
        },
        register:function () {
            $('#register--link').on('click',function (e) {
                e.preventDefault();
                const login = document.getElementById('loginmodal');
                const loginInstance = M.Modal.getInstance(login);
                loginInstance.close();
                const register = document.getElementById('registermodal');
                const registerInstance = M.Modal.getInstance(register);
                registerInstance.open();
            });
        }
    };

    $( function() {
        FRW.Login.init();
        FRW.Login.register();
    } );
}( jQuery, FRW, window, document ) );
