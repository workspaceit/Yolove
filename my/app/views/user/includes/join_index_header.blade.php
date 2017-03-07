<?php
$realUrl = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER['REQUEST_URI'];
?>
<div class="row">
    <div class="navbar-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12  before-log-prom text-center">
                    <h2 class="top-head">Shop With Us
                        <button class="btn btn-success registerNowPopup" style="border-radius:5px;" type="button">Sign
                            Up
                        </button>
                        Or
                        <button class="btn btn-success get-ios" style="border-radius:5px;" type="button">Get iOS App</button>
                         Or
                        <button class="btn btn-success get-android" style="border-radius:5px;" type="button">Get Android App</button>
                    </h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>

<div class="row nav-sub-bar">
    <div class="container">
        <div class="col-lg-3 col-sm-3 col-xs-12 col-md-4">
            <ul class="nav navbar-nav navbar-left">
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle visible-lg visible-md visible-sm" data-toggle="dropdown"
                       aria-expanded="false" style="display:block !important;">
                        <i class="fa fa-bars" style="font-size: 24px;"></i>
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
            <a href="{{URL::to('/')}}"><img src="{{ URL::asset('assets/images/logo.png')}}" class="logo"/></a>
        </div>
        <div class="col-lg-4 col-sm-3 col-xs-12 col-md-4">
            <div class="pull-right">
                <!--                <img src="{{ URL::asset('assets/images/cart.png')}}" />-->
                <button class="btn btn-success set-m cart-without-login" type="button" style="height: 32px;width: 30px;margin-top: 7px;"><i class="fa fa-shopping-cart" style="color: #fff;;margin-top: 5px;"></i></button>
                <button class="btn btn-success set-m loginNow" type="button" style="height: 32px;margin-top: 7px;">Login</button>
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
                                <li class="col-md-3"><a
                                            href="<?php echo URL::to('/'); ?>/category/{{$category['id']}}">{{$category['category_name_cn']}}</a>
                                </li>
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
            <a class="visible-lg visible-md visible-sm cat-drop" data-toggle="collapse" href="#categories-toggle"
               aria-expanded="true" aria-controls="categories-toggle" style="display:block !important;">
                <div class="drop"></div>
            </a>
        </li>
    </ul>
</div>
@if($realUrl ==  URL::to('/')."/trending" || $realUrl ==  URL::to('/')."/")
    <div class="banner">
        @if(isset($siteBanner))
            <img src="<?php echo $api_url; ?>{{$siteBanner}}"/>
        @else
            <img src="{{ URL::asset('assets/images/banner.png')}}"/>
            @endif
                    <!--    <div class="banner-details">
        <h1>NEW STYLE</h1>
        <h3>SALE 70% OFF</h3>
        <button type="button" class="btn btn-danger">SHOP ALL</button>
        <button type="button" class="btn btn-danger">READ MORE</button>
    </div>-->
    </div>
@endif
<div class="clearfix"></div>
<nav class="navbar navbar-default set-submenu">
    <div class="container fix-submenu-pad">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div id="navbar" class="navbar-collapse collapse fix-submenu-pad" style="display:block; margin-top:5px;">
                <ul class="nav navbar-nav fix-sub-list">
                    <li><a href="<?php echo URL::to('/'); ?>/trending">Trending</a></li>
                    <li><a href="<?php echo URL::to('/'); ?>/collections">Collections</a></li>
                    <li><a href="http://yolove.it/blog/">Blog</a></li>
                    <li><a href="<?php echo URL::to('/'); ?>/beauty">Cosmetics</a></li>
                    <li><a href="<?php echo URL::to('/'); ?>/bestSellers">Best seller</a></li>
                    <li><a href="<?php echo URL::to('/'); ?>/underPrice/50">Under 50</a></li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
        <!--/.nav-collapse -->
    </div>
    <!--/.container-fluid -->
</nav>

<script>
    $(document).ready(function () {
        checkCookie();
    });
</script>
