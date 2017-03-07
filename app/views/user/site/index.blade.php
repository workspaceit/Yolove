@extends('user/layout/default_layout')
@section('content')
@if($response['status']['islogin'])
@include('user/layout/find_and_filter')
@endif
<div class="" style="min-height: 500px;">
<!-- Best Sellers Section Start-->
<section class="best-sellers">
    <div class="row">
        <div class="container">
            <center><h1 class="page-title">Best Sellers</h1></center>
            <div id="bestSellers" class="row self-row">

            </div>
        </div>
    </div>
</section>
<!-- Best Sellers Section Closed-->

<!-- Interesting Mix-up Section Start-->
<section class="interesting-mixup">
    <div class="row">
        <div class="container">
            <center><h1 class="page-title">Interesting Mixup Section</h1></center>
            <div id="mixProducts" class="row self-row">

            </div>
        </div>
    </div>
</section>
<!-- Interesting Mix-up Section Closed-->

<!-- Whole New Section Start-->
<section class="whole-new">
    <div class="row">
        <div class="container">
            <center><h1 class="page-title">Whole New Section</h1></center>
            <div id="tiles" class="row self-row">

            </div>
        </div>
    </div>
</section>
<!-- Whole New Section Closed-->
</div>
<input type="hidden" id="progress" value="0">
<script type="text/javascript">
    var scrolltime = 700;
    var scrollStatus = true;
    var offsetCount = 0;
    var scrollStart = 200;
    $body = $('body');
    $(document).ready(function (e) {
        $.ajax({
            url: "<?php echo URL::to('/'); ?>" + "/getBestSellers",
            type: "GET",
            data: {
                limit: 8
            },
            success: function (result) {
                $('#bestSellers').html(result);
                if(result == ""){
                    $('#bestSellers').parent().parent().parent().css("display","none");
                }
            }
        });

        $.ajax({
            url: "<?php echo URL::to('/'); ?>" + "/getMixProducts",
            type: "GET",
            data: {
                limit: 8
            },
            success: function (result) {
                $('#mixProducts').html(result);
                if(result == ""){
                    $('#mixProducts').parent().parent().parent().css("display","none");
                }
            }
        });

        //generateTimeOut('notification', 'center', '<img src="{{ URL::asset("assets/images/LoadingWait.gif")}}">', 3000);
        $.ajax({
            url: "<?php echo URL::to('/'); ?>" + "/getNewProducts",
            type: "GET",
            data: {
                limit: 20
            },
            success: function (result) {
                offsetCount++;
                $('#tiles').html(result);
                if(result == ""){
                    $('#tiles').parent().parent().parent().css("display","none");
                }
            }
        });
    });
//    $(window).scroll(function (e) {
//        clearTimeout($.data(this, 'scrollTimer'));
//        $.data(this, 'scrollTimer', setTimeout(function () {
//            // do something
//            e.preventDefault();
//            var inProgress = $('#progress').val();
//            var lastProduct = $('.lastProduct').last().val();
//            var iCurScrollPos = $(this).scrollTop();
//            if (inProgress != '1') {
//                if ($(window).scrollTop() >= scrollStart) {
//                    if (iCurScrollPos > 0) {
//                        scrollStart = scrollStart + 200;
////                        generate('information', 'bottomCenter', " Loading......");
//                        $('#progress').val('1');
//                        scrolltime = 0;
//                        takeoffset = offsetCount * 20;
//                        $.ajax({
//                            url: "<?php echo URL::to('/'); ?>" + "/getItems",
//                            type: "GET",
//                            data: {
//                                limit: 20,
//                                lastProduct: lastProduct,
//                                offset: takeoffset
//                            },
//                            success: function (result) {
//                                $("#processing").trigger("click");
//                                if (result != null && result != "") {
//                                    offsetCount++;
//                                    $('#progress').val('0');
//                                    $('#tiles').append(result);
//                                } else {
////                                    generateTimeOut('information', 'bottomCenter', 'No more product found', 3000);
//                                }
//                            }
//                        });
//                    }
//                }
//            }
//        }, scrolltime));
//
//
//    });

</script>
@stop