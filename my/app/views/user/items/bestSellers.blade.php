@extends('user/layout/default_layout')
@section('content')
<section class="best-sellers" style="min-height: 500px;">
    <div class="row">
        <div class="container">
            <center><h1 class="page-title">Best Sellers</h1></center>
            <div id="bestSellers" class="row self-row">

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
            url: "<?php echo URL::to('/'); ?>" + "/getBestSellers",
            type: "GET",
            data: {
                limit: 20
            },
            success: function (result) {
                $("#processing").trigger("click");
                offsetCount++;
                $('#bestSellers').html(result);
            }
        });
        $(window).scroll(function () {
            var inProgress = $('#progress').val();
            var iCurScrollPos = $(this).scrollTop();
            if (inProgress != '1') {              
                if ($(window).scrollTop() >= scrollStart) {
                    if (iCurScrollPos > 0) {
//                        generate('information', 'bottomCenter', " Loading......");
                        scrollStart = scrollStart + 200;
                        $('#progress').val('1');
                        takeoffset = offsetCount * 20;
                        $.ajax({
                            url: "<?php echo URL::to('/'); ?>" + "/getBestSellers",
                            type: "GET",
                            data: {
                                limit: 20,
                                offset: takeoffset
                            },
                            success: function (result) {
                                $("#processing").trigger("click");
                                if (result != null && result != "") {
                                    $('#progress').val('0');
                                    offsetCount++;
                                    $('#bestSellers').append(result);
                                } else {
//                                    generateTimeOut('information', 'bottomCenter', 'No more product found', 3000);
                                }
                            }
                        });

                    }
                }
            }

        });

    });
</script>
@stop