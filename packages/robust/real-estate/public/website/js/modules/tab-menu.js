;
(function ($, FRW, window, document, undefined) {
    "use strict"
    $(function () {
        let locations = document.querySelectorAll('.tab-filter li');
        let status_filter = document.querySelectorAll("input[name='status_filter']");
        status_filter.forEach(elem => {
            elem.addEventListener('click', function (e) {
                locations.forEach((elem) => {
                    let count = elem.getAttribute(`data-${this.value}`);
                    elem.querySelector(".tab__location-count").innerHTML = `(${count})`;
                });
            });
        });
    });
}(jQuery, FRW, window, document));
