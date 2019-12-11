;
(function ($, FRW, window, document, undefined) {
    "use strict"
    FRW.Select = {
        init: function () {
            const locations = $('.advance-search_location');
            if (locations.length > 0) {
                locations.each(function () {
                    const location = $(this);
                    const URL = location.data('url');
                    let selectedElements = [];

                    if (location.data('selected')) {
                        selectedElements = location.data('selected').split(",");
                    }
                    $.get(URL).then(response => {
                        const options = response.data;

                        options.map(function (option) {
                            let inArray = -1;
                            let child = '';
                            let selected = '';
                            if (selectedElements.length > 0) {
                                inArray = selectedElements.findIndex(selectedElem => selectedElem == option.id);
                            }

                            if (inArray >= 0) {
                                selected = 'selected';
                            }

                            child = `<option value="${option.id}" ${selected} >${option.name}</option>`;
                            location.append(child);
                        });

                    });
                });
            }
        }
    };

    $(function () {
        FRW.Select.init();
    });
}(jQuery, FRW, window, document));
