;
(function ($, FRW, window, document, undefined) {
    'use strict';
    FRW.TinyMCEEditor = {
        init: function () {
            $('#editor').summernote();
        }
    };

    $(document).ready(function ($) {
        let selectObj = $('#editor');
        if (selectObj.length <= 0) {
            return;
        }

        FRW.TinyMCEEditor.init();
    });

}(jQuery, FRW, window, document));
