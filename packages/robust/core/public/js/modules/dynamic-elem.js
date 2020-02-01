;
(function ($, FRW, window, document, undefined) {
    'use strict';
    FRW.DynamicElem = {
        init: function () {
            $(document.body).on('click', '.dynamic-elem__add', function () {
                let container = $(this).parent().parent(), parent = container.parent(),
                    count = container.data('count') + 1,
                    newElem = ``;


                newElem = `
                <div class="row dynamic-elem" data-count="${count}">
                    <div class="input-field col s4">
                        <label for="properties[prices][${count}][min]" class="active">Min</label>
                        <input name="properties[prices][${count}][min]" type="text" value="2000000" id="properties[prices][${count}][min]">
                    </div>
                    <div class="input-field col s4">
                        <label for="properties[prices][${count}][max]" class="">Max</label>
                        <input name="properties[prices][${count}][max]" type="text" value="" id="properties[prices][${count}][max]">
                    </div>
                    <div class="input-field col s4">
                        <input name="properties[prices][${count}][count]" type="hidden" value="0">
                    </div>
                    <a href="javascript:void(0)">
                        <i class="material-icons dynamic-elem__btn dynamic-elem__delete  ">
                            delete
                        </i>
                    </a>
                    <a href="javascript:void(0)">
                        <i class="material-icons dynamic-elem__btn dynamic-elem__add ">
                            add
                        </i>
                    </a>
                </div>
                `;
                $(newElem).appendTo(parent);
                container.find('.dynamic-elem__add').toggleClass('hide');
            });
            $(document.body).on('click', '.dynamic-elem__delete', function () {
                let prev_elem = $(this).parent().parent().prev(),
                    next_elem = $(this).parent().parent().next(),
                    hasNext = false;


                $(this).parent().parent().remove();
                if(next_elem){
                    hasNext = next_elem.hasClass( "row dynamic-elem" );
                    console.log(next_elem.hasClass( "row dynamic-elem" ));
                }
                if(!hasNext){
                    prev_elem.find('.dynamic-elem__add').toggleClass('hide');
                }

            });
        }
    };

    $(document).ready(function ($) {
        let selectObj = $('.dynamic-elem');
        if (selectObj.length <= 0) {
            return;
        }
        console.log("Dynamic Element");

        FRW.DynamicElem.init();
    });

}(jQuery, FRW, window, document));
