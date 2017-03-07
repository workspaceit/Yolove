@extends('user/layout/default_layout')
@section('content')
@include('user/activity/notification_header')
<input type="hidden" id="progress" value="0">

<script>
    var scrollStart = 200;
    $(document).ready(function () {
//        generate('notification', 'center', '<img src="{{ URL::asset("assets/images/LoadingWait.gif")}}">');
        $.ajax({
            url: "<?php echo URL::to('/'); ?>" + "/getNotifications/likes",
            type: "post",
            data: {
            },
            success: function (result) {
                $('.notis').css('display', 'none');
                $('.notis_comments').css('display', 'none');
                $('.notis').css('display', 'none');
                $('.notis_likes').css('display', 'block');
                $('.notis_likes').html(result);
            }
        });
    });

    $(window).scroll(function () {
        var inProgress = $('#progress').val();
        var lastid = $('.lastid').last().val();
        var iCurScrollPos = $(this).scrollTop();
        if (inProgress != '1') {
            if ($('.notis_likes').is(':visible')) {
                //if ($(document).height() == $(window).scrollTop() + $(window).height()) {
                if ($(window).scrollTop() >= scrollStart) {
                    if (iCurScrollPos > 0) {
                        scrollStart = scrollStart + 200;
                        $('#progress').val('1');
//                        generate('information', 'bottomCenter', 'Loading.....');
                        $.ajax({
                            url: "<?php echo URL::to('/'); ?>" + "/getNotifications/likes",
                            type: "Post",
                            data: {
                                last_id: lastid
                            },
                            success: function (result) {

                                $("#processing").trigger("click");
                                if (result != null && result != "") {
                                    $('#progress').val('0');
                                    $('.notis_likes').append(result);
                                } else {

                                    $(window).scroll(function () {
                                        if ($(document).height() == $(window).scrollTop() + $(window).height()) {
                                            if ($('#endProcessing').size() == 0) {
//                                                generateTimeOut('information', 'bottomCenter', 'No more product found', 3000);
                                            }
                                        }
                                    });
                                }
                            }
                        });
                    }
                }
            }
        }
    });
</script>

@stop