;
(function ($, FRW, window, document, undefined) {
    'use strict';
    FRW.Select = {
        init: function () {
            const elements = $('.multi-select');
            if (elements.length > 0) {
                elements.each((index, elem) => {
                    const URL = $(elem).data('url');
                    let selectedElements = [];

                    if ($(elem).data('selected')) {
                        selectedElements = $(elem).data('selected').toString().split(",");
                    }
                    $.get(URL).then(response => {
                        const options = response.data;

                        if (options) {
                            options.forEach(option => {
                                let inArray = -1;
                                let child = '';
                                let selected = '';
                                if (selectedElements.length > 0) {
                                    inArray = selectedElements.findIndex(selectedElem => (selectedElem == option.name) || (selectedElem == option.slug));
                                }

                                if (inArray >= 0) {
                                    selected = 'selected';
                                }

                                child = `<option value="${option.slug || option.name}" ${selected} >${option.name}</option>`;
                                $(elem).append(child);
                            });
                        }

                    });
                });
            }
        }
    };

    $(document).ready(function ($) {
        $(".multi-select").select2();
        FRW.Select.init();
    });

}(jQuery, FRW, window, document));
