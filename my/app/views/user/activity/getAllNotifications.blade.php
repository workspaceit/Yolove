
@if($notifications)
@foreach ($notifications as $noti)
<?php $img = "uploads/attachments/avatar/" . $noti->nickname . "/" . $noti->user_id . "_" . md5($noti->email) . ".jpg" . ""; ?>
<li>
    <img class="image-div" height="40px" width="40px" src="<?php echo $api_url; ?>{{$img}}" alt="...">
    <span class="time-posed"><i class="fa fa-clock-o"></i> {{$noti->differ}}</span>
    <p class="notify-txt"><a href="<?php echo URL::to('/'); ?>/profile/uid/{{$noti->user_id}}/uname/{{$noti->nickname}}"><span class="bold text-uppercase">{{$noti->nickname}}</span></a>
        <a activity="{{$noti->id}}"
           @if($noti->act_code== 'addlike'||$noti->act_code== 'postcomment')
           href="javascript:void(0);" class="notiItem" id="{{$noti->rel_id}}" slug = "{{$noti->slugTitle}}" data-title= "{{$noti->act_title}}"
           @elseif($noti->act_code== 'addlikealbum')
           href="{{URL::to('/')}}/collection/{{$noti->rel_id}}"   class = "notiAlbum" id="{{$noti->rel_id}}"
           @endif
           @if($noti->is_read==0)
           read = "false"
           @else
           read = "true"
           @endif

           >
           @if($noti->act_code== 'addlike')
           liked a product you shared
           @elseif($noti->act_code== 'postcomment')
           commented on a product you shared
           @elseif($noti->act_code== 'addlikealbum')
           liked a album you shared
           @endif

    </a>
</p>
</li>
@endforeach
<input type='hidden'  class='lastid' value="{{$lastid}}">
@endif

