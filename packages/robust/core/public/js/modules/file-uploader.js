
$(document).ready(function () {
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
                    <div class="file-uploader__file">
                        <img height="80" src="${media.url}"/>
                    </div>
                `;
                $('.file-uploader .file-uploader__preview').append(template);
            });
            $('.file-uploader .file-uploader__input').prop('jFiler').reset();
        });
    })
});
