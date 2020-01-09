
$(document).ready(function () {
    $('.file-uploader .file-uploader__input').filer();

    $('.file-uploader__upload-btn').on('click', function () {
        //console.log($(this).data("path"));
        let url = $(this).data("path"),
            data = new FormData(),
            dest = $(this).data('dest');
            
        $.each($('.file-uploader .file-uploader__input')[0].files, function (i, file) {
            data.append('file-' + i, file);
        });
        // Get data from the server based on query params
        $.ajax({
            data: data,
            url: url,
            method: "POST",
            cache: false,
            contentType: false,
            processData: false            
        }).done(function (response) {
            $('.' + dest).val(response.media_ids);
        });
    })
});