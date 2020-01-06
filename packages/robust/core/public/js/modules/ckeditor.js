;
(function ($, FRW, window, document, undefined) {
    'use strict';
    FRW.CKEditor = {
        init: function () {
            try {
                CKEDITOR.instances['editor'].destroy(true);
            } catch (e) { }
            CKEDITOR.replace('editor');
        }
    };

    $(document).ready(function ($) {
        let selectObj = $('.editor');
        if (selectObj.length <= 0) {
            return;
        }

        FRW.CKEditor.init();
    });

}(jQuery, FRW, window, document));
