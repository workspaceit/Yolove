<?php

class ActivityHelper {

    public function getAllActivity() {
        $activity = Activity::orderBy('id', 'DESC')->get();
        return $activity;
    }

    public function old_getActivityByUser($userId) {
        $activity = Activity::where('to_user_id', '=', $userId)->orderBy('id', 'DESC')->get();
        return $activity;
    }

    public function getAllActivityByUser($userId, $lastid = NULL) {
        if ($lastid) {
            $activity = DB::table('activity')->join('user', 'user.id', '=', 'activity.user_id')->where('activity.to_user_id', '=', $userId)->where('activity.id', '<', $lastid)->orderBy('activity.id', 'DESC')->select('user.email', 'user.nickname', 'activity.*')->take(20)->get();
        } else {
            $activity = DB::table('activity')->join('user', 'user.id', '=', 'activity.user_id')->where('activity.to_user_id', '=', $userId)->orderBy('activity.id', 'DESC')->select('user.email', 'user.nickname', 'activity.*')->take(20)->get();
        }
        return $activity;
    }

    public function getLikeActivityByUser($userId, $lastid = NULL) {
        if ($lastid) {
            $activity = DB::table('activity')->join('user', 'user.id', '=', 'activity.user_id')->where('activity.to_user_id', '=', $userId)->where('activity.id', '<', $lastid)
                            ->where(function($query) {
                                $query->where('activity.act_code', '=', 'addlike');
                                $query->orWhere('activity.act_code', '=', 'addlikealbum');
                            })
                            ->orderBy('activity.id', 'DESC')->select('user.email', 'user.nickname', 'activity.*')->take(20)->get();
        } else {
            $activity = DB::table('activity')->join('user', 'user.id', '=', 'activity.user_id')->where('activity.to_user_id', '=', $userId)
                            ->where(function($query) {
                                $query->where('activity.act_code', '=', 'addlike');
                                $query->orWhere('activity.act_code', '=', 'addlikealbum');
                            })
                            ->orderBy('activity.id', 'DESC')->select('user.email', 'user.nickname', 'activity.*')->take(20)->get();
        }
        return $activity;
    }

    public function getCommentActivityByUser($userId, $lastid = NULL) {
        if ($lastid) {
            $activity = DB::table('activity')->join('user', 'user.id', '=', 'activity.user_id')->where('activity.to_user_id', '=', $userId)->where('activity.id', '<', $lastid)->where('activity.act_code', '=', 'postcomment')->orderBy('activity.id', 'DESC')->select('user.email', 'user.nickname', 'activity.*')->take(20)->get();
        } else {
            $activity = DB::table('activity')->join('user', 'user.id', '=', 'activity.user_id')->where('activity.to_user_id', '=', $userId)->where('activity.act_code', '=', 'postcomment')->orderBy('activity.id', 'DESC')->select('user.email', 'user.nickname', 'activity.*')->take(20)->get();
        }
        return $activity;
    }

    public function getUnreadActivityByUser($userId) {
        $activity = DB::table('activity')->join('user', 'user.id', '=', 'activity.user_id')->where('activity.to_user_id', '=', $userId)->where('activity.user_id', '!=', $userId)->where('activity.is_read', '!=', 1)->orderBy('activity.id', 'DESC')->select('user.email', 'user.nickname', 'activity.*')->get();
        return $activity;
    }

    public function getActivityByUser($userId) {
        $activity = DB::table('activity')->join('user', 'user.id', '=', 'activity.user_id')->where('activity.to_user_id', '=', $userId)->where('activity.user_id', '!=', $userId)->where('activity.is_read', '!=', 1)->orderBy('activity.id', 'DESC')->select('user.email', 'user.nickname', 'activity.*')->take(5)->get();
        foreach ($activity as $act) {
            $user = User::find($act->user_id);
            if (!empty($user)) {
                if ($user->is_social) {
                    $socialInfo = Connector::where('user_id', '=', $user->id)->get();
                    $act->avatar = $socialInfo[0]->avatar;
                }
            }
        }
        return $activity;
    }

    public function getActivityById($id) {
        $activity = Activity::find($id);
        return $activity;
    }

    public function createActivity() {
        
    }

    public function deleteActivity($id) {
        $activity = Activity::where('rel_id', '=', $id)->get();
        if ($activity) {
            foreach ($activity as $key => $act) {
                if ($activity[$key]->act_code != "follow" || $activity[$key]->act_code != "addlikealbum") {
                    $activity[$key]->delete();
                }
            }
        }
    }

    public function deleteCommentActivity($id) {
        $activity = Activity::where('rel_id', '=', $id)->get();
        if ($activity) {
            foreach ($activity as $key => $act) {
                if ($activity[$key]->act_code == "postcomment") {
                    $activity[$key]->delete();
                }
            }
        }
    }

