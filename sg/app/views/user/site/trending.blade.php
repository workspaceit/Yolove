@extends('user/layout/default_layout')
@section('content')
@if($response['status']['islogin'])
@include('user/layout/find_and_filter')
@endif
<div class="" style="min-height: 500px;">
<section class="whole-new">
    <div class="row">
        <div class="container">
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
            url: "<?php echo URL::to('/'); ?>" + "/getItems",
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
    $(window).scroll(function (e) {
        clearTimeout($.data(this, 'scrollTimer'));
        $.data(this, 'scrollTimer', setTimeout(function () {
            // do something
            e.preventDefault();
            var inProgress = $('#progress').val();
            var lastProduct = $('.lastProduct').last().val();
            var iCurScrollPos = $(this).scrollTop();
            if (inProgress != '1') {
                if ($(window).scrollTop() >= scrollStart) {
                    if (iCurScrollPos > 0) {
                        scrollStart = scrollStart + 200;
//                        generate('information', 'bottomCenter', " Loading......");
                        $('#progress').val('1');
                        scrolltime = 0;
                        takeoffset = offsetCount * 20;
                        $.ajax({
                            url: "<?php echo URL::to('/'); ?>" + "/getItems",
                            type: "GET",
                            data: {
                                limit: 20,
                                lastProduct: lastProduct,
                                offset: takeoffset
                            },
                            success: function (result) {
                                $("#processing").trigger("click");
                                if (result != null && result != "") {
                                    offsetCount++;
                                    $('#progress').val('0');
                                    $('#tiles').append(result);
                                } else {
//                                    generateTimeOut('information', 'bottomCenter', 'No more product found', 3000);
                                }
                            }
                        });
                    }
                }
            }
        }, scrolltime));


    });

</script>
@stop