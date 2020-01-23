;
(function ($, FRW, window, document, undefined) {
    "use strict";
    FRW.LeadModal = {
        init: function(elem){
            elem.on('click',function (e) {
                e.preventDefault();
                let data = new FormData();
                data.append('action',$(this).data('action'));
                data.append('mode',$(this).data('mode'));
                data.append('view',$(this).data('view'));
                data.append('lead',$(this).data('lead'));
                data.append('type',$(this).data('type'));
                data.append('value',$(this).data('value'));
                data.append('relation_id',$(this).data('relation-id'));
                const url = $(this).data('url');
                const id = $(this).data('view')  + '-' + $(this).data('type');
                $.ajax(url,{
                    processData:false,
                    contentType:false,
                    data:data,
                    method:'POST'
                }).then(response => {
                    $("#main").append(response);
                    M.AutoInit();
                    M.updateTextFields();
                    const modal =document.getElementById(id);
                    const instance = M.Modal.init(modal,{onCloseEnd: function () {
                            modal.remove();
                        }});
                    instance.open();
                })
            })
        },
    };

    $(function () {
        if($(".lead-modal_trigger").length === 0){
            return;
        }
        FRW.LeadModal.init($('.lead-modal_trigger'));
    });
}(jQuery, FRW, window, document));
