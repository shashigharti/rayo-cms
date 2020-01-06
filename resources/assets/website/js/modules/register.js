;
(function ($, FRW, window, document, undefined) {
    "use strict"
    FRW.Register = {
        init: function () {
            const REGISTER_FORM = $('#register--form');
            REGISTER_FORM.on('submit', function (e) {
                e.preventDefault();
                const REGISTER_URL = REGISTER_FORM.data('url');
                const DATA = REGISTER_FORM.serialize();
                $.ajax({
                    url: REGISTER_URL,
                    type: "POST",
                    data: DATA,
                    success: function (response) {
                        $('.msg-info').html(response.message);
                    },
                    error: function (response) {
                        let template = `${response.message}`;
                        $('.msg-error').html(template);
                    }
                })
            });
        },
        login: function () {
            $('#login--link').on('click', function (e) {
                e.preventDefault();
                const register = document.getElementById('registermodal');
                const registerInstance = M.Modal.getInstance(register);
                registerInstance.close();
                const login = document.getElementById('loginmodal');
                const loginInstance = M.Modal.getInstance(login);
                loginInstance.open();
            });
        }
    };

    $(function () {
        FRW.Register.init();
        FRW.Register.login();
    });
}(jQuery, FRW, window, document));
