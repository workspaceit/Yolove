<?php
$realUrl = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER['REQUEST_URI'];
?>
<section class="best-sellers">
    <div class="row">
        <div class="container">
            <h4 class="collection-title"><span>Notifications</span></h4>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 col-centred">

                <ul class="notify-tab">
                    <li><a @if($realUrl ==  URL::to('/')."/notifications") class="active" @endif href="{{URL::to('/notifications')}}">All</a></li>
                    <!--            <li><a href="{{URL::to('/notifications/follows')}}">Follows</a></li>-->
                    <li><a @if($realUrl ==  URL::to('/')."/notifications/likes") class="active" @endif href="{{URL::to('/notifications/likes')}}">Likes</a></li>
                    <li><a @if($realUrl ==  URL::to('/')."/notifications/comments") class="active" @endif href="{{URL::to('/notifications/comments')}}">Comments</a></li>
                </ul>
                <div class="row clearfix">
                    <ul class="notification-list notis" style="display: none">
                    </ul>
                    <!--            <ul class="notification-list notis_follow" style="display: none">
                                </ul>-->
                    <ul class="notification-list notis_likes" style="display: none">
                    </ul>
                    <ul class="notification-list notis_comments" style="display: none">
                    </ul>

                </div>
            </div>
        </div>
    </div>
</section>