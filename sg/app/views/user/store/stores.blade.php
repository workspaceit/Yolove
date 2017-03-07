@extends('user/layout/default_layout')
@section('content')
<section class="best-sellers" style="min-height: 222px;">
    <div class="row">
        <div class="container">
            <center><h3 class="collection-title">Top Stores of yolove.it</h3></center>
            <br />
            <div class="row self-row" id="stores">

            </div>


        </div>
    </div>
</section>
<input type="hidden" id="progress" value="0">
<script>
    var scrollStart = 200;
    var offsetCount = 0;
    $(function () {
//        generate('notification', 'center', '<img src="{{ URL::asset("assets/images/LoadingWait.gif")}}">');
        $.ajax({
            url: "<?php echo URL::to('/'); ?>" + "/getStores",
            type: "GET",
            data: {
                limit: 20
            },
            success: function (result) {
                offsetCount++;
                $("#processing").trigger("click");
                $('#stores').html(result);
            }
        });
    });
    $(window).scroll(function () {
        var inProgress = $('#progress').val();
        var iCurScrollPos = $(this).scrollTop();
        var lastStore = $('.lastStore').last().val();
        if (inProgress != '1') {
            if ($(window).scrollTop() >= scrollStart) {
                if (iCurScrollPos > 0) {
                    scrollStart = scrollStart + 200;
                    $('#progress').val('1');
//                    generate('information', 'bottomCenter', " Loading......");
                    takeoffset = offsetCount * 20;
                    $.ajax({
                        url: "<?php echo URL::to('/'); ?>" + "/getStores",
                        type: "GET",
                        data: {
                            limit: 20,
                            lastStore: lastStore,
                            offset: takeoffset
                        },
                        success: function (result) {

                            $("#processing").trigger("click");
                            if (result != null && result != "") {
                                $('#progress').val('0');
                                offsetCount++;
                                $('#stores').append(result);
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