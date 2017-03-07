@extends('user/layout/default_layout')
@section('content')
<div id="flashes">

</div>

<style>
    #tiles li {
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    #tiles li img {
        width: 100%;
        height: auto;
    }
</style>
<section class="best-sellers" style="min-height: 500px;">
    <div class="row">
        <div class="container">
            <input type="hidden" id="key" value="<?php echo $keyword; ?>">
            <div id="main" role="main">
                <ul id="tiles">

                </ul>
            </div>
        </div>
    </div>
</section>
<input type="hidden" id="progress" value="0">
<script>
    var scrollStart = 200;
    $(document).ready(function () {
        var keyword = $('#key').val();
//        generate('notification', 'center', '<img src="{{ URL::asset("assets/images/LoadingWait.gif")}}">');
        $.ajax({
            url: "<?php echo URL::to('/'); ?>" + "/getSearchItems",
            type: "GET",
            data: {
                limit: 20,
                keyword: keyword
            },
            success: function (result) {
                $("#processing").trigger("click");
                $('#tiles').html(result);
            }
        });
    });
    $(window).scroll(function () {
        var inProgress = $('#progress').val();
        var keyword = $('#key').val();
        var iCurScrollPos = $(this).scrollTop();
        if (inProgress != '1') {
            var lastProduct = $('.lastProduct').last().val();
            if ($(window).scrollTop() >= scrollStart) {
                if (iCurScrollPos > 0) {
                    scrollStart = scrollStart + 200;
                    $('#progress').val('1');
//                    generate('information', 'bottomCenter', " Loading......");
                    $.ajax({
                        url: "<?php echo URL::to('/'); ?>" + "/getSearchItems",
                        type: "GET",
                        data: {
                            keyword: keyword,
                            limit: 20,
                            lastProduct: lastProduct
                        },
                        success: function (result) {

                            $("#processing").trigger("click");
                            if (result != null && result != "") {
                                $('#progress').val('0');
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
