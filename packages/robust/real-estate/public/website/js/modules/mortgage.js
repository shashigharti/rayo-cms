;
(function ($, FRW, window, document, undefined) {
    'use strict';
    FRW.Mortgage = {
        init:function () {
            $(document).on('submit','#homenote',FRW.Mortgage.calculate);
            $(document).on('change','input[name="dptype"]',FRW.Mortgage.changePaymentType);
            $(document).on('change','input[name="period"]',FRW.Mortgage.changeTerm);
        },
        changePaymentType: function (e){
            const total = $('#purchasePrice').val();
            const dp = $('#downPayment');
            const amount = dp.val();
            const value = e.target.value === 'percentage' ? (amount / total) * 100 : total * amount /100;
            dp.val(value);
        },
        changeTerm : function (e){
            const term = $('#term');
            const value = e.target.value === 'monthly' ? term.val() * 12 : term.val() / 12;
            term.val(value);
        },
        calculate: function (e) {
            e.preventDefault();
            const container = $('#m-calculator');
            const total = $('#purchasePrice').val();
            const amount = $('#downPayment').val();
            const type = container.find('input[name="dptype"]:checked').val();
            const period = container.find('input[name="period"]:checked').val();
            const term = $('#term').val();
            const P = type === 'percentage' ? total - (total * (amount/100)) : total - amount;
            const i = (parseInt($('#rate').val()) / 100) / 12;
            const n = period === 'monthly' ? term : term * 12;
            const x = Math.pow((1 + i ), n);
            let result = ( P * ((i * x) / (x - 1)) ).toFixed(2);
            result = period === 'monthly' ? result : result * 12;
            container.find('#results').html(`Your ${period} payment: $${result}`).removeClass('hide');
        }
    }
    $(document).ready(function ($) {
        if ($('#m-calculator').length > 0){
            FRW.Mortgage.init()
        }
    });
}(jQuery, FRW, window, document));
