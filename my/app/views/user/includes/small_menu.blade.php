<div class="container-fluid hashtag-container">
    <div class="container">
        <ul class="hashtag-ul">
            @if(isset($tagMenu))
            @if(count($tagMenu))
            @foreach($tagMenu as $key => $menu)
            <li><a href="<?php echo URL::to('/');?>/hashtag/{{$menu->tag_name}}" @if($tag->tag_name == $menu->tag_name) class="active" @endif>{{ucfirst($menu->tag_name)}}</a></li>
            @endforeach
            @endif
            @endif
        </ul>
    </div>
</div>