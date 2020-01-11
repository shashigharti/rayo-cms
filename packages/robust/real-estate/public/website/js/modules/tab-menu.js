;
(function ($, FRW, window, document, undefined) {
    "use strict"
    $(function () {
        let locations = document.querySelectorAll('.tab-filter li');
        let status_filter = document.querySelectorAll("input[name='status_filter']");
        status_filter.forEach(elem => {
            elem.addEventListener('click', function (e) {
                locations.forEach((elem) => {
                    let [count, url, string_to_replace] = [
                        elem.getAttribute(`data-${this.value}`),
                        '',
                        elem.getAttribute(`data-${this.value}-url`)
                    ];
                    let string_to_search = elem.getAttribute(`data-active-url`);

                    if(this.value === 'active'){
                        string_to_search = elem.getAttribute(`data-sold-url`);
                    }
                    url = elem.querySelector("a").getAttribute("href");
                    url = url.replace(new RegExp(string_to_search), `${string_to_replace}`);
                    elem.querySelector("a").setAttribute("href", url);
                    elem.querySelector(".tab__location-count").innerHTML = `(${count})`;
                });
            });
        });
    });
}(jQuery, FRW, window, document));
