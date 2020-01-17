;
(function ($, FRW, window, document, undefined) {
    'use strict';
    FRW.DeleteForm = {
        confirmDelete: function(modalObj,buttonObj){
            buttonObj.on('click', function (e) {
                modalObj.find('.modal-body p').text(message);
                let message = buttonObj.attr('data-message');
                modalObj.find('.modal-body p').text(message);
                let title = buttonObj.attr('data-title');
                modalObj.find('.modal-title').text(title);
                // Pass form reference to modal for submission on yes/ok
                let form = buttonObj.closest('form');
                modalObj.find('.modal-footer #confirm').data('form', form);
            });
            modalObj.find('.modal-footer #confirm').on('click', function () {
                $(this).data('form').submit();
            });
        }
    };
    FRW.Modal = {
        init:function(){
        }
    };
    $(document).ready(function ($) {
        if ($('#confirmDelete').length > 0){
            let modalObj = $('#confirmDelete');
            let buttonObj = $('button[href="#confirmDelete"]');
            FRW.DeleteForm.confirmDelete(modalObj,buttonObj);
        }

    });
}(jQuery, FRW, window, document));
