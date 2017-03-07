@if($lastAlbum)
<input type="hidden" class="lastAlbum" value="{{$lastAlbum}}">
@endif 
@if($collections)
@foreach($collections as $collection)
<?php $collection['album_title'] = substr($collection['album_title'], 0, 22); ?>
<div class="collection-con hero-feature @if(isset($page))@if($page == "profile") col-sm-4 col-md-4 @else col-sm-6 col-md-3 @endif @else col-sm-6 col-md-3 @endif" id="collection_{{$collection['id']}}" data-page="allcollection">
     <div class="thumbnail">
        @if(isset($response['cuser']['uid']))
        @if($collection->isOwner || $response['status']['isAdmin'] )
        <div class="btn-group gear-cont">
            <button type="button" class="btn btn-xs btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-gear"></i></button>
            <ul class="dropdown-menu" role="menu">
                <li><a href="{{URL::to('/').'/editCollection/'.$collection['id']}}"><i class="fa fa-pencil"></i></a></li>
                <li><a class ="deleteColl" id="{{$collection['id']}}" href="javascript:void(0)"><i class="fa fa-trash"></i></a></li>
            </ul>
        </div>
        @endif
        @endif
        <h4 class="collection-head"><a href="<?php echo URL::to('/'); ?>/collection/{{$collection['id']}}">{{$collection['album_title']}}</a></h4>
        <a href="<?php echo URL::to('/'); ?>/collection/{{$collection['id']}}" style="display: block;">
        <div class="top collection-cover" style="background: @if(isset($collection["productsImage"][0])) url('{{$api_url . $collection['productsImage'][0]}}') @else url('{{URL::asset('assets/images/no-image.jpg')}}') @endif">
        </div>
            </a>

        <div class="caption">
            <div class="total-coll no-padding" style="width: 60%;float: left;">
                <h5>{{$collection->itemCount}} <b>Products</b></h5>
            </div>
            <div class="no-padding total-coll" style="width: 40%;float: left;">
                @if($response['status']['islogin'])     
                <button style="margin-right: 5px;" class="btn btn-danger btn-sm pull-right likeAlbum like_album_{{$collection['id']}}" id="{{$collection['id']}}" like="<?php
                if ($collection->isLike) {
                    echo "true";
                } else {
                    echo "false";
                }
                ?>">@if($collection->isLike) <i class="fa fa-heart"></i> @else Love @endif</button>
                @else
                <button class="btn btn-danger btn-sm pull-right falseLikeAlbum">Love</button>
                @endif
            </div>	
        </div>
    </div>
</div>
@endforeach
@endif