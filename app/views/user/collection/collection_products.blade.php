@extends('user/layout/default_layout')
@section('content')
<section class="cart-details" style="min-height: 500px;">
    <div class="row">
        <div class="container">
            <input type="hidden" id = "collection" value="<?php echo $id; ?>">
            <div class="collection-detail">
                <div class="col-md-3 col-sm-4 col-xs-3">
                    <div class="profile-image">
                        <?php
                        $albumImg = "uploads/attachments/collection/" . $album->id . "_" . md5($album->album_title) . ".jpg" . "";
                        if (file_exists($api_server . $albumImg)) {
                            ?>
                            <img class="" src="<?php echo $api_url; ?>{{$albumImg}}">
                        <?php } else { ?>
                            <img class="" src="{{URL::asset('assets/images/no-image.jpg')}}">
                        <?php } ?>
                    </div>
                </div>
                <div class="col-md-4 col-md-offset-1 col-sm-3 col-xs-6"><h3 class="collection-title">{{$album->album_title}} </h3></div>
                <div class="col-md-4 col-sm-5 col-xs-12">
                    <div class="pull-right-self">	
                        <button class="btn">{{$album->total_share}} products</button>
                        <button class="btn">{{$album->total_like}} likes</button>
                        @if($response['status']['islogin'])
                        <a class="btn btn-success-dtl likeAlbum like_album_{{$album->id}}" id="{{$album->id}}" like="<?php
                        if ($album->isLike) {
                            echo "true";
                        } else {
                            echo "false";
                        }
                        ?>" href="javascript:void(0);">@if($album->isLike) <i class="fa fa-heart"></i> @else Love @endif</a>
                        @else
                        <a class="btn btn-success-dtl falseLikeAlbum" href="javascript:void(0);">Love</a>
                        @endif
                    </div>
                </div>
            </div>
            <div id="main" role="main">
                <div id="tiles">
                </div>
            </div>

        </div>
    </div>
</section>
<input type="hidden" id="progress" value="0">
<script>
    var scrollStart = 200;
    $(function () {
//        generate('notification', 'center', '<img src="{{ URL::asset("assets/images/LoadingWait.gif")}}">');
        var id = $('#collection').val();
        $.ajax({
            url: "<?php echo URL::to('/'); ?>" + "/getProductsByCollection",
            type: "GET",
            data: {
                id: id,
                limit: 10
            },
            success: function (result) {
                $("#processing").trigger("click");
                $('#tiles').html(result);
            }
        });
    });
    $(window).scroll(function () {
        var inProgress = $('#progress').val();
        var id = $('#collection').val();
        var lastProduct = $('.lastProduct').last().val();
        var iCurScrollPos = $(this).scrollTop();
        if (inProgress != '1') {
            //if ($(document).height() == $(window).scrollTop() + $(window).height()) {
            if ($(window).scrollTop() >= scrollStart) {
                if (iCurScrollPos > 0) {
                    scrollStart = scrollStart + 200;
                    $('#progress').val('1');
//                    generate('information', 'bottomCenter', " Loading......");
                    $.ajax({
                        url: "<?php echo URL::to('/'); ?>" + "/getProductsByCollection",
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