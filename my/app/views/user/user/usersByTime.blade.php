@extends('user/layout/default_layout')
@section('content')
@include('user/layout/sorting_layout')

<script type="text/javascript">
    var scrollStart = 200;
    $(document).ready(function () {
//        generate('notification', 'center', '<img src="{{ URL::asset("assets/images/LoadingWait.gif")}}">');
        $.ajax({
            url: "<?php echo URL::to('/'); ?>" + "/getAllUsers",
            type: "GET",
            data: {
                limit: 20
            },
            success: function (result) {
                $("#processing").trigger("click");
                $('#users').html(result);
            }
        });

    });


    $(window).scroll(function () {
        var lastUser = $('.lastUser').last().val();
        var iCurScrollPos = $(this).scrollTop();
        //if ($(document).height() == $(window).scrollTop() + $(window).height()) {
        if ($(window).scrollTop() >= scrollStart) {
            if (iCurScrollPos > 0) {
                scrollStart = scrollStart + 200;
//                generate('information', 'bottomCenter', " Loading......");
                $.ajax({
                    url: "<?php echo URL::to('/'); ?>" + "/getAllUsers",
                    type: "GET",
                    data: {
                        limit: 20,
                        lastUser: lastUser
                    },
                    success: function (result) {
                        $("#processing").trigger("click");
                        if (result != null && result != "") {
                            $('#users').append(result);
                        } else {
//                            generateTimeOut('information', 'bottomCenter', 'No more product found', 3000);
                        }
                    }
                });
            }
        }
    });
</script>
@stop