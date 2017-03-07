<?php

class CommentHelper {

    public function getAllComment() {
        $comment = Comment::all();
        return $comment;
    }

    public function getLatestCommentByUser($id) {
        $userHelper = new UserHelper();
        $activity = new ActivityHelper();
        $involved = array();
        $comment = DB::table('comment')->join('user', 'user.id', '=', 'comment.user_id')->where('comment.user_id', '=', $id)->orderBy('comment.id', 'DESC')->select('user.email', 'user.nickname', 'comment.*')->first();
        if (!empty($comment)) {
            if (!empty($comment->search_en)) {
                foreach (unserialize($comment->search_en) as $inv_user) {
                    $involved[] = $userHelper->getUserById($inv_user);
                }
            }
            $comment->tagged = $involved;
            $comment->diff = $activity->TimeDifference($comment->create_time);
        }
        return $comment;
    }

    public function getCommentByProduct($id) {
        $category = Category::find($id);
        return $category;
    }

    public function createComment($input, $cuser) {
        $activity = new ActivityHelper();
        $activity = $activity->commentProduct($input, $cuser);
        $parse_at = $this->parse_at($input, $activity, $cuser);
        $addComment = $this->addComment($parse_at, $activity);
        $owner = User::find($activity->to_user_id);
        if ($owner->mentions_you) {
            $user = User::find($cuser['uid']);
            $emaiData = array();
            $emaiData = array('user' => "<a style='text-decoration:none;color:#46BFC4' href=''>" . $user->nickname . " </a>", 'email' => $owner->email, 'collection' => " on Yolove.it", 'msg' => " Comment Your Product ", 'subject' => "Comment on Yolove.it ", 'see_post' => "<a style='text-decoration:none;background:#46BFC4;color:#fff;padding:5px 12px;font-weight:700;font-size:14px;border-radius:1px;-moz-border-radius:1px;-webkit-border-radius:1px;' href=''>See Product</a>", 'name' => $owner->nickname);
            $mail = new MailHelper();
            $mail = $mail->sendMail($emaiData);
        }
        return $addComment;
    }

    public function deleteComment($id) {
        $comment = Comment::find($id);
        if (!empty($comment)) {
            $share = Share::find($comment->share_id);
            $comment->delete();
            if (!empty($share)) {
                if ($share->total_comment != 0) {
                    $share->total_comment = $share->total_comment - 1;
                    $share->save();
                }
            }
        }
        return $comment;
    }

    public function parse_at($input, $activity, $cuser) {
        $atlist = $atlist_tmp = array();
        $atsearch_str = array();
        if (preg_match_all("/@([^\r\n]*?)\s/i", $input['comment'] . ' ', $atlist_tmp)) {
            $atlist_tmp = array_slice(array_unique($atlist_tmp[1]), 0, 3);
            if (!empty($atlist_tmp)) {
                foreach ($atlist_tmp as $key => $user) {
                    $users[$key] = User::where('nickname', '=', $user)->get();
                }
                foreach ($users as $key => $user) {
                    if (!empty($user[0])) {
                        $atlist[$user[0]->id] = $user[0]->nickname;
                    }
                }
            }
            if ($atlist) {
                foreach ($atlist as $atuid => $atusername) {

                    $atsearch[] = "/@$atusername /i";
                    $atreplace[] = "@{$atusername}";
                    $atsearch_str[] = $atuid;
                }
                $comment = preg_replace($atsearch, $atreplace, $input['comment'] . ' ', 1);
                $owner = User::find($activity->to_user_id);
                if ($owner->mentions_you) {
                    $user = User::find($cuser['uid']);
                    $emaiData = array();
                    $emaiData = array('user' => "<a style='text-decoration:none;color:#46BFC4' href=''>" . $user->nickname . " </a>", 'email' => $owner->email, 'collection' => " on Yolove.it", 'msg' => " Mention You on a comment ", 'subject' => "Mention on Yolove.it ", 'see_post' => "<a style='text-decoration:none;background:#46BFC4;color:#fff;padding:5px 12px;font-weight:700;font-size:14px;border-radius:1px;-moz-border-radius:1px;-webkit-border-radius:1px;' href=''>See Product</a>", 'name' => $owner->nickname);
                    $mail = new MailHelper();
                    $mail = $mail->sendMail($emaiData);
                }
            }
        }
        if (preg_match_all('/#([^\r\n]*?)\s/i', $input['comment'] . ' ', $atlist_tmp)) {
            $atlist_tmp = array_slice(array_unique($atlist_tmp[1]), 0, 3);
            if (!empty($atlist_tmp)) {
                foreach ($atlist_tmp as $TrendingTag) {
                    $atsearch[] = "/#$TrendingTag/i";
                    $atreplace[] = "#{$TrendingTag}";
                    //$atsearch_str[] = NULL;
                }
                foreach ($atlist_tmp as $tag) {
                    $hashTag = $this->createTag($tag, $activity);
                }
                $comment = preg_replace($atsearch, $atreplace, $input['comment'] . ' ', 1);
            }
        }
        if (!empty($atsearch_str)) {
            $mention = serialize($atsearch_str);
            return array('comment' => $comment, 'atsearch_str' => $mention);
        } else {
            return array('comment' => $input['comment']);
        }
    }

    public function addComment($parse_at, $activity) {
        $comment = new Comment();
        $comment->user_id = $activity->user_id;
        $comment->share_id = $activity->rel_id;
        $comment->comment_txt = $parse_at['comment'];
        $comment->search_en = (isset($parse_at['atsearch_str'])) ? ($parse_at['atsearch_str']) : '';
        $comment->create_time = time();
        $comment->save();
        return $comment;
    }

    public function createTag($tag, $activity) {
        $hashTag = Tag::where('tag_name', '=', $tag)->get();
        if (count($hashTag)) {
            $shareId = unserialize($hashTag[0]->share_id);
            if (in_array($activity->rel_id, $shareId)) {
                
            } else {
                array_push($shareId, $activity->rel_id);
                $hashTag[0]->share_id = serialize($shareId);
                $hashTag[0]->save();
            }
        } else {
            $share_id[] = $activity->rel_id;
            $hashTag = new Tag();
            $hashTag->tag_name = $tag;
            $hashTag->share_id = serialize($share_id);
            $hashTag->create_time = time();
            $hashTag->save();
        }
    }

}

?>
