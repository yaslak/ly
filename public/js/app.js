$(document).ready(function () {

    var $body = $('body');
    var $auto_danger = $('#auto-notify-danger');
    var $auto_success = $('#auto-notify-success');
    function notify_success($title, $content) {
        new PNotify({
            title: $title,
            text: $content,
            addclass: 'bg-success'
        });
    }
    function notify_danger($title, $content) {
        new PNotify({
            title: $title,
            text: $content,
            addclass: 'bg-danger'
        });
    }
    if($auto_success.length){
        notify_success($auto_success.attr('data-title'),$auto_success.attr('data-content'))
        $auto_success.remove();
    }
    if($auto_danger.length){
        notify_danger($auto_danger.attr('data-title'),$auto_danger.attr('data-content'))
    }

    $body.on('click','#lang-switcher a',function () {
        var locale = $(this).attr('data-lang');
        var _token = $("form#language>input[name=_token]").val();
        $.ajax({
            url: "/language",
            type: 'POST',
            data:{locale:locale,_token:_token},
            datatype: 'json',
            success: function (data) {
            },
            error:function (data) {
            },
            beforeSend:function (data) {

            },
            complete:function (data) {
                window.location.reload(true);
            }
        })
    });

    $body.on('click','a#notification_sync',function(){
        var $badge = $('#notification-badge')
        if($badge.lenght){
            $badge.html('<i class="fas fa-sync fa-spin"></i>')
        }
        else{
            $('#notification_drop').append('<span class="badge bg-warning-400" id="notification-badge"><i class="fas fa-sync fa-spin"></i></span>')
        }


        var _token = $("form#notification_form>input[name=_token]").val();
        var _method = $("form#notification_form>input[name=_method]").val();
        $.ajax({
            url: $('form#notification_form').attr('action'),
            type: 'POST',
            data:{_token:_token,_method:_method},
            datatype: 'json',
            success: function (data) {
                console.log(data)
                $('#notification-data').html(data)
            },
            error:function (data) {
            },
            beforeSend:function (data) {

            },
            complete:function (data) {
            }
        })
    });

    $body.on('click','a.notification_read',function (e) {
        e.preventDefault();
        var $url = $(this).attr('href');
        var _token = $("form#notification_read_form>input[name=_token]").val();
        var id = $(this).attr('data-target')
        $.ajax({
            url: '/notifications',
            type: 'POST',
            data:{id:id,_token:_token},
            datatype: 'json',
            success: function (data) {
                console.log(data)
                $('#notification-data').html(data)
            },
            error:function (data) {
                console.log(data)
                alert('error')
            },
            beforeSend:function (data) {

            },
            complete:function (data) {
                window.location = $url;
            }
        })
    })

    $body.on('click','#info-edit',function () {
        $('#profil-edit-form').toggleClass('hidden');
        $('#profil-info').toggleClass('hidden');
    })

});