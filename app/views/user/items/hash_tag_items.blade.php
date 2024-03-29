@extends('user/layout/default_layout')
@section('content')
@include('user/layout/find_and_filter')
<section class="best-sellers" style="min-height: 500px;">
    <div class="row">
        <div class="container">
            <input type="hidden" id ="tag" value="<?php echo $tag->tag_name; ?>">
            <div class="collection-detail">
                <div class="col-md-3 col-sm-4 col-xs-3">
                </div>
                <div class="col-md-4 col-md-offset-1 col-sm-3 col-xs-6"><h3 class="coll-details collection-title">{{$tag->tag_name}} </h3></div>
                <div class="col-md-4 col-sm-5 col-xs-12">
                </div>
            </div>
            <div id="tiles">
            </div>

        </div>
    </div>
</section>
<input type="hidden" id="progress" value="0">
<script>
    var scrollStart = 200;
    $(function () {
        var tag = $('#tag').val();
//        generate('notification', 'center', '<img src="{{ URL::asset("assets/images/LoadingWait.gif")}}">');
        $.ajax({
            url: "<?php echo URL::to('/'); ?>" + "/hashtagItems",
            type: "GET",
            data: {
                tag: tag,
                limit: 20
            },
            success: function (result) {
                $("#processing").trigger("click");
                $('#tiles').html(result);
            }
        });
    });
    $(window).scroll(function () {
        var inProgress = $('#progress').val();
        var id = $('#tag').val();
        var lastProduct = $('.lastProduct').last().val();
        var iCurScrollPos = $(this).scrollTop();
        if (inProgress != '1') {
            if ($(window).scrollTop() >= scrollStart) {
                if (iCurScrollPos > 0) {
                    scrollStart = scrollStart + 200;
//                    generate('information', 'bottomCenter', " Loading......");
                    $('#progress').val('1');
                    $.ajax({
                        url: "<?php echo URL::to('/'); ?>" + "/hashtagItems",
                        type: "GET",
                        data: {
                            id: id,
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