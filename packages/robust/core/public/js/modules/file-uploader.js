;
(function ($, FRW, window, document, undefined) {
    'use strict';
    FRW.FileUploader = {
        init: function () {
            $('.file-uploader .file-uploader__input').filer();

            $('.file-uploader__upload-btn').on('click', function () {
                let url = $(this).data("path"),
                    data = new FormData(),
                    dest = $(this).data('dest');

                $.each($('.file-uploader .file-uploader__input')[0].files, function (i, file) {
                    data.append('file-' + i, file);
                });
                $.ajax({
                    data: data,
                    url: url,
                    method: "POST",
                    cache: false,
                    contentType: false,
                    processData: false
                }).done(function (response) {
                    let medias = JSON.parse(response.data.medias);
                    $(dest).val(response.data.media_ids);
                    $('.file-uploader .file-uploader__input').val('');
                    $.each(medias, function (index, media) {
                        let template = `
                            <div id="${media.id}" class="file-uploader__file">
                                <img height="80" src="${media.url}"/>
                                <a href="#" class="file-uploader__delete-btn"> <i class="material-icons"> delete </i> </a>
                            </div>
                        `;
                        $('.file-uploader .file-uploader__preview').append(template);
                    });
                    FRW.FileUploader.updateField();
                });
            });

            $('.file-uploader__delete-btn').on('click', function () {
                $(this).parent().remove();
                FRW.FileUploader.updateField();
            });
            $('.file-uploader .file-uploader__input').prop('jFiler').reset();
        },
        updateField: function () {
            let ids = [],
                dest = $('.file-uploader__upload-btn').data('dest');

            $.each($('.file-uploader__file'), function (index, image) {
                ids.push($(image).data('id'));
            });

            if (ids.length > 0) {
                ids = ids.join();
            }

            $(dest).val(ids);
        }
    };

    $(document).ready(function ($) {

        let file_uploader = $('.file-uploader .file-uploader__input');
        if (file_uploader.length <= 0) {
            return;
        }

        FRW.FileUploader.init();
    });

}(jQuery, FRW, window, document));
