@extends('user/layout/default_layout')
@section('content')
<section class="best-sellers" style="min-height: 500px;">
    <div class="row">
        <div class="container">
            <input type="hidden" id ="store" value="<?php echo $id; ?>">
            <div class="collection-detail">
                <div class="col-md-3 col-sm-4 col-xs-3">
                    <div class="profile-image">
                        <?php
                        $storeImg = "uploads/attachments/store/" . $store->id . "_" . md5($store->domain_name) . ".jpg" . "";
                        if (file_exists($api_server . $storeImg)) {
                            ?>
                            <img class="" src="<?php echo $api_url; ?>{{$storeImg}}">
                        <?php } else { ?>
                            <img class="" src="{{URL::asset('assets/images/no-image.jpg')}}">
                        <?php } ?>
                    </div>
                    @if(!$store->isregister)
                    <p><a href="<?php echo URL::to('/'); ?>/store/{{$store->id}}/register">Do you own this store? Claim it.</a></p>
                    @else
                    <p>{{$store->store_desc}} &nbsp;</p>
                    <p>@if(!empty($store->city)){{$store->city}}@endif @if(!empty($store->country)){{$store->country}}@endif</p>
                    @endif
                </div>
                <div class="col-md-4 col-md-offset-1 col-sm-3 col-xs-6"><h3 class="collection-title">@if(empty($store->domain_name))
                        {{$store->store_name}}
                        @else
                        @if($store->isverified)
                        <a href="http://{{$store->domain_name}}" target="_blank" style="background: #fff !important;color: #337ab7 !important;"> {{$store->store_name}}</a>
                        @else
                        {{$store->store_name}}
                        @endif
                        @endif </h3></div>
                <div class="col-md-4 col-sm-5 col-xs-12">
                    <div class="pull-right-self">
                        <a class="btn" id="storeCollections" data-store="{{$store->id}}" store-name="{{$store->store_name}}">{{count($store->collection)}} collections</a>
                        <a class="btn" id="storeProducts" href="<?php echo URL::to('/'); ?>/store/{{$store->id}}">{{$store->total_products}} products</a>
                        @if($response['status']['islogin'])
                        <a class="btn btn-success-dtl likeStore like_store_{{$store->id}}" id="{{$store->id}}" like="<?php
                        if ($store->isLike) {
                            echo "true";
                        } else {
                            echo "false";
                        }
                        ?>" href="javascript:void(0);">@if($store->isLike) <i class="fa fa-heart"></i> @else Follow @endif</a>
                        @else
                        <a class="btn btn-success-dtl falseLikeStore" href="javascript:void(0);">Love</a>
                        @endif
                        @if($store->isOwner || $response['status']['isAdmin'] )
                        <a class="btn btn-success-dtl" id="storeProductsInfo" data-store="{{$store->id}}" title="Store Information"><i class="fa fa-info"></i></a>
                        <a class="btn btn-success-dtl" id="storeStat" href="javascript:void(0);" data-store="{{$store->id}}" title="Store Statistics"><i class="fa fa-bar-chart"></i></a>
                        @endif
                    </div>
                </div>
            </div>
            <div id="storeAlbums"> 
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
        var id = $('#store').val();
//        generate('notification', 'center', '<img src="{{ URL::asset("assets/images/LoadingWait.gif")}}">');
        $.ajax({
            url: "<?php echo URL::to('/'); ?>" + "/getProductsByStore",
            type: "GET",
            data: {
                id: id, limit: 20
            },
            success: function (result) {
                $("#processing").trigger("click");
                $('#tiles').html(result);
                $('#storeAlbums').css('display', 'none');
            }
        });
    });
    $('#storeCollections').on('click', function () {
        var id = $(this).attr('data-store');
        var storeName = $(this).attr('store-name');
        $.ajax({
            url: "<?php echo URL::to('/'); ?>" + "/getStoreCollections",
            type: "POST",
            data: {
                id: id
            },
            success: function (result) {
                $('#storeAlbums').css('display', 'block');
                $('#storeAlbums').html('<center><h3 class="collection-title">Top collection on ' + storeName + '</h3></center><br/>' + result);
                $('#tiles').css('display', 'none');
            }
        })
    });
    $(window).scroll(function () {
        var inProgress = $('#progress').val();
        var id = $('#store').val();
        var iCurScrollPos = $(this).scrollTop();
        if (inProgress != '1') {
            if ($(window).scrollTop() >= scrollStart) {
                if (iCurScrollPos > 0) {
                    scrollStart = scrollStart + 200;
                    $('#progress').val('1');
                    if ($('#tiles').is(':visible')) {
                        var lastProduct = $('.lastProduct').last().val();
//                        generate('information', 'bottomCenter', " Loading......");
                        $.ajax({
                            url: "<?php echo URL::to('/'); ?>" + "/getProductsByStore",
                            type: "GET",
                            data: {
                                id: id, limit: 20, lastProduct: lastProduct
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
        }
    });
</script>
@stop