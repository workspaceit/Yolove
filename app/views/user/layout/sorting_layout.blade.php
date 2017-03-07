<div class="row">
    <div class="container">
        <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
            <ul class="nav nav-tabs">
                <li role="presentation"><a id="byFan" href="<?php echo URL::to('/'); ?>/users/sort/fan">By Fans</a></li>
                <li role="presentation"><a id="byTime" href="<?php echo URL::to('/'); ?>/users/sort/time">By Time</a></li>
                <li role="presentation"><a id="mostShared" href="<?php echo URL::to('/'); ?>/users/sort/share">Most Shared</a></li>
                <li role="presentation"><a id="mostLiked" href="<?php echo URL::to('/'); ?>/users/sort/like">Most Liked</a></li>
                <li role="presentation"><a id="byUsername" href="<?php echo URL::to('/'); ?>/users/sort/nickname">By Username</a></li>
            </ul>
        </div>
        <div class="clearfix"></div>
        <div id="tiles" class="row self-row products-part">
                
        </div>
    </div>
</div>
<input type="hidden" id="sort" value="{{$sort}}">
<script type="text/javascript">
    $(function () {
        var sort = $('#sort').val();
        if (sort == "fan") {
            $('#byFan').addClass("active");
        } else if (sort == "time") {
            $('#byTime').addClass("active");
        } else if (sort == "share") {
            $('#mostShared').addClass("active");
        } else if (sort == "like") {
            $('#mostLiked').addClass("active");
        } else if (sort == "nickname") {
            $('#byUsername').addClass("active");
        }
    })
</script>
