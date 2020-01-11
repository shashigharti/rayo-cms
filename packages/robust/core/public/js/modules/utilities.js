;
(function ($, FRW, window, document, undefined) {
    'use strict';
    FRW.Utility = {
        // https://gist.github.com/mathewbyrne/1280286
        slugify: function (text) {
            return text.toString().toLowerCase()
                .replace(/\s+/g, '-')           // Replace spaces with -
                .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
                .replace(/\-\-+/g, '-')         // Replace multiple - with single -
                .replace(/^-+/, '')             // Trim - from start of text
                .replace(/-+$/, '');            // Trim - from end of text
        }
    }
    

    $(document).ready(function ($) {        
        if ($('[data-slug]').length > 0){
            $('[data-slug]').on('blur', function (e) {
                $('[name=slug]').val(FRW.Utility.slugify($(this).val()));
            });
        }
        
    });

}(jQuery, FRW, window, document));
