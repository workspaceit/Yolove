<?php

class ActivityController extends YoloveController {

    public function likeProduct() {
        if (!$this->islogin) {
            return Redirect::to('/login');
        } else {
            $input = Input::all();
            $activity = new ActivityHelper();
            $activity = $activity->likeProduct($input, $this->cuser);
            return $activity;
        }
    }

    public function likeAlbum() {
        if (!$this->islogin) {
            return Redirect::to('/login');
        } else {
            $input = Input::all();
            $activity = new ActivityHelper();
            $activity = $activity->likeAlbum($input, $this->cuser);
            return $activity;
        }
    }

    public function likeStore() {
        if (!$this->islogin) {
            return Redirect::to('/login');
        } else {
            $input = Input::all();
            $activity = new ActivityHelper();
            $activity = $activity->likeStore($input, $this->cuser);
            return $activity;
        }
    }

    public function unlikeProduct() {
        if (!$this->islogin) {
            return Redirect::to('/login');
        } else {
            $input = Input::all();
            $activity = new ActivityHelper();
            $activity = $activity->unlikeProduct($input, $this->cuser);
        }
    }

    public function unlikeAlbum() {
        if (!$this->islogin) {
            return Redirect::to('/login');
        } else {
            $input = Input::all();
            $activity = new ActivityHelper();
            $activity = $activity->unlikeAlbum($input, $this->cuser);
        }
    }

    public function unlikeStore() {
        if (!$this->islogin) {
            return Redirect::to('/login');
        } else {
            $input = Input::all();
            $activity = new ActivityHelper();
            $activity = $activity->unlikeStore($input, $this->cuser);
            return $activity;
        }
    }

//    public function old_showAllNotifications() {
//        $userinfo = new UserHelper();
//        $userinfo = $userinfo->getUserProfile($this->cuser['uid']);
//        $helper = new ActivityHelper();
//        $allActivity = $helper->getAllActivityByUser($this->cuser['uid']);
//        foreach ($allActivity as $key => $activity) {
//            $allActivity[$key]->differ = $helper->TimeDifference($activity->create_time);
//        }
//        return View::make('user.activity.notifications', array('notifications' => $allActivity, 'response' => $this->_response, 'userInfo' => $userinfo));
//    }

    public function showAllNotifications() {
        if (!$this->islogin) {
            return Redirect::to('/login');
        } else {
            $userinfo = new UserHelper();
            $userinfo = $userinfo->getUserProfile($this->cuser['uid']);
            $this->siteTitle = $userinfo->nickname . "'s" . " Notifications";
            return View::make('user.activity.notifications', array('response' => $this->_response, 'userInfo' => $userinfo, 'siteTitle' => $this->siteTitle));
        }
    }

    public function getAllNotifications() {
        if (!$this->islogin) {
            return Redirect::to('/login');
        } else {
            $userinfo = new UserHelper();
            $userinfo = $userinfo->getUserProfile($this->cuser['uid']);
            $helper = new ActivityHelper();
            $input = Input::all();
            if (isset($input['last_id'])) {
                $allActivity = $helper->getAllActivityByUser($this->cuser['uid'], $input['last_id']);
            } else {
                $allActivity = $helper->getAllActivityByUser($this->cuser['uid']);
            }
            if (count($allActivity)) {
                $lastid = $allActivity[count($allActivity) - 1]->id;
                $productsTitle = new ProductsHelper();
                foreach ($allActivity as $key => $activity) {
                    $allActivity[$key]->differ = $helper->TimeDifference($activity->create_time);
                    $allActivity[$key]->slugTitle = $productsTitle->createSlug($activity->act_title);
                }
                return View::make('user.activity.getAllNotifications', array('lastid' => $lastid, 'notifications' => $allActivity, 'response' => $this->_response, 'userInfo' => $userinfo));
            }
        }
    }

    public function showNotifications($name) {
        if (!$this->islogin) {
            return Redirect::to('/login');
        } else {
            $userinfo = new UserHelper();
            $userinfo = $userinfo->getUserProfile($this->cuser['uid']);
            $this->siteTitle = $userinfo->nickname . "'s" . " Notifications";
            if ($name == "likes") {
                return View::make('user.activity.allLikes', array('response' => $this->_response, 'userInfo' => $userinfo, 'siteTitle' => $this->siteTitle));
            } elseif ($name == "comments") {
                return View::make('user.activity.allComments', array('response' => $this->_response, 'userInfo' => $userinfo, 'siteTitle' => $this->siteTitle));
            }
        }
    }

    public function getNotifications($name) {
        if (!$this->islogin) {
            return Redirect::to('/login');
        } else {
            $userinfo = new UserHelper();
            $userinfo = $userinfo->getUserProfile($this->cuser['uid']);
            $helper = new ActivityHelper();
            $input = Input::all();
            if ($name == "likes") {
                if (isset($input['last_id'])) {
                    $allActivity = $helper->getLikeActivityByUser($this->cuser['uid'], $input['last_id']);
                } else {
                    $allActivity = $helper->getLikeActivityByUser($this->cuser['uid']);
                }
            } elseif ($name == "comments") {
                if (isset($input['last_id'])) {
                    $allActivity = $helper->getCommentActivityByUser($this->cuser['uid'], $input['last_id']);
                } else {
                    $allActivity = $helper->getCommentActivityByUser($this->cuser['uid']);
                }
            }
            if (count($allActivity)) {
                $lastid = $allActivity[count($allActivity) - 1]->id;
                $productsTitle = new ProductsHelper();
                foreach ($allActivity as $key => $activity) {
                    $allActivity[$key]->differ = $helper->TimeDifference($activity->create_time);
                    $allActivity[$key]->slugTitle = $productsTitle->createSlug($activity->act_title);
                }
                return View::make('user.activity.getAllNotifications', array('lastid' => $lastid, 'notifications' => $allActivity, 'response' => $this->_response, 'userInfo' => $userinfo));
            }
        }
    }

    public function followUser() {
        if (!$this->islogin) {
            return Redirect::to('/login');
        } else {
            $input = Input::all();
            //print_r($input);
            $relation = new RelationHelper();
            $activity = $relation->followUser($input['id'], $this->cuser['uid']);
            return $activity;
        }
    }

    public function unfollowUser() {
        if (!$this->islogin) {
            return Redirect::to('/login');
        } else {
            $input = Input::all();
            //print_r($input);
            $relation = new RelationHelper();
            $activity = $relation->unfollowUser($input['id'], $this->cuser['uid']);
            return $activity;
        }
    }

    public function readNotification() {
        $input = Input::all();
        $actvity = new ActivityHelper();
        $actvity->readNotification($input['activity']);
        return count($this->_response['notifications']);
    }

    public function commentDelete() {
        if (!$this->islogin) {
            return Redirect::to('/login');
        } else {
            $id = Input::get('comment_id');
            $comment = new CommentHelper();
            $comment->deleteComment($id);
        }
    }

    public function getLastComment() {
        if (!$this->islogin) {
            return Redirect::to('/login');
        } else {
            $comment = new CommentHelper();
            $lastComment = $comment->getLatestCommentByUser($this->cuser['uid']);
            if (!empty($lastComment)) {
                return View::make('user.activity.addComment', array('comment' => $lastComment, 'response' => $this->_response));
            }
        }
    }

}

?>
