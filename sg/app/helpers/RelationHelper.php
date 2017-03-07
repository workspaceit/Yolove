<?php

class RelationHelper {
    public function followUser($id, $cuser){
        $relation = new Relationship();
        $relation->user_id = $cuser;
        $relation->friend_id = $id;
        $relation->relation_status = 1;
        $relation->save();
        $user = User::find($cuser);
        $user->total_follow = $user->total_follow + 1;
        $user->save();
        $toUser = User::find($id);
        $toUser->total_follower = $toUser->total_follower + 1;
        $toUser->save();
        $owner = User::find($id);
        $relation->message = "You are following ".$toUser->nickname;
        if ($owner->follow_you) {
            $user = User::find($cuser);
            $emaiData = array();
            $emaiData = array('user' => "<a style='text-decoration:none;color:#46BFC4' href=''>".$user->nickname." </a>", 'email' => $owner->email , 'collection' => " on Yolove.it", 'msg' => " Followed You ", 'subject' => "Follow on Yolove.it ", 'see_post' => "<a style='text-decoration:none;background:#46BFC4;color:#fff;padding:5px 12px;font-weight:700;font-size:14px;border-radius:1px;-moz-border-radius:1px;-webkit-border-radius:1px;' href=''>See Follower</a>", 'name' => $owner->nickname );
            $mail = new MailHelper();
            $mail = $mail->sendMail($emaiData);
        }
        return $relation;
    }
    public function unfollowUser($id, $cuser){
        $relation = new Relationship();
        Relationship::where('user_id', '=', $cuser)->where('friend_id','=',$id)->delete();
        $user = User::find($cuser);
        $user->total_follow = $user->total_follow - 1;
        $user->save();
        $toUser = User::find($id);
        $toUser->total_follower = $toUser->total_follower - 1;
        $toUser->save();
       $relation->message = "You are Unfollowing ".$toUser->nickname;
       
        return $relation;
    }
    public function getFollowings($id){
        $relation = Relationship::where('user_id','=',$id)->get();
        foreach ($relation as $key => $user) {
            $getUser = new UserHelper();
            $relation[$key] = $getUser->getUserById($relation[$key]->friend_id);
        }       
        return $relation;
    }
    public function getFans($id){
        $relation = Relationship::where('friend_id','=',$id)->get();
        foreach ($relation as $key => $user) {
            $getUser = new UserHelper();
            $relation[$key] = $getUser->getUserById($relation[$key]->user_id);
        }
        return $relation;
    }
}

?>
