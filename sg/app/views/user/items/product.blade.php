@if(isset($lastProduct))
<input type="hidden" class="lastProduct" value="{{$lastProduct}}">
@endif
@if($items)
<?php foreach ($items as $key => $item) { ?>
    <?php $item->item->title = substr($item->item->title, 0, 15) . '....'; ?>
    <div class='col-xs-12 item_{{$item->id}} @if(isset($page))@if($page == "profile") col-sm-4 col-md-4 @else col-sm-6 col-md-3 @endif @else col-sm-6 col-md-3 @endif' data-page="allproduct">

        <div class="row item product @if(!$response['status']['islogin']) signup-prompt @else getDetails @endif @if(isset($page))@if($page == "profile") thumbnail @endif @endif" style="background-color: <?php echo $item->colorValue; ?>; background-image: url(<?php echo $api_url; ?>{{$item->item->image_large}});" id="{{$item->id}}" data-id="{{$item->id}}" data-title="{{$item->slugTitle}}">
             @if(isset($response['cuser']['uid']))
             @if($item->isOwner || $response['status']['isAdmin'] )
             <div class="btn-group gear-cont">
                <button type="button" class="btn btn-xs btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-gear"></i></button>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="{{URL::to('/').'/editProduct/'.$item->id}}"><i class="fa fa-pencil"></i></a></li>
                    <li><a class ="itemDelete" id="{{$item->id}}" href="javascript:void(0)"><i class="fa fa-trash"></i></a></li>
                </ul>
            </div>
            @endif
            @endif
            <div class="overlay">
                <p>{{$item->item->title}}</p>
                <div class="row">
                    <div class="col-md-6 col-xs-6">	
                        <span>S${{round($item->item->price,2)}}</span>
                    </div>
                    <div class="col-md-6 col-xs-6">	
                        <div class="pull-right">
                            <ul class="love-value">
                                <li><p class="set favourite_{{$item->id}}">{{$item->total_like}}</p></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row overlay-btn-container text-center">
                    <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6 text-center">
                        @if($response['status']['islogin'])
                        <button class="btn btn-width-love btn-danger like-r likeProduct like_button_{{$item->id}}" id="{{$item->id}}" like="<?php
                        if ($item->isLike) {
                            echo "true";
                        } else {
                            echo "false";
                        }
                        ?>">@if($item->isLike) <i class="fa fa-heart"></i> @else Love @endif</button>
                        @else
                        <button class="btn btn-width-love  btn-danger like-r likeProduct falseLikeProduct" >Love</button>
                        @endif
                    </div>
                    <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6 text-center">
                        @if(isset($item->store))
                        @if($item->store->isverified)
                        @if($item->isBuy)
                        <button class="btn btn-width-buy  btn-buy" style="width: 100%;">Added</button>
                        @else
                        <button style="width: 100%;" class="btn btn-width-buy btn-buy add_to_cart {{$item->id}}_cartItem" data-price="{{round($item->item->price,2)}}" data-item="{{$item->id}}" data-store="{{$item->store_id}}" data-user="<?php
                        if (isset($response['cuser']['uid'])) {
                            echo $response['cuser']['uid'];
                        }
                        ?>" data-image="{{$item->item->image_square}}" data-title="{{$item->item->title}}" data-link="{{$item->item->reference_url}}" data-shipping-cost="{{$item->shipping_cost}}" data-toggle="modal" data-target="#addedCart" data-color="{{$item->colorValue}}">Buy now</button>
                        @endif
                        @else
                       <button class="btn btn-width-buy reference-btn btn-buy" data-role="button" data-href="{{$item->item->reference_url}}" style="width: 100%;" >Buy Now</button>
                        @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
@endif