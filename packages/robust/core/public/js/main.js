import jquery from 'jquery';
//import("../../../../../node_modules/summernote/dist/summernote.js");

window.$ = window.jQuery = jquery;
window.FRW = {};

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
