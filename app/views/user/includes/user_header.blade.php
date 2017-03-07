<?php
$realUrl = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER['REQUEST_URI'];
$sessionData = Session::all();
?>
@if($response['status']['islogin'])
<div class="clearfix"></div>
<div class="row nav-sub-bar">
    <div class="container">
        <div class="col-lg-3 col-sm-3 col-xs-12 col-md-4">
            <ul class="nav navbar-nav navbar-left">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle visible-lg visible-md visible-sm" data-toggle="dropdown" aria-expanded="false" style="display:block !important;">
                        <i class="fa fa-bars" style="font-size: 1.3em;"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo URL::to('/'); ?>/trending">Trending</a></li>
                        <li><a href="<?php echo URL::to('/'); ?>/collections">Collections</a></li>
                        <li><a href="<?php echo URL::to('/'); ?>/aboutUs">About</a></li>
                        <li><a href="<?php echo URL::to('/'); ?>/privacy">Privacy</a></li>
                        <li><a href="<?php echo URL::to('/'); ?>/terms-n-conditions">Terms &amp; Conditions</a></li>
                        <li><a href="<?php echo URL::to('/'); ?>/contact">Contact</a></li>
                        <li><a href="<?php echo URL::to('/'); ?>/yoloveTool">Yolove.it Tool</a></li>
                        <li class="divider"></li>
                    </ul>
                </li>
            </ul>

            <form class="form-search" onsubmit="return false;">
                <div class="input-append">
                    <input type="text" class="input-medium search-query" id="keyword" placeholder="Search" value="">
                    <button type="submit" class="add-on" id="search"><i class="fa fa-search"></i></button>
                </div>
            </form>
        </div>

        <div class="col-lg-5 col-sm-4 col-xs-12 col-md-4">
            <a href="{{URL::to('/')}}"><img src="{{ URL::asset('assets/images/logo.png')}}" class="logo" /></a>
        </div>
        <div class="col-lg-4 col-sm-5 col-xs-12 col-md-4">
            <div class="pull-right full-xs">
                <ul class="nav navbar-nav navbar-right set-li">
                    <li class="dropdown">
                        <a href="javascript:void(0)" class="dropdown-toggle visible-lg visible-md visible-sm" data-toggle="dropdown"><i class="fa fa-plus-square fa-2x"></i></a>
                        <a href="javascript:void(0)" class="dropdown-toggle visible-xs" data-toggle="dropdown">Add to collection</a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo URL::to('/'); ?>/profile/uid/{{$response['cuser']['uid']}}/uname/{{$response['cuser']['nickname']}}/collections" class="notifyItem"><i class="fa fa-heart"></i> My Collection</a></li>
                            <li><a href="javascript:void(0)" class="notifyItem" id="btn_show" data-toggle="modal" data-target="#fetchModal"><i class="fa fa-link"></i> URL from other website</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:void(0)" class="dropdown-toggle visible-lg visible-md visible-sm" data-toggle="dropdown"><label class="label-flag"> USA</label><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li class="pose-rel"><a href="javascript:void(0);" data-url="{{$main_url}}/my?{{http_build_query($sessionData)}}" class="gotoCountry"><label class="label-flag"> MALAYSIA</label></a></li>
                            <li class="pose-rel"><a href="javascript:void(0);" data-url="{{$main_url}}/sg?{{http_build_query($sessionData)}}" class="gotoCountry"><label class="label-flag"> SINGAPORE</label></a></li>
                        </ul>
                    </li>
                    <li class="dropdown cart-menu">
                        @if (!empty($response['notifications']))
                        <a href="javascript:void(0)" class="dropdown-toggle visible-lg visible-md visible-sm " data-toggle="dropdown">
                            <i class="fa fa-bell fa-2x"></i><span class="badge" id="countNoti">{{$response['num_noti']}}</span>
                        </a>
                        <a href="javascript:void(0)" class="dropdown-toggle visible-xs" data-toggle="dropdown">Notification</a>
                        <ul class="dropdown-menu set-width">
                            <li role="presentation" class="dropdown-header">Notification</li>
                            <li class="divider"></li>
                            @foreach ($response['notifications'] as $noti)
                            <?php $img = "uploads/attachments/avatar/" . $noti->nickname . "/" . $noti->user_id . "_" . md5($noti->email) . ".jpg" . ""; ?>
                            <li>
                                <div class="row no-margin cart-small">
                                    <div class="col-md-2 col-sm-2 col-xs-2 col-md-offset-1 small-image" style="background-image: url('@if(isset($noti->avatar)){{$noti->avatar}}@else{{$api_url.$img}}@endif');"></div>
                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                        <p><a href="<?php echo URL::to('/'); ?>/profile/uid/{{$noti->user_id}}/uname/{{$noti->nickname}}" class="notifyItem noti_link"><b>{{$noti->nickname}}</b></a>
                                            <a activity="{{$noti->id}}"
                                               @if($noti->act_code== 'addlike'||$noti->act_code== 'postcomment')
                                               href="javascript:void(0);" class="notiItem notifyItem" id="{{$noti->rel_id}}" slug = "{{$noti->slugTitle}}" data-title= "{{$noti->act_title}}"
                                               @elseif($noti->act_code== 'addlikealbum')
                                               href="javascript:void(0);"   class = "notiAlbum notifyItem" id="{{$noti->rel_id}}"
                                               @endif>
                                               @if($noti->act_code== 'addlike')
                                               liked a product you shared

                                               @elseif($noti->act_code== 'postcomment')
                                               commented on a product you shared

                                               @elseif($noti->act_code== 'addlikealbum')
                                               liked a album you shared

                                               @endif
                                        </a>
                                        <br>
                                        <span class="date">Posted on: {{$noti->differ;}}</span>
                                    </p>
                                </div>
                            </div>
                        </li>
                        @endforeach
                        <li class="divider"></li>
                        <li>
                            <a class="btn-goto-cart pull-right" href="{{URL::to('/notifications')}}" title="See more"><i class="fa fa-chevron-right fa-2x"></i></a>
                        </li>
                    </ul>
                    @else
                    <a href="javascript:void(0)" class="dropdown-toggle visible-lg visible-md visible-sm " data-toggle="dropdown">
                        <i class="fa fa-bell fa-2x"></i><span class="badge" id="countNoti">0</span>
                    </a>
                    <a href="javascript:void(0)" class="dropdown-toggle visible-xs" data-toggle="dropdown">Notification</a>
                    <ul class="dropdown-menu set-width">
                        <li role="presentation" class="dropdown-header">Notification</li>
                        <li class="divider"></li>
                        <li>
                            <a class="btn-goto-cart pull-right" href="{{URL::to('/notifications')}}" title="See more"><i class="fa fa-chevron-right fa-2x"></i></a>
                        </li>
                    </ul>
                    @endif
                </li>

                <li class="dropdown cart-menu">
                    <a href="javascript:void(0)" class="dropdown-toggle visible-lg visible-md visible-sm" data-toggle="dropdown"><i class="fa fa-shopping-cart fa-2x"></i><span class="badge" id="countCart">@if(isset($_SESSION[$response['cartuser']]['totalQuantity'])) {{$_SESSION[$response['cartuser']]['totalQuantity']}} @else 0 @endif</span></a>
                    <a href="javascript:void(0)" class="dropdown-toggle visible-xs">Cart</a>
                    <ul class="dropdown-menu set-width">
                        <li role="presentation" class="dropdown-header">Shopping Cart</li>
                        <li class="divider"></li>
                        @if(isset($_SESSION[$response['cartuser']]['shoppingItems']))
                        <div @if(count($_SESSION[$response['cartuser']]['shoppingItems'])>5) style="height:411px;width: 453px;overflow-y:scroll;"@endif>
                              @foreach($_SESSION[$response['cartuser']]['shoppingItems'] as $shoppiingItem)
                              <li >
                                <div class="row no-margin cart-small">
                                    <div class="col-md-2 col-sm-2 col-xs-2 col-md-offset-1 small-image"  style="background-image: url('{{$api_url.$shoppiingItem['image']}}');"></div>
                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                        <p><a class ='shopItem notifyItem' id="{{$shoppiingItem['share_id']}}" href="javascript:void(0);" data-title="{{$shoppiingItem['title']}}">{{$shoppiingItem['title']}}</a><br>
                                            <span class="date">Quantity : {{$shoppiingItem['quantity']}}</span>
                                        </p>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </div>
                        @endif
                        <li class="divider"></li>
                        <li>
                            <a class="btn-goto-cart pull-right" href="<?php echo URL::to('/'); ?>/viewcart" title="Proceed checkout"><i class="fa fa-shopping-cart fa-2x"></i></a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown profile-img">
                    <a href="#" class="dropdown-toggle visible-lg visible-md visible-sm" data-toggle="dropdown">
                    @if(isset($sessionData['avatar']))
                        <img src="{{$sessionData['avatar']}}"><b class="caret"></b></a>
                    @else
                    <?php
                    $a = "uploads/attachments/avatar/" . $response['cuser']['nickname'] . "/" . $response['cuser']['uid'] . "_" . md5($response['cuser']['email']) . ".jpg" . "";
                    if (file_exists($api_server . $a)) {
                        ?><img src="<?php echo $api_url; ?>{{$a}}"><?php } else { ?><i class="fa fa-user fa-2x"></i><?php } ?><b class="caret"></b></a>
                    @endif                        
                    <a href="#" class="dropdown-toggle visible-xs" data-toggle="dropdown">Username<b class="caret"></b></a>
                    <ul class="dropdown-menu profile-menu">
                        <li><a href="<?php echo URL::to('/'); ?>/profile/uid/{{$response['cuser']['uid']}}/uname/{{$sessionData['nickname']}}" class="notiItem-lg"> <i class="fa fa-user"></i> {{$sessionData['nickname']}}</a></li>
                        <li><a href="<?php echo URL::to('/'); ?>/profile/basicSettings" class="notiItem-lg"> <i class="fa fa-gear"></i> settings</a></li>
                        <li><a href="<?php echo URL::to('/'); ?>/profile/securitySetting" class="notiItem-lg"> <i class="fa fa-refresh"></i> Change Password</a></li>
                        <li><a href="javascript:void(0)" class="notiItem-lg" id="order_show"> <i class="fa fa-magnet"></i> Order Track</a></li>
                        @if($response['cuser']['user_credits'] != 0)
                        <li><a href="javascript:void(0)" class="notiItem-lg" id="user_credits"> <i class="fa fa-dollar"></i> Balance : {{$response['cuser']['user_credits']}}</a></li>
                        @endif
                        <li><a href="<?php echo URL::to('/'); ?>/logout" class="notiItem-lg"> <i class="fa fa-sign-out"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
