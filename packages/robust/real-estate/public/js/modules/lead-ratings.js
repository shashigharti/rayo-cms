;
(function ($, FRW, window, document, undefined) {
    "use strict";
    FRW.LeadRating = {
        init: function(){
            $('.RatingForm').on('click',function (e) {
                e.preventDefault();
                let lead_id = $(this).data('lead');
                let rating = $(this).data('id');
                $.ajax({
                    type: 'Post',
                    enctype: 'multipart/form-data',
                    url: 'leads/' + lead_id + '/ratings',
                    dataType: "json",
                    data: {'lead_id':lead_id,'ratings':rating},
                    success: function (data) {
                        console.log(data);
                    },
                    error: function (e) {
                        console.log('error');
                    }
                });
                $(this).closest('.popup-content').addClass('hide');
            });
        },
    };

    $(function () {
        FRW.LeadRating.init();
    });
}(jQuery, FRW, window, document));
