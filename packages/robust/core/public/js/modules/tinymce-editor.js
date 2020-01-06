;
(function ($, FRW, window, document, undefined) {
    'use strict';
    FRW.TinyMCEEditor = {
        init: function () {
            tinymce.init({
                selector: 'textarea.editor',
                width: 900,
                height: 300
            });
        }
    };

    $(document).ready(function ($) {
        let selectObj = $('.editor');
        if (selectObj.length <= 0) {
            return;
        }

        FRW.TinyMCEEditor.init();
    });

}(jQuery, FRW, window, document));
