;
(function ($, FRW, window, document, undefined) {
    "use strict"

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
                bedrooms: {},
                price: {},
                bathrooms: {}
            };
            const sliders = searchFrm.querySelectorAll('.jrange-slider');

            sliders.forEach(elem => {
                let [scale_min, scale_max] = [elem.getAttribute('data-scale-min'), elem.getAttribute('data-scale-max')];

                // temporarily using jquery $ object and jquery library
                $(elem).jRange({
                    from: elem.getAttribute('data-min'),
                    to: elem.getAttribute('data-max'),
                    step: 1,
                    scale: [scale_min, scale_max],
                    format: '$%s',
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
                        $("#adv-search-dropdown [name='price_min']>option[value='" + min + "']").prop('selected', true);
                        $("#adv-search-dropdown [name='price_max']>option[value='" + max + "']").prop('selected', true);
                        $("#adv-search-dropdown [name='price_min']").formSelect();
                        $("#adv-search-dropdown [name='price_max']").formSelect();
                    }

                    if (name == 'bedrooms') {
                        $("#adv-search-dropdown [name='beds_min']>option[value='" + min + "']").prop('selected', true);
                        $("#adv-search-dropdown [name='beds_max']>option[value='" + max + "']").prop('selected', true);
                        $("#adv-search-dropdown [name='beds_min']").formSelect();
                        $("#adv-search-dropdown [name='beds_max']").formSelect();
                    }

                    if (name == 'bathrooms') {
                        $("#adv-search-dropdown [name='bathrooms_min']>option[value='" + min + "']").prop('selected', true);
                        $("#adv-search-dropdown [name='bathrooms_max']>option[value='" + max + "']").prop('selected', true);
                        $("#adv-search-dropdown [name='bathrooms_min']").formSelect();
                        $("#adv-search-dropdown [name='bathrooms_max']").formSelect();
                    }



                    //document.querySelector('#adv-search-dropdown [name="beds_min"] option[value=" ' + min + ' "]').setAttribute('selected', true);
                    // document.querySelector('#adv-search-dropdown [name="beds_min"]').setAttribute('input', 2);
                    // console.log(document.querySelector('#adv-search-dropdown [name="beds_min"]'));

                    // document.querySelector("#adv-search-dropdown [name='beds_min']>option[value='" + min + "']").setAttribute('selected', true);
                    // $('#adv-search-dropdown [name="beds_min"]').formSelect();
                    // if ($(this).attr("name") == 'price') {
                    //     params["price"] = { 'price_min': min, 'price_max': max }
                    //     document.querySelector('#adv-search-dropdown [name="price_min"]').setAttribute('value', min);
                    //     document.querySelector('#adv-search-dropdown [name="price_max"]').setAttribute('value', max);
                    // }
                    // if ($(this).attr("name") == 'bedrooms') {
                    //     params["bedrooms"] = { 'beds_min': min, 'beds_max': max };
                    //     document.querySelector('#adv-search-dropdown [name="beds_min"]').setAttribute('value', min);
                    //     document.querySelector('#adv-search-dropdown [name="beds_max"]').setAttribute('value', max);
                    // }
                    // if ($(this).attr("name") == 'bathrooms') {
                    //     params["bathrooms"] = { 'bathrooms_min': min, 'bathrooms_max': max };
                    //     document.querySelector('#adv-search-dropdown [name="bathrooms_min"]').setAttribute('value', min);
                    //     document.querySelector('#adv-search-dropdown [name="bathrooms_max"]').setAttribute('value', max);
                    // }
                });
            });



        }

    });
}(jQuery, FRW, window, document));
