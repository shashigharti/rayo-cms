;
(function ($, FRW, window, document, undefined) {
    "use strict";
    FRW.FollowUp = {
        init: function(){
            $('.FollowUpFom').on('submit',function (e) {
                e.preventDefault();
                let lead_id = $(this).data('id');
                $.ajax({
                    type: 'POST',
                    enctype: 'multipart/form-data',
                    url: 'leads/' + lead_id + '/follow-up',
                    dataType: "json",
                    data: $('.FollowUpFom').serialize(),
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
        FRW.FollowUp.init();
    });
}(jQuery, FRW, window, document));
