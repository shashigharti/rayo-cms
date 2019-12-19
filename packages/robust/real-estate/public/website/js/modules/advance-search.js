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
        let searchFrm = document.querySelector('#search-container');

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
        // Set search params on value change
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
                    let [min_name, max_name] = [name + '_min', name + '_max'];
                    document.querySelector("#adv-search-dropdown [name='" + min_name + "']>option[value='" + min + "']").setAttribute('selected', true);
                    document.querySelector("#adv-search-dropdown [name='" + max_name + "']>option[value='" + max + "']").setAttribute('selected', true);
                    $("#adv-search-dropdown [name='" + min_name + "']").formSelect();
                    $("#adv-search-dropdown [name='" + max_name + "']").formSelect();
                    params[min_name] = min;
                    params[max_name] = max;
                });
            });


            // On form save
            // document.querySelector('#frm-search').addEventListener('submit', (e) => {
            //     e.preventDefault();
            //     const url = document.querySelector('#frm-search').getAttribute('action');
            //     let qParams = encodeQueryData(params);
            //     qParams = (qParams == '') ? '' : "?" + qParams;
            //     console.log(qParams);
            //     //window.location.replace(url + qParams);
            // });

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
