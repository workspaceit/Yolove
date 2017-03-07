@if(!empty($comment))
<section class="comment-list" id="comment_{{$comment->id}}">
    <!-- First Comment -->
    <div class="row">
        <div class="col-md-1 col-sm-1 hidden-xs">
            <figure class="thumbnail">
                <?php $img = "uploads/attachments/avatar/" . $comment->nickname . "/" . $comment->user_id . "_" . md5($comment->email) . ".jpg" . ""; ?>
                <a href="<?php echo URL::to('/'); ?>/profile/uid/{{$comment->user_id}}/uname/{{$comment->nickname}}"><img class="img-responsive" src="<?php echo $api_url; ?>{{$img}}" height="40px" width="40px" alt="..." />
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
@endif