</div>
<div class="clearfix"></div>
<header class="row no-margin">
    <div class="container-fluid upper-panel">
        <div id="categories-toggle" class="container collapse" aria-expanded="true" style="">
            <div class="row">
                <div class="col-md-12 up-left-block">
                    <div class="row">
                        <ul class="categories">
                            @foreach($response['categories'] as $category)
                            <li class="col-md-3"><a href="<?php echo URL::to('/'); ?>/category/{{$category['id']}}">{{$category['category_name_cn']}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container" style="position:relative;">
    <ul class="nav navbar-nav navbar-left set-drop">
        <li>
            <a class="visible-lg visible-md visible-sm cat-drop" data-toggle="collapse" href="#categories-toggle" aria-expanded="true" aria-controls="categories-toggle" style="display:block !important;">
                <div class="drop" style="margin-top: 0px !important;"></div>
            </a>
        </li>
    </ul>
</div>
<div class="clearfix"></div>
<nav class="navbar navbar-default set-submenu">
    <div class="container fix-submenu-pad">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div id="navbar" class="navbar-collapse collapse fix-submenu-pad" style="display:block; margin-top:5px;">
                <ul class="nav navbar-nav fix-sub-list">
                    <li><a href="<?php echo URL::to('/'); ?>/trending">Trending</a></li>
                    <li><a href="<?php echo URL::to('/'); ?>/collections">Collections</a></li>
                    <li><a href="http://yolove.it/blog/" target="_blank">Blog</a></li>
                    <li><a href="<?php echo URL::to('/'); ?>/beauty">Cosmetics</a></li>
                    <li><a href="<?php echo URL::to('/'); ?>/bestSellers">Best seller</a></li>
                    <li><a href="<?php echo URL::to('/'); ?>/underPrice/50">Under 50</a></li>
                </ul>
            </div><!--/.nav-collapse -->										
        </div><!--/.nav-collapse -->										
    </div><!--/.container-fluid -->
</nav>
<input type="hidden" id="user_inNewsletter" value="{{$response['status']['inNewsletter']}}">
<script>
    $(document).ready(function () {
        var user_inNewsletter = $("#user_inNewsletter").val();
        if (user_inNewsletter != '1') {
            checkCookie();
        }

    });
</script>
@endif