    public function deleteAlbumActivity($id) {
        $activity = Activity::where('rel_id', '=', $id)->get();
        if ($activity) {
            foreach ($activity as $key => $act) {
                if ($activity[$key]->act_code == "addlikealbum") {
                    $activity[$key]->delete();
                }
            }
        }
    }

    public function likeProduct($input, $cuser) {
        $share = Share::find($input['id']);
        if (!empty($share)) {
            $product = Item::find($share->item_id);
            $islike = Activity::where('user_id', '=', $cuser['uid'])->where('act_code', '=', 'addlike')->where('rel_id', '=', $input['id'])->get();
            if (count($islike)) {
                $islike[0]->message = "Already liked";
                return $islike[0];
            }
            if ($share->user_id == $cuser['uid']) {
                $share->message = "You Can't Love Your Own Item";
                return $share;
            }
            $activity = new Activity();
            $activity->user_id = $cuser['uid'];
            $activity->to_user_id = $product->user_id;
            $activity->act_code = "addlike";
            $activity->act_title = $product->title;
            $activity->create_time = time();
            $activity->rel_id = $input['id'];
            $activity->save();
            $activity->message = "You love this item";
            $favoriteShare = new FavoriteShare();
            $favoriteShare->user_id = $cuser['uid'];
            $favoriteShare->share_id = $input['id'];
            $favoriteShare->create_time = time();
            $favoriteShare->save();
            $share->total_like = $share->total_like + 1;
            $share->save();
            $user = User::find($cuser['uid']);
            $user->total_favorite_share = $user->total_favorite_share + 1;
            $user->save();
            $owner = User::find($product->user_id);
            if ($owner->like_item) {
                $user = User::find($cuser['uid']);
                $emaiData = array();
                $emaiData = array('user' => "<a style='text-decoration:none;color:#46BFC4' href=''>" . $user->nickname . " </a>", 'email' => $owner->email, 'collection' => " on Yolove.it", 'msg' => " Like Your Product ", 'subject' => " Mahedi Like your Product on Yolove.it ", 'see_post' => "<a style='text-decoration:none;background:#46BFC4;color:#fff;padding:5px 12px;font-weight:700;font-size:14px;border-radius:1px;-moz-border-radius:1px;-webkit-border-radius:1px;' href=''>See Product</a>", 'name' => $owner->nickname);
                $mail = new MailHelper();
                $mail = $mail->sendMail($emaiData);
            }
            return $activity;
        }
    }

    public function likeAlbum($input, $cuser) {
        $album = Album::find($input['id']);
        if (!empty($album)) {
            $islike = Activity::where('user_id', '=', $cuser['uid'])->where('act_code', '=', 'addlikealbum')->where('rel_id', '=', $input['id'])->get();
            if (count($islike)) {
                $islike->message = "already liked";
                return $islike[0];
            }
            if ($album->user_id == $cuser['uid']) {
                $album->message = "You Can't Like Your Own Album";
                return $album;
            }
            $activity = new Activity();
            $activity->user_id = $cuser['uid'];
            $activity->to_user_id = $album->user_id;
            $activity->act_code = "addlikealbum";
            $activity->act_title = $album->album_title;
            $activity->create_time = time();
            $activity->rel_id = $input['id'];
            $activity->save();
            $activity->message = "You Liked This Album";
            $favoriteAlbum = new FavoriteAlbum();
            $favoriteAlbum->user_id = $cuser['uid'];
            $favoriteAlbum->album_id = $input['id'];
            $favoriteAlbum->create_time = time();
            $favoriteAlbum->save();
            $album->total_like = $album->total_like + 1;
            $album->save();
            $user = User::find($cuser['uid']);
            $user->total_favorite_album = $user->total_favorite_album + 1;
            $user->save();
            $owner = User::find($album->user_id);
            if ($owner->like_collection) {
                $user = User::find($cuser['uid']);
                $emaiData = array();
                $emaiData = array('user' => "<a style='text-decoration:none;color:#46BFC4' href=''>" . $user->nickname . " </a>", 'email' => $owner->email, 'collection' => " on Yolove.it", 'msg' => " Like Your Album ", 'subject' => " Mahedi Like your Album on Yolove.it ", 'see_post' => "<a style='text-decoration:none;background:#46BFC4;color:#fff;padding:5px 12px;font-weight:700;font-size:14px;border-radius:1px;-moz-border-radius:1px;-webkit-border-radius:1px;' href=''>See Album</a>", 'name' => $owner->nickname);
                $mail = new MailHelper();
                $mail = $mail->sendMail($emaiData);
            }
            return $activity;
        }
    }

