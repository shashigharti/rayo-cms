;
(function ($, FRW, window, document, undefined) {
    'use strict';
    FRW.DataMap = {
        init: function () {
            $(document).on('change','.data-map_resource',FRW.DataMap.getClasses);
            $(document).on('change','.data-map_class',FRW.DataMap.fields);
            $(document).on('change','.data_remap_key',FRW.DataMap.fields);
            $(document).on('click','.remove-field',FRW.DataMap.removeField);
            $('.data-map_resource').trigger('change');
        },
        getClasses: function(){
            const resource = $('.data-map_resource option:selected').val();
            const user = $('.data-map_resource').data('user');
            const data = {resource:resource,user:user};
            let url = $('.class-container').data('url');
            const container = $('.class-container');
            container.empty();
            $.post(url,data).done((res)=>{
                container.append(res.view);
                FRW.DataMap.fields();
            });
        },
        fields : function () {
            const resource = $('.data-map_resource option:selected').val();
            const _class = $('.data-map_class option:selected').val();
            const user = $('.data-map_resource').data('user');
            const key = $('.data_remap_key option:selected').val();
            const data = {resource:resource,user:user,class:_class,key:key};
            let url = $('.field-container').data('url');

            const container = $('.field-container');
            container.empty();
            $.post(url,data).done((res)=>{
                container.append(res.view);
            });
        },
        removeField : function (event) {
            event.preventDefault();
            let container = $(this).parent();
            container.remove();
        }
    }
    $(document).ready(function () {
        $(document).ajaxStart(function () {
            $('#loading-image').removeClass('hidden');
        });
        $(document).ajaxStop(function () {
            $('#loading-image').addClass('hidden');
        });
        if($('.field-container')) {
            FRW.DataMap.init();
        }
    });

}(jQuery, FRW, window, document));

