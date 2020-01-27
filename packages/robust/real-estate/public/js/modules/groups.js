;
(function ($, FRW, window, document, undefined) {
    "use strict";
    FRW.LeadGroup = {
        init: function(elem){
            elem.on('change',function (e) {
                e.preventDefault();
                const selected = $(this).val();
                const url = $(this).data('url');
                $.post(url,{id:selected}).then(response => {
                    const container = $('.lead--chips_container');
                    container.empty();
                    response.map(chip => {
                        const template = ` <div class="chip blue">
                                            ${chip.name}
                                            <i class="close material-icons lead--chips_delete" data-id="${chip.id}">close</i>
                                        </div>`;
                        container.append(template);
                    })
                    M.toast({'html':'Update successfully'});
                });
                $(this).prop('selectedIndex',0);
                $(this).formSelect();
            });
        },
        delete: function (assign) {
            $(document).on('click','.lead--chips_delete',function () {
                const id = $(this).data('id');
                const url = assign.data('delete-url') + '/' + id;
                $.get(url).then(response => {
                    M.toast({'html':response})
                });
            });
        }
    };

    $(function () {
        const assign = $('.lead--group_assign');
        if(assign.length === 0){
            return;
        }
        FRW.LeadGroup.init(assign);
        FRW.LeadGroup.delete(assign);
    });
}(jQuery, FRW, window, document));
