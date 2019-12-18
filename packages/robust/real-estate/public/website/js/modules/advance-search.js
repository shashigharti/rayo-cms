;
(function ($, FRW, window, document, undefined) {
    "use strict"

    function encodeQueryData(data) {
        const ret = [];
        for (let d in data) {
            if (data[d] > 0) {
                ret.push(encodeURIComponent(d) + '=' + encodeURIComponent(data[d]));
            }
        }
        return ret.join('&');
    }

    $(function () {
        let advSearchElem = $('.advance-search');
        let searchFrm = document.querySelector('#frm-search');

        // Check if it has advance search
        if (advSearchElem.length > 0) {
            let inputElements = [];
            advSearchElem.click(function (e) {
                e.preventDefault();
                $('#adv-search-dropdown').toggleClass('show');
            });

            inputElements = document.querySelectorAll('[data-selected]:not(.multi-select)');
            inputElements.forEach(elem => {
                // Set the selected value for all those elements who are not of class multi-select
                elem.value = elem.getAttribute('data-selected');
            });
        }

        // Check if it has search form
        if (searchFrm.length > 0) {
            let params = {
                price_min: 0,
                price_max: 0,
                beds_min: 0,
                beds_max: 0,
                bathrooms_min: 0,
                bathrooms_max: 0

            };
            const sliders = searchFrm.querySelectorAll('.jrange-slider');

            sliders.forEach(elem => {
                let [scale_min, scale_max, format] = [
                    elem.getAttribute('data-scale-min'),
                    elem.getAttribute('data-scale-max'),
                    elem.getAttribute('data-format') || "%s"
                ];

                // temporarily using jquery $ object and jquery library
                $(elem).jRange({
                    from: elem.getAttribute('data-min'),
                    to: elem.getAttribute('data-max'),
                    step: elem.getAttribute('data-step') || 1,
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

                    if (name == 'price') {
                        document.querySelector("#adv-search-dropdown [name='price_min']>option[value='" + min + "']").setAttribute('selected', true);
                        document.querySelector("#adv-search-dropdown [name='price_max']>option[value='" + max + "']").setAttribute('selected', true);
                        $("#adv-search-dropdown [name='price_min']").formSelect();
                        $("#adv-search-dropdown [name='price_max']").formSelect();
                        params["price_min"] = min;
                        params["price_max"] = max;
                    }

                    if (name == 'bedrooms') {
                        document.querySelector("#adv-search-dropdown [name='beds_min']>option[value='" + min + "']").setAttribute('selected', true);
                        document.querySelector("#adv-search-dropdown [name='beds_max']>option[value='" + max + "']").setAttribute('selected', true);
                        $("#adv-search-dropdown [name='beds_min']").formSelect();
                        $("#adv-search-dropdown [name='beds_max']").formSelect();
                        params["beds_min"] = min;
                        params["beds_max"] = max;
                    }

                    if (name == 'bathrooms') {
                        document.querySelector("#adv-search-dropdown [name='bathrooms_min']>option[value='" + min + "']").setAttribute('selected', true);
                        document.querySelector("#adv-search-dropdown [name='bathrooms_max']>option[value='" + max + "']").setAttribute('selected', true);
                        $("#adv-search-dropdown [name='bathrooms_min']").formSelect();
                        $("#adv-search-dropdown [name='bathrooms_max']").formSelect();
                        params["bathrooms_min"] = min;
                        params["bathrooms_max"] = max;
                    }
                });
            });


            // On form save
            document.querySelector('#frm-search').addEventListener('submit', (e) => {
                e.preventDefault();
                console.log(encodeQueryData(params));

            });
        }

    });
}(jQuery, FRW, window, document));
