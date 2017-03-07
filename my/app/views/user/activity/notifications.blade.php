@extends('user/layout/default_layout')
@section('content')
@include('user/activity/notification_header')
<input type="hidden" id="progress" value="0">

<script>
    var scrollStart = 200;
    $(document).ready(function () {
//        generate('notification', 'center', '<img src="{{ URL::asset("assets/images/LoadingWait.gif")}}">');
        $.ajax({
            url: "<?php echo URL::to('/'); ?>" + "/getAllNotifications",
            type: "post",
            data: {
            },
            success: function (result) {
                $('.notis_comments').css('display', 'none');
                $('.notis_likes').css('display', 'block');
                $('.notis').css('display', 'block');
                $('.notis').html(result);
//                $(".notiItem").click(function () {
//                    var read = $(this).attr("read");
//                    var id = $(this).attr("id");
//                    var slugTitle = $(this).attr("slugTitle");
//                    var activity = $(this).attr("activity");
//                    if (read == true) {
//                        window.location = "{{URL::to('/')}}/item/" + id + "/title" + slugTitle;
//                    }
//                    else {
//                        $.ajax({
//                            url: "<?php echo URL::to('/'); ?>" + "/readNotifictaion",
//                            type: "POST",
//                            data: {
//                                activity: activity
//                            },
//                            success: function (result) {
//                                window.location = "{{URL::to('/')}}/item/" + id + "/title" + slugTitle;
//                            }
//                        });
//                    }
//                });
//                $(".notiAlbum").click(function () {
//                    var activity = $(this).attr("activity");
//                    var id = $(this).attr("id");
//                    var read = $(this).attr("read");
//                    if (read == true) {
//                        window.location = "{{URL::to('/')}}/collection/" + id;
//                    }
//                    else {
//                        $.ajax({
//                            url: "<?php echo URL::to('/'); ?>" + "/readNotifictaion",
//                            type: "POST",
//                            data: {
//                                activity: activity
//                            },
//                            success: function (result) {
//                                window.location = "{{URL::to('/')}}/collection/" + id;
//                            }
//                        });
//                    }
//                });
            }
        });
    });

    $(window).scroll(function () {
        var inProgress = $('#progress').val();
        var lastid = $('.lastid').last().val();
        var iCurScrollPos = $(this).scrollTop();
        if (inProgress != '1') {
            if ($('.notis').is(':visible')) {
                //if ($(document).height() == $(window).scrollTop() + $(window).height()) {
                if ($(window).scrollTop() >= scrollStart) {
                    if (iCurScrollPos > 0) {
                        scrollStart = scrollStart + 200;
                        $('#progress').val('1');
//                        generate('information', 'bottomCenter', 'Loading.....');
                        $.ajax({
                            url: "<?php echo URL::to('/'); ?>" + "/getAllNotifications",
                            type: "Post",
                            data: {
                                last_id: lastid
                            },
                            success: function (result) {

                                $("#processing").trigger("click");
                                if (result != null && result != "") {
                                    $('#progress').val('0');
                                    $('.notis').append(result);
//                            $(".notiItem").click(function () {
//
//                                var id = $(this).attr("id");
//                                var slugTitle = $(this).attr("slugTitle");
//                                var activity = $(this).attr("activity");
//                                $.ajax({
//                                    url: "<?php echo URL::to('/'); ?>" + "/readNotifictaion",
//                                    type: "POST",
//                                    data: {
//                                        activity: activity
//                                    },
//                                    success: function (result) {
//                                        window.location = "{{URL::to('/')}}/item/" + id + "/title" + slugTitle;
//
//                                    }
//                                });
//
//                            });
//                            $(".notiAlbum").click(function () {
//                                var activity = $(this).attr("activity");
//                                var id = $(this).attr("id");
//                                $.ajax({
//                                    url: "<?php echo URL::to('/'); ?>" + "/readNotifictaion",
//                                    type: "POST",
//                                    data: {
//                                        activity: activity
//                                    },
//                                    success: function (result) {
//                                        window.location = "{{URL::to('/')}}/collection/" + id
//                                    }
//                                });
//                            });
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