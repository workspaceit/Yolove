@extends('user/layout/default_layout')
@section('content')
@include('user/layout/sorting_layout')
<input type="hidden" id="progress" value="0">
<script type="text/javascript">
    var scrollStart = 200;
    var offsetCount = 0;
    $(document).ready(function () {
        //generate('notification', 'center', '<img src="{{ URL::asset("assets/images/LoadingWait.gif")}}">');
        var sort = $('#sort').val();
        $.ajax({
            url: "<?php echo URL::to('/'); ?>" + "/getAllUsers",
            type: "GET",
            data: {
                limit: 20,
                sort: sort
            },
            success: function (result) {
                offsetCount++;
                $("#processing").trigger("click");
                $('#tiles').html(result);

            }
        });

    });


    $(window).scroll(function () {
        var inProgress = $('#progress').val();
        var lastUser = $('.lastUser').last().val();
        var sort = $('#sort').val();
        var iCurScrollPos = $(this).scrollTop();
        if (inProgress != '1') {
            if ($(window).scrollTop() >= scrollStart) {
                if (iCurScrollPos > 0) {
                    scrollStart = scrollStart + 200;
                    $('#progress').val('1');
//                    generate('information', 'bottomCenter', " Loading......");
                    takeoffset = offsetCount * 20;
                    $.ajax({
                        url: "<?php echo URL::to('/'); ?>" + "/getAllUsers",
                        type: "GET",
                        data: {
                            limit: 20,
                            lastUser: lastUser,
                            sort: sort,
                            offset: takeoffset
                        },
                        success: function (result) {

                            $("#processing").trigger("click");
                            if (result != null && result != "") {
                                $('#progress').val('0');
                                offsetCount++;
                                $('#tiles').append(result);
                            } else {
//                                generateTimeOut('information', 'bottomCenter', 'No more product found', 3000);
                            }        
                        }
                    });
                }
            }
        }
    });
</script>
@stop