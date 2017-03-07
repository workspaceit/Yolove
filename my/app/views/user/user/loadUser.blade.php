@if($users)
@foreach($users as $user)
<?php $user['nickname'] = substr($user['nickname'], 0, 14); ?>
<div class="col-sm-6 hero-feature @if(isset($page))@if($page == "profile") col-md-4 @else col-md-3 @endif @else col-md-3 @endif" >
     <div class="thumbnail">
        <div class="pull-left">	
            <div class="user-info">
                <p class="user-head"><?php
                    $img = "uploads/attachments/avatar/" . $user['nickname'] . "/" . $user['id'] . "_" . md5($user['email']) . ".jpg" . "";
                    if (file_exists($api_server . $img)) {
                        ?>
<!--                        <img class="img-responsive" src="<?php echo $api_url; ?>{{$img}}">-->
                            <i class="fa fa-user set-user"></i>
                    <?php } else { ?>
    <!--                        <img class="" src="{{URL::asset('assets/images/user.png')}}">-->
                        <i class="fa fa-user set-user"></i>
                    <?php } ?>
                    <a href="<?php echo URL::to('/'); ?>/profile/uid/{{$user['id']}}/uname/{{$user['nickname']}}">{{$user['nickname']}}</a></p>
            </div>
        </div>
        <div class="pull-right-self">
            @if($response['status']['islogin'] )
            @if($response['cuser']['uid'] == $user['id'])
            <button class="btn-follow myself-btn">Myself</button></h3>
            @else
            @if(in_array($user['id'],$follow))
            <button class="btn-follow following-btn unfollow follow_button_{{$user['id']}}" id="{{$user['id']}}">Following</button></h3>
            @else
            <button class="btn-follow follow-btn follow follow_button_{{$user['id']}}" id="{{$user['id']}}">Follow</button></h3>
            @endif
            @endif
            @else
            <button class="btn-follow post-btn falseFollow" href="javascript:void(0);">Follow</button></h3>
            @endif
        </div>
        <div class="clearfix"></div>
        <div class="fans-details text-center">
            {{$user['total_follower']}} Fans / {{$user['total_follow']}} Followings / {{$user['total_share']}} Products
        </div>
        <a href="<?php echo URL::to('/'); ?>/profile/uid/{{$user['id']}}/uname/{{$user['nickname']}}" style="display: block;">
            <div class="top collection-cover" style="background: @if(isset($user->lastProduct[0])) url('{{$api_url . $user->lastProduct[0]->ProductImage}}') @else url('{{URL::asset('assets/images/no-image.jpg')}}') @endif">
               
            </div>
        </a>
    </div>
</div>
@endforeach
@endif
<input type="hidden" id="" class="lastUser" value="{{$lastUser}}">
