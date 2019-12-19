;
(function ($, FRW, window, document, undefined) {
    "use strict"

    function submit() {
        let url = $('#frm-search').attr('action');
        let qParams = $('#frm-search').serialize();
        qParams = (qParams == '') ? '' : '?' + qParams;
        window.location.replace(url + qParams);
    }

    $(function () {
        let advSearchElem = $('.advance-search');
        let searchSection = $('#search-section');

        // Check if it has advance search
        if (advSearchElem.length > 0) {
            let inputElements = [];
            advSearchElem.click(function (e) {
                e.preventDefault();
                $('#adv-search-dropdown').toggleClass('show');
            });

            inputElements = $('[data-selected]:not(.multi-select)');
            $.each(inputElements, (index, elem) => {
                // Set the selected value for all those elements who are not of class multi-select
                elem.value = $(elem).attr('data-selected');
            });
        }

        // Check if it has search form 
        // Set search params on value change
        if (searchSection.length > 0) {
            let params = {};
            $('.search-section__select').on('change', function () {
                $('#frm-search').find('[name="sort_by"]').val($(this).val());
            });

            const sliders = searchSection.find('.jrange-slider');
            $.each(sliders, (index, elem) => {
                let [scale_min, scale_max, format] = [
                    $(elem).attr('data-scale-min'),
                    $(elem).attr('data-scale-max'),
                    $(elem).attr('data-format') || "%s"
                ];

                // temporarily using jquery $ object and jquery library
                $(elem).jRange({
                    from: $(elem).attr('data-min'),
                    to: $(elem).attr('data-max'),
                    step: $(elem).attr('data-step') || 1,
                    scale: [scale_min, scale_max],
                    format,
                    width: 150,
                    isRange: true,
                });

                $(elem).on('change', function () {
                    let [min, max, name] = [
                        $(this).val().split(",")[0],
                        $(this).val().split(",")[1],
                        $(this).attr("name")
                    ];
                    let [min_name, max_name] = [name + '_min', name + '_max'];
                    $("#adv-search-dropdown [name='" + min_name + "']>option[value='" + min + "']").attr('selected', true);
                    $("#adv-search-dropdown [name='" + max_name + "']>option[value='" + max + "']").attr('selected', true);
                    $("#adv-search-dropdown [name='" + min_name + "']").formSelect();
                    $("#adv-search-dropdown [name='" + max_name + "']").formSelect();

                    if (!params[min_name]) {
                        params[max_name] = 0;
                    }
                    if (!params[max_name]) {
                        params[max_name] = 0;
                    }
                    params[min_name] = min;
                    params[max_name] = max;
                });
            });


            // On search button click
            $('#frm-search').on('submit', (e) => {
                e.preventDefault();
                submit();
                console.log(params)
            });
            // On search button click
            $('#search-btn').on('click', (e) => {
                e.preventDefault();
                submit();
            });

            // Set params value on advance search fields value change
            $('.ad-search-field').on('change', function (e) {
                let prop = $(this).attr('name');
                prop = prop.replace(/[\[\]']+/g, '');
                if (!params[prop]) {
                    params[prop] = 0;
                }
                params[prop] = $(this).val();
            });
        }

    });
}(jQuery, FRW, window, document));
