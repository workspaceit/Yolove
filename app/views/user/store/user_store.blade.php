@if($lastStore)
<input type="hidden" class="lastStore" value="{{$lastStore}}">
@endif 
@if($stores)
@foreach($stores as $store)
<?php $store->store_name = substr($store->store_name, 0, 25); ?>
<div class="hero-feature @if(isset($page))@if($page == "profile") col-sm-4 col-md-4 @else col-sm-6 col-md-3 @endif @else col-sm-6 col-md-3 @endif" id="store_{{$store->id}}" data-page="allstore">
     <div class="thumbnail">
        @if(isset($response['cuser']['uid']))
        @if($store->isOwner || $response['status']['isAdmin'] )
        <div class="btn-group gear-cont">
            <button type="button" class="btn btn-xs btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-gear"></i></button>
            <ul class="dropdown-menu" role="menu">
                <li><a href="{{URL::to('/').'/editStore/'.$store->id}}"><i class="fa fa-pencil"></i></a></li>
                <li><a class ="deleteStore" id="{{$store->id}}" href="javascript:void(0)"><i class="fa fa-trash"></i></a></li>
            </ul>
        </div>
        @endif
        @endif
        <h4 class="collection-head"><a href="<?php echo URL::to('/'); ?>/store/{{$store->id}}">{{$store->store_name}}</a></h4>
        <a href="<?php echo URL::to('/'); ?>/store/{{$store->id}}" style="display: block;">
            <div class="top collection-cover @if(isset($page))@if($page == "profile") thumbnail @endif @endif" style="background: @if(isset($store->productsImage[0])) url('{{$api_url . $store->productsImage[0]}}') @else url('{{URL::asset('assets/images/no-image.jpg')}}') @endif">
        </div>
    </a>
    <div class="caption">
        <div class="col-md-9 total-coll">	
            <h5>{{$store->total_products}} <b>Products</b> </h5>
        </div>
        <div class="col-md-3 no-padding total-coll">	
            @if($response['status']['islogin'])     
            <button class="btn btn-danger btn-sm pull-right likeStore like_store_{{$store->id}}" id="{{$store->id}}" like="<?php
            if ($store->isLike) {
                echo "true";
            } else {
                echo "false";
            }
            ?>">@if($store->isLike) <i class="fa fa-heart"></i> @else Follow @endif</button>
            @else
            <button class="btn btn-danger btn-sm pull-right falseLikeStore">Follow</button>
            @endif
        </div>	
    </div>
</div>
</div>
@endforeach
@endif