    public function unlikeAlbum($input, $cuser) {
        $album = Album::find($input['id']);
        if (!empty($album)) {
            $islike = Activity::where('user_id', '=', $cuser['uid'])->where('act_code', '=', 'addlikealbum')->where('rel_id', '=', $input['id'])->get();
            if (count($islike)) {
                $favoriteAlbum = FavoriteAlbum::where('user_id', '=', $cuser['uid'])->where('album_id', '=', $input['id'])->get();
                if (count($favoriteAlbum)) {
                    $favoriteAlbum[0]->delete();
                }
                $islike[0]->delete();
                if ($album->total_like != 0) {
                    $album->total_like = $album->total_like - 1;
                    $album->save();
                }
                $user = User::find($cuser['uid']);
                if ($user->total_favorite_album != 0) {
                    $user->total_favorite_album = $user->total_favorite_album - 1;
                    $user->save();
                }
            }
            return $islike[0];
        }
    }

    public function unlikeProduct($input, $cuser) {
        $share = Share::find($input['id']);
        if (!empty($share)) {
            $product = Item::find($share->item_id);
            $islike = Activity::where('user_id', '=', $cuser['uid'])->where('act_code', '=', 'addlike')->where('rel_id', '=', $input['id'])->get();
            if (count($islike)) {
                $favoriteShare = FavoriteShare::where('user_id', '=', $cuser['uid'])->where('share_id', '=', $input['id'])->get();
                if (count($favoriteShare)) {
                    $favoriteShare[0]->delete();
                }
                $islike[0]->delete();
                if ($share->total_like != 0) {
                    $share->total_like = $share->total_like - 1;
                    $share->save();
                }
                $user = User::find($cuser['uid']);
                if ($user->total_favorite_share != 0) {
                    $user->total_favorite_share = $user->total_favorite_share - 1;
                    $user->save();
                }
                $islike[0]->message = "You Unlike this Item";
                return $islike[0];
            }
        }
    }

    public function commentProduct($input, $cuser) {
        $share = Share::find($input['share_id']);
        $product = Item::find($share->item_id);
        $activity = new Activity();
        $activity->user_id = $cuser['uid'];
        $activity->to_user_id = $product->user_id;
        $activity->act_code = "postcomment";
        $activity->act_title = $product->title;
        $activity->create_time = time();
        $activity->rel_id = $input['share_id'];
        $activity->save();
        $share->total_comment = $share->total_comment + 1;
        $share->save();
        return $activity;
    }

    public function likeStore($input, $cuser) {
        $store = Store::find($input['id']);
        if (!empty($store)) {
            $islike = FavoriteStore::where('user_id', '=', $cuser['uid'])->where('store_id', '=', $input['id'])->get();
            if (count($islike)) {
                $islike->message = "already liked";
                return $islike[0];
            }
            $favStore = new FavoriteStore();
            $favStore->user_id = $cuser['uid'];
            $favStore->store_id = $input['id'];
            $favStore->create_time = time();
            $favStore->save();
            $favStore->message = "You are following ".$store->store_name;
            $store->total_like = $store->total_like + 1;
            $store->save();
            return $favStore;
        }
    }

    public function unlikeStore($input, $cuser) {
        $store = Store::find($input['id']);
        // print_r($store);die();
        if (!empty($store)) {
            $islike = FavoriteStore::where('user_id', '=', $cuser['uid'])->where('store_id', '=', $input['id'])->get();
            if (count($islike)) {
                $islike[0]->delete();
                $store->total_like = $store->total_like - 1;
                $store->save();
                $islike[0]->message = "You are Unfollowing ".$store->store_name;
            }
            return $islike[0];
        }
    }

    public function TimeDifference($timpstamp) {
        $date1 = new DateTime(date("Y-m-d H:i:s", $timpstamp));
        $date2 = new DateTime(date("Y-m-d H:i:s"));
        $interval = $date1->diff($date2);
        $difference = "";
        if ($interval->d < 1) {
            if ($interval->h > 0) {
                $difference.= $interval->h . " hours ";
            } elseif ($interval->i > 0) {
                $difference.= $interval->i . " minitues ";
            } elseif ($interval->s >= 0) {
                $difference.= $interval->s . " seconds ";
            } 
//            if ($interval->d > 0) {
//                $difference.= $interval->d . " days ";
//            }
//            if ($interval->h > 0) {
//                $difference.= $interval->h . " hours ";
//            }
//            if ($interval->i > 0) {
//                $difference.= $interval->i . " minitues ";
//            }
//            if ($interval->s > 0) {
//                $difference.= $interval->s . " seconds ";
//            }
            $difference.= "ago ";
        } else {
            if ($interval->d < 7) {
                $difference.= $interval->d . " days ago ";
            } else {
                $difference = date('M j, Y', $timpstamp);
            }
        }

        return $difference;
    }

    public function readNotification($activity) {
        $ac = Activity::find($activity);
        $ac->is_read = 1;
        $ac->save();
    }

}

?>
