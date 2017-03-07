@extends('user/layout/default_layout')
@section('content')
@include('user/layout/find_and_filter')
<section class="best-sellers" style="min-height: 500px;">
    <div class="row" style="margin-top: 10px;">
        <div class="container">
            <div id="tiles">
            </div>

        </div>
    </div>
</section>
<input type="hidden" id="progress" value="0">
<script>
    var scrollStart = 200;
    $(function () {
//        generate('notification', 'center', '<img src="{{ URL::asset("assets/images/LoadingWait.gif")}}">');
        var category = $('#category').val();
        var color = $('#color').val();
        var range = $('#range').val();
        $.ajax({
            url: "<?php echo URL::to('/'); ?>" + "/getProductsByFiltering",
            type: "GET",
            data: {
                category: category,
                color: color,
                range: range,
                limit: 20
            },
            success: function (result) {
                $("#processing").trigger("click");
                $('#tiles').html(result);
            }
        });
        $(window).scroll(function () {
            var inProgress = $('#progress').val();
            var iCurScrollPos = $(this).scrollTop();
            var lastProduct = $('.lastProduct').last().val();
            if (inProgress != '1') {
                if ($(window).scrollTop() >= scrollStart) {
                    if (iCurScrollPos > 0) {
                        scrollStart = scrollStart + 200;
                        $('#progress').val('1');
//                        generate('information', 'bottomCenter', " Loading......");
                        $.ajax({
                            url: "<?php echo URL::to('/'); ?>" + "/getProductsByFiltering",
                            type: "GET",
                            data: {
                                category: category,
                                color: color,
                                range: range,
                                limit: 20,
                                lastProduct: lastProduct
                            },
                            success: function (result) {
                                $("#processing").trigger("click");
                                if (result != null && result != "") {
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

        });

    });
</script>
@stop