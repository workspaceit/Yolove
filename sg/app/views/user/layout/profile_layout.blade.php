@extends('user/layout/default_layout')
@section('content')
<?php
$realUrl = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER['REQUEST_URI'];
$match = substr(strrchr($realUrl, "/"), 1);
if (($match != "shares") && ($match != "saved") && ($match != "stores") && ($match != "basicSettings") && ($match != "securitySetting")) {
    $match = "collections";
}
?>
@if(Session::has('error'))
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    {{ Session::get('error') }}
</div>
@endif
@if(Session::has('message'))
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    {{ Session::get('message') }}
</div>
@endif
<section class="best-sellers" style="min-height: 500px;">
    <div class="row" style="margin-top: 20px;">
        <div class="container">
            <div class="row">
                <div class="col-md-8 no-padding">
                    <div class="row no-margin">
                        <div class="col-md-9">
                            <ul class="nav navbar-inverse">
                                <li @if($match == "collections") class="active" @endif><a href="<?php echo URL::to('/'); ?>/profile/uid/{{$userInfo['id']}}/uname/{{$userInfo['nickname']}}/collections" id="profileCollections">Collections<span class="small-txt">{{count($userInfo['collections'])}}</span></a></li>
                                <li @if($match == "shares") class="active" @endif role="presentation"><a id="profileProducts" href="<?php echo URL::to('/'); ?>/profile/uid/{{$userInfo['id']}}/uname/{{$userInfo['nickname']}}/shares">Products<span class="small-txt">{{count($userInfo['shares'])}}</span></a></li>
                                <li @if($match == "saved") class="active" @endif role="presentation"><a id="profileSaved" href="<?php echo URL::to('/'); ?>/profile/uid/{{$userInfo['id']}}/uname/{{$userInfo['nickname']}}/saved">Loved<span class="small-txt">{{$userInfo['total_favorite_share']}}</span></a></li>
                                <li @if($match == "stores") class="active" @endif role="presentation"><a href="<?php echo URL::to('/'); ?>/profile/uid/{{$userInfo['id']}}/uname/{{$userInfo['nickname']}}/stores">Stores<span class="small-txt">{{count($userInfo['stores'])}}</span></a></li>
                            </ul>
                        </div>
                    </div>
                    @yield('profileContent')
                    @include('user/includes/profile_tab')
                </div>		
                <div class="col-md-4 col-md-offset-0 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2">
                    <div class="user-img">
                        @if(Session::has('avatar'))
                        <img class="responsive" src="{{Session::get('avatar')}}">
                        @else
                        <?php
                        $a = "uploads/attachments/avatar/" . $userInfo['nickname'] . "/" . $userInfo['id'] . "_" . md5($userInfo['email']) . ".jpg" . "";
                        if (file_exists($api_server . $a)) {
                            ?>
                            <img class="responsive" src="<?php echo $api_url; ?>{{$a}}">
                        <?php } else { ?>
                            <img class="responsive" src="{{URL::asset('assets/images/user.png')}}"> 
                        <?php } ?>
                        @endif
                        <div class="detail-zone">
                            <h3 class="user-name">{{'@'.$userInfo['nickname']}}</h3>
                            @if(isset($userInfo['socialInfo']))
                            <i @if($userInfo['socialInfo']->vendor == "facebook") class="fa fa-facebook fb-bg" @else class="fa fa-twitter-square" @endif style="padding:3px 7px;"></i><span><a href="{{$userInfo['socialInfo']->homepage}}" target="_blank">{{$userInfo['socialInfo']->name}}</a></span>
                            @endif
                            @if($response['status']['islogin'])
                            @if($response['cuser']['uid'] == $userInfo['id'])
                            <button class="btn pull-right myself-btn" style="margin-right: 10px;">Myself</button></p>
                            @else
                            @foreach($userInfo['fans'] as $fans)
                            @if($response['cuser']['uid'] == $fans['id'])
                            <?php $status = "following" ?>
                            @endif
                            @endforeach
                            @if(isset($status))
                            <button class="btn pull-right following-btn unfollow follow_button_{{$userInfo['id']}}" id="{{$userInfo['id']}}" style="margin-right: 10px;">Following</button></p>
                            @else
                            <button class="btn pull-right follow-btn follow follow_button_{{$userInfo['id']}}" id="{{$userInfo['id']}}" style="margin-right: 10px;">Follow</button></p>
                            @endif
                            @endif
                            @else
                            <button class="btn pull-right post-btn falseFollow">Follow</button></p>
                            @endif
                        </div>
                        <div class="follow-detail">
                            <p class="col-md-6"><a href="<?php echo URL::to('/'); ?>/profile/uid/{{$userInfo['id']}}/uname/{{$userInfo['nickname']}}/followings"><b>{{count($userInfo['followings'])}}</b> Followings</a></p>
                            <p class="col-md-6"><a href="<?php echo URL::to('/'); ?>/profile/uid/{{$userInfo['id']}}/uname/{{$userInfo['nickname']}}/fans"><b>{{count($userInfo['fans'])}}</b> Fans</a></p>
                        </div>
                        @if($response['status']['islogin'])
                        @if($response['cuser']['uid'] == $userInfo['id'])
                        <div class="setting-area">
                            <a class="btn btn-default" href="<?php echo URL::to('/'); ?>/profile/basicSettings">Edit profile</a>
                        </div>
                        @endif
                        @endif
                    </div>

                </div>		

            </div>	
        </div>	
    </div>
</section>
<input type="hidden" id="userId" value="{{$userInfo['id']}}">

<script>

    $('.upload-store-image').on('change', function (event) {// we fetch the file data
        var files = this.files;
        var reader = new FileReader();
        var name = this.value;
        reader.onload = function (e) {
            $(".show-img-div").html("<img src='" + e.target.result + "' width='150' height='150' />");
        };
        reader.readAsDataURL(files[0]);
    });


</script>
@stop