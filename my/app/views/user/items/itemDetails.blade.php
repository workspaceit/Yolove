<div class="modal-dialog full">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close close-item" data-dismiss="modal">
                <span aria-hidden="true">×</span><span class="sr-only">Close</span>
            </button>
            <h4 class="modal-title" id="myModalLabel" style="height:77px !important">
                <ul class="modal-social ssk-group ssk-round" data-image="{{$api_url.$item['item']['image_large']}}">
                    <li class="circle ssk ssk-facebook facebook-circle"><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
                    <li class="circle ssk ssk-twitter twitter-circle"><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
                    <li class="circle ssk ssk-google-plus google-circle"><a href="javascript:void(0);"><i class="fa fa-google-plus"></i></a></li>
                    <li class="circle ssk ssk-pinterest pinterest-circle"><a href="javascript:void(0);"><i class="fa fa-pinterest"></i></a></li>
                    @if($item['isOwner']|| $response['status']['isAdmin'])
                    <li class="circle edit-circle pull-right"><a href="{{URL::to('/').'/editProduct/'.$item['id']}}"><i class="fa fa-pencil"></i></a></li>
                    @endif
                </ul>
            </h4>
        </div>
        <div class="modal-body clearfix">
            @if(!empty($prevProduct))
            <div class="arrow-left-control"><a href="javascript:void(0);"><i class="fa fa-chevron-left getDetails" id="{{$prevProduct->id}}" data-id="{{$prevProduct->id}}" data-title="{{$prevProduct->slugTitle}}"></i></a></div>
            @endif
            @if(!empty($nextProduct))
            <div class="arrow-right-control"><a href="javascript:void(0);"><i class="fa fa-chevron-right getDetails" id="{{$nextProduct->id}}" data-id="{{$nextProduct->id}}" data-title="{{$nextProduct->slugTitle}}"></i></a></div>
            @endif
            <div class="col-md-12 col-sm-12 col-xs-12 popup-img" id="{{$item['id']}}_image">
                <h3 class="pop-title" id="{{$item['id']}}_share_desc">{{$item['item']['title']}}</h3>
                <p class="pop-title">
                    <a href="{{URL::to('/')}}/profile/uid/{{$item['item']['user_id']}}/uname/{{$item['item']['user_nickname']}}">{{$item['item']['user_nickname']}}</a> Saved this to <a href="{{URL::to('/')}}/category/{{$item['category_id']}}">{{$item['details'][0]->category_name_cn}}</a> <a href="{{URL::to('/')}}/collection/{{$item['album_id']}}">{{$item['details'][0]->album_title}}</a><br/>
                    From <a href="{{URL::to('/')}}/store/{{$item['store']->id}}">{{$item['store']->store_name}}</a> {{$item['dif']}}
                </p>
                <img src="{{$api_url.$item['item']['image_large']}}" />
                <div class="row set">
                    @if($item['store']->isverified)
                    <div class="row">
                        <div class="form-group set-form size-form col-md-5 col-sm-5 col-xs-12">
                            <label for="sel1" class="sizelabel">Select Size:</label>
                            <select id="productSize" class="form-control sizeSelect">
                                <option value="">Select Size</option>
                                @if(@$item['size'])
                                    @foreach(@$item['size'] as $size)
                                        <option value="{{ $size['id'] }}">{{ $size['size'] }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group set-form col-md-2 col-sm-2 col-xs-12">
                            <label></label>
                            <a class="btn btn-success btn-set guideButton" id="sizeGuide" href="#sizeModal" data-image="{{$item['item']['image_large']}}" style="width:100%; margin-top:11px;">Guide</a>
                            <!--<button type="button" id="sizeGuide" class="btn btn-success btn-set" data-toggle="modal" data-target="#sizeModal" data-image="{{$item['item']['image_large']}}" style="width:100%; margin-top:11px;">GUIDE</button>-->
                        </div>
                        <!--<a class="btn guide" id="sizeGuide" href="#sizeModal" data-image="{{$item['item']['image_large']}}">Guide</a>-->
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-lg-5 col-lg-offset-1 col-sm-5 col-sm-offset-1 col-xs-5 col-xs-offset-1 col-md-5 col-md-offset-1 no-padding">
                            @if($response['status']['islogin'])
                            <button class="btn btn-danger details-like like-r like_button_{{$item['id']}}" id="{{$item['id']}}" like="<?php
                            if ($item["isLike"]) {
                                echo "true";
                            } else {
                                echo "false";
                            }
                            ?>">@if($item['isLike']) <i class="fa fa-heart"></i> @else Love @endif</button>
                            @else
                            <button class="btn btn-danger details-like falseLikeProduct">Love</button>
                            @endif
                            <div class="clearfix"></div>
                            <p class="pop-uptext"><i class="fa fa-heart"></i>&nbsp;{{$item['total_like']}}</p>
                        </div>
                        <?php $title = substr($item['item']['title'], 0, 15) . '....'; ?>
                        <div class="col-lg-5 col-sm-5 col-xs-5  col-md-5 no-padding">
                            @if($item['store']->isverified)
                            @if($item['isBuy'])
                            <button class="btn btn-success" style="width:100%;padding: 6px 10px;border-radius: 4px; margin-left:10px;">Added</button>
                            @else
                            <button class="btn btn-success add_to_cart {{$item['id']}}_cartItem" style="width:100%;padding: 6px 10px;border-radius: 4px; margin-left:10px;" data-price="{{round($item['item']['price'],2)}}" data-item="{{$item['id']}}" data-store="{{$item['store_id']}}" data-user="<?php
                            if (isset($response['cuser']['uid'])) {
                                echo $response['cuser']['uid'];
                            }
                            ?>" data-image="{{$item['item']['image_square']}}" data-title="{{$title}}" data-link="{{$item['item']['reference_url']}}" data-shipping-cost="{{$item['shipping_cost']}}" data-color="gray">Buy now</button>
                            @endif
                            @else
                            <button class="btn reference-btn btn-success btn-buy" data-role="button" data-href="{{$item['item']['reference_url']}}" style="width:100%;padding: 6px 10px;border-radius: 4px; margin-left:10px;" >Buy Now</button>
                            @endif
                            <p class="pop-uptext">RM{{round($item['item']['price'],2)}}</p>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                @if(!$item['store']->isverified)
                <div class="row">
                    <hr />
                    <p class="pop-uptext" style="padding-bottom:8px;"><a  href="{{$item['item']['reference_url']}}" class="ask-link" target="_blank">Visit Product from original site</a></p>
                    <hr />								
                </div>
                <div class="clearfix"></div>
                @endif
                <div class="row">
                    @if($item['item']['summary'])
                    <div class="desc-div">
                        <h5>description</h5>
                        <p class="details">
                            {{$item['item']['summary']}}
                        </p>
                    </div>
                    @endif							
                </div>

                <div class="discoverd clearfix">
                    <div class="block clearfix">
                        <h5>Discovered by</h5>
                        <div class="image-div">
                            @if(isset($item['productOwner']['socialInfo']))
                            <img src="{{$item['productOwner']['socialInfo']['avatar']}}">
                            @else
                            <?php $a = "uploads/attachments/avatar/" . $item['productOwner']->nickname . "/" . $item['productOwner']->id . "_" . md5($item['productOwner']->email) . ".jpg" . ""; ?>
                            <img class="" src="{{$api_url.$a}}">
                            @endif
                        </div>
                        <p class="username"><a href="{{URL::to('/')}}/profile/uid/{{$item['item']['user_id']}}/uname/{{$item['item']['user_nickname']}}" style="color:#797575 !important"> {{$item['item']['user_nickname']}}</a></p>
                        @if($response['status']['islogin'] )
                        @if($response['cuser']['uid'] == $item['item']['user_id'])
                        <button class="btn pull-right myself-btn">Myself</button>
                        @else
                        @if(in_array($item['item']['user_id'],$followUser))
                        <button class="btn pull-right following-btn unfollow follow_button_{{$item['item']['user_id']}}" id="{{$item['item']['user_id']}}">Following</button>
                        @else
                        <button class="btn pull-right follow-btn follow follow_button_{{$item['item']['user_id']}}" id="{{$item['item']['user_id']}}">Follow</button>
                        @endif
                        @endif
                        @else
                        <button class="btn pull-right post-btn falseFollow" href="javascript:void(0);">Follow</button>
                        @endif
                    </div>
                </div>

                <div class="row set">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea class="form-control comment-box" rows="3" name="Message" id="comment{{$item['id']}}" placeholder="Comment, @mention, #hashtag" style="border-color: #ccc !important;"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="button-block hidden comment-submitButton">
                                <button class="tick comment" id="{{$item['id']}}" data-cuser="@if($response['status']['islogin']) {{$response['cuser']['uid']}} @endif"><i class="fa fa-check"></i></button>
                                <button class="cross cancel-submit"><i class="fa fa-close"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="row">
                    <h2 class="comment-header" data-count="{{$item['total_comment']}}">{{$item['total_comment']}} Comments</h2>
                    <div class="col-md-12 commentArea">
                        @if(!empty($item['comments'] ))
                        @foreach($item['comments'] as $comment)
                        <section class="comment-list" id="comment_{{$comment->id}}">
                            <!-- First Comment -->
                            <div class="row">
                                <div class="col-md-1 col-sm-1 hidden-xs">
                                    <figure class="thumbnail" title="{{$comment->nickname}}">
                                        @if(isset($comment->avatar))
                                        <a href="<?php echo URL::to('/'); ?>/profile/uid/{{$comment->user_id}}/uname/{{$comment->nickname}}"><img class="img-responsive" src="{{$comment->avatar}}" height="40px" width="40px" alt="...">
                                        @else
                                        <?php $img = "uploads/attachments/avatar/" . $comment->nickname . "/" . $comment->user_id . "_" . md5($comment->email) . ".jpg" . ""; ?>
                                            @if(file_exists($api_server . $img))
                                                <a href="<?php echo URL::to('/'); ?>/profile/uid/{{$comment->user_id}}/uname/{{$comment->nickname}}"><img class="img-responsive" src="<?php echo $api_url; ?>{{$img}}" height="40px" width="40px" alt="..." />
                                            @else
                                                <a href="<?php echo URL::to('/'); ?>/profile/uid/{{$comment->user_id}}/uname/{{$comment->nickname}}"><img class="responsive" src="{{URL::asset('assets/images/user.png')}}" height="40px" width="40px" alt="..." />
                                            @endif
                                        @endif
                                        <figcaption class="text-center">{{$comment->nickname}}</figcaption></a>
                                    </figure>
                                </div>
                                <div class="col-md-11 col-sm-10">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="comment-post">
                                                <p>
                                                    <?php
                                                    $str = $comment->comment_txt;
                                                    if (strpos($comment->comment_txt, '@') !== false) {

                                                        foreach ($comment->tagged as $tag) {
                                                            $str = str_replace('@' . $tag->nickname, "<a href='" . URL::to('/') . "/profile/uid/" . $tag->id . "/uname/" . $tag->nickname . "'>" . "@" . $tag->nickname . "</a> ", $str);
                                                        }
                                                    }
                                                    if (strpos($comment->comment_txt, '#') !== false) {
                                                        $txt = '';
                                                        $hashtags = explode(' ', $str);
                                                        foreach ($hashtags as $h_tag) {
                                                            if (strpos($h_tag, '#') !== false) {
                                                                $txt .=" <a href='" . URL::to('/') . '/hashtag/' . ltrim($h_tag, '#') . "'>" . $h_tag . "</a>  ";
                                                            } else {
                                                                $txt.= " " . $h_tag . " ";
                                                            }
                                                        }
                                                        $str = $txt;
                                                    }
                                                    echo $str;
                                                    ?>
                                                </p>
                                            </div>
                                            @if($response['status']['islogin'])
                                            @if($comment->user_id == $response['cuser']['uid'] || $response['status']['isAdmin'])
                                            <span class="cross-btn deleteComment" data-id="{{$comment->id}}" style="  float: right; margin-top: -24px;cursor: pointer;"><i class="fa fa-trash"></i></span>
                                            @endif
                                            @endif
                                            <header class="text-left">
                                                <time class="comment-date" datetime=""><i class="fa fa-clock-o"></i> {{$comment->diff}}</time>
                                            </header>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        @endforeach
                        @endif
                    </div>
                </div>

                <div class="row">
                    @if(count($similarItems))
                    <h1 class="youlike"> YOU MAY ALSO LIKE </h1>
                    @endif
                    @if($lastProduct)
                    <input type="hidden" class="lastProduct" value="{{$lastProduct}}">
                    @endif 
                    <div id="tiles" class="row self-row">
                        <?php $Owner = 0; ?>

                        @if($similarItems)
                        @foreach ($similarItems as $key => $item)
                        <?php $item->item->title = substr($item->item->title, 0, 15) . '....'; ?>
                        <div class="col-md-4 item_{{$item->id}}">

                            <div class="row item product getDetails @if(isset($page))@if($page == 'profile') thumbnail @endif @endif" style="background-color: <?php echo $item->colorValue; ?>; background-image: url(<?php echo $api_url; ?>{{$item->item->image_large}});" id="{{$item->id}}" data-id="{{$item->id}}" data-title="{{$item->slugTitle}}">
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
                                            <span>RM{{round($item->item->price,2)}}</span>
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
                                        <div class="col-lg-5 col-sm-5 col-xs-5 col-md-5">
                                            @if($response['status']['islogin'])
                                            <button class="btn btn-width-love btn-danger like-r likeProduct like_button_{{$item->id}}" id="{{$item->id}}" like="<?php
                                            if ($item->isLike) {
                                                echo "true";
                                            } else {
                                                echo "false";
                                            }
                                            ?>">@if($item->isLike) <i class="fa fa-heart"></i> @else Love @endif</button>
                                            @else
                                            <div class="btn btn-width-love  btn-danger like-r likeProduct falseLikeProduct" >Love</div>
                                            @endif
                                        </div>
                                        <div class="col-lg-5 col-sm-5 col-xs-5 col-md-5">
                                            @if($item->store->isverified)
                                            @if($item->isBuy)
                                            <button class="btn btn-width-buy  btn-buy">Added</button>
                                            @else
                                            <button class="btn btn-width-buy btn-buy add_to_cart {{$item->id}}_cartItem" data-price="{{round($item->item->price,2)}}" data-item="{{$item->id}}" data-store="{{$item->store_id}}" data-user="<?php
                                            if (isset($response['cuser']['uid'])) {
                                                echo $response['cuser']['uid'];
                                            }
                                            ?>" data-image="{{$item->item->image_square}}" data-title="{{$item->item->title}}" data-link="{{$item->item->reference_url}}" data-shipping-cost="{{$item->shipping_cost}}" data-toggle="modal" data-target="#addedCart" data-color="gray">Buy now</button>
                                            @endif
                                            @else
                                            <button class="btn btn-width-buy reference-btn btn-buy" data-role="button" data-href="{{$item->item->reference_url}}">Buy Now</button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php $Owner = $item->productOwner->id ?>  
                        @endforeach
                        @endif
                        <input type="hidden" class="user_id" value="{{$Owner}}">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="sizeModal" style="display:none;">
</div>
<!--<div class="modal fade" id="sizeModal" tabindex="-1" role="dialog" aria-labelledby="helpModalLabel" aria-hidden="true">

</div>-->

<script>
    var image = $('.ssk-group').attr('data-image');
    SocialShareKit.init({
        image: image
    });
    $('.ssk').on('click', function (e) {
        e.preventDefault();
    });
    $(function () {
        var image = $('#sizeGuide').attr('data-image');
        $.ajax({
            url: "<?php echo URL::to('/'); ?>" + "/sizeGuide",
            type: "GET",
            data: {
                image: image
            },
            success: function (result) {
                $('#sizeModal').html(result);
            }
        })
    });
    $('#sizeGuide').on('click', function (e) {
        $('#sizeGuide').fancybox();
    });
    $('.comment').click(function () {
        var cuser = $(this).attr('data-cuser');
        if (cuser != "") {
            var shareId = $(this).attr('id');
            var text = $("#comment" + shareId).val();
            if ($.trim(text) != "") {
                if ((text.indexOf('http://') > -1) || (text.indexOf('https://') > -1) || (text.indexOf('www.') > -1)){
                    noty({
                        text: 'Comment cannot contain website link',
                        type: 'error',
                        dismissQueue: true,
                        timeout: 3000,
                        closeWith: ['click'],
                        layout: 'center',
                        theme: 'defaultTheme',
                        maxVisible: 1
                    });
                    $("#comment" + shareId).css("border-color", 'red !important');
                }else{
                    comment(shareId, text);
                }
            }
            else {
                $("#comment" + shareId).css("border-color", 'red');
            }
        } else {
            noty({
                text: 'You have to login first',
                type: 'error',
                dismissQueue: true,
                timeout: 3000,
                closeWith: ['click'],
                layout: 'center',
                theme: 'defaultTheme',
                maxVisible: 1,
            });
            setTimeout(function () {
                window.location = "<?php echo URL::to('/login') ?>";
            }, 3000);
        }
    });
</script>
