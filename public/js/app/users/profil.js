$(document).ready(function () {
    if($('.error').length){
        var $parent = $('.error').parent().parent().parent().parent().attr('id');
        $('#'+$parent+' .data').addClass('hidden');
        $('#'+$parent+' form').removeClass('hidden');
    }
    $('body').on('click','a[data-action="update"]',function () {
        var form = $(this).attr('data-target');
        var collapse = $(this).attr('data-collapse');
        $(collapse).toggleClass('hidden');
        $(form).toggleClass('hidden');
    })
});