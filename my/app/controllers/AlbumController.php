<?php

class AlbumController extends YoloveController {

    public function showCollection($id, $name) {
        $userInfo = new UserHelper();
        $userInfo = $userInfo->getUserProfile($id);
        $this->siteTitle = $userInfo->nickname . "'s Album";
        return View::make('user.collection.profileCollection', array('response' => $this->_response, 'userInfo' => $userInfo, 'id' => $id, 'name' => $name, 'siteTitle' => $this->siteTitle));
    }

    public function getCollectionsByUser() {
        $page = Input::get('page');
        $id = Input::get('id');
        $album = new AlbumsHelper();
        $limit = (Input::get('limit')) ? (Input::get('limit')) : null;
        $lastAlbum = (Input::get('lastAlbum')) ? (Input::get('lastAlbum')) : null;
        $collections = $album->getAlbumsByUser($id, $limit, $lastAlbum);
        if (count($collections)) {
            $collections = $album->getUserLikedCollection($collections);
            $lastAlbum = $collections->last()->id;
            return View::make('user.collection.user_collection', array('collections' => $collections, 'lastAlbum' => $lastAlbum, 'page' => $page, 'response' => $this->_response));
        }
    }

    public function getCollectionById($id) {
        $helper = New AlbumsHelper();
        $album = $helper->getAlbumById($id);
        if (!empty($album)) {
            $isLike = FALSE;
            $isOwner = FALSE;
            if ($this->islogin) {
                $likeAlbum = Activity::where('user_id', '=', $this->cuser['uid'])->where('act_code', '=', 'addlikealbum')->where('rel_id', '=', $id)->get();
                if (count($likeAlbum)) {
                    $isLike = TRUE;
                }
                if ($album->user_id == $this->cuser['uid']) {
                    $isOwner = TRUE;
                }
            }
            $album->isLike = $isLike;
            $album->isOwner = $isOwner;
            $albumUser = User::find($album->user_id);
            $this->siteTitle = $album->album_title . ' ' . $albumUser->nickname . "'s" . " detail of album";
            return View::make('user.collection.collection_products', array('response' => $this->_response, 'id' => $id, 'album' => $album, 'siteTitle' => $this->siteTitle));
        }
    }

    public function showAllCollections() {
        $official_softname = app('official_softname');
        $this->siteTitle = $official_softname . " - The fashion collection that you can't miss Album";
        return View::make('user.collection.collections', array('response' => $this->_response, 'siteTitle' => $this->siteTitle));
    }

    public function getAllCollections() {
        $limit = (Input::get('limit')) ? (Input::get('limit')) : null;
        $lastAlbum = (Input::get('lastAlbum')) ? (Input::get('lastAlbum')) : null;
        $offset = (Input::get('offset')) ? (Input::get('offset')) : null;
        $album = new AlbumsHelper();
        $collections = $album->getAllAlbums($limit, $lastAlbum, $offset);
        if (count($collections)) {
            $collections = $album->getUserLikedCollection($collections);
            $lastAlbum = $collections->last()->id;
            return View::make('user.collection.user_collection', array('collections' => $collections, 'lastAlbum' => $lastAlbum, 'response' => $this->_response));
        }
    }

    public function deleteAlbum() {
        if (!$this->islogin) {
            return Redirect::to('/login');
        } else {
            $input = Input::all();
            $albumHelper = new AlbumsHelper();
            $albumData = $albumHelper->getAlbumById($input['albumid']);
            if (!empty($albumData)) {
                if ($this->cuser['uid'] == $albumData->user_id || $this->isadmin) {
                    $albumHelper->deleteAlbum($input['albumid']);
                } else {
                    return Redirect::to('/');
                }
            } else {
                return Redirect::to('/');
            }
        }
    }

    public function editAlbum($id = NULL) {
        if (!$this->islogin) {
            return Redirect::to('/login');
        } else {
            $albumHelper = new AlbumsHelper();
            $albumData = $albumHelper->getAlbumById($id);
            $userinfo = new UserHelper();
            $userinfo = $userinfo->getUserProfile($this->cuser['uid']);
            if (!empty($albumData)) {
                if ($this->cuser['uid'] == $albumData->user_id || $this->isadmin) {
                    return View::make('user.collection.edit_collection', array('album' => $albumData, 'response' => $this->_response, 'userInfo' => $userinfo));
                } else {
                    return Redirect::to('/');
                }
            } else {
                return Redirect::to('/');
            }
        }
    }

    public function updateCollection() {
        if (!$this->islogin) {
            return Redirect::to('/login');
        } else {
            $input = Input::all();
            $albumHelper = new AlbumsHelper();
            $albumData = $albumHelper->getAlbumById($input["id"]);
            if (!empty($albumData)) {
                if ($this->cuser['uid'] == $albumData->user_id || $this->isadmin) {
                    $albumHelper->updateAlbum($input["id"], $input);
                    return Redirect::to('/collection/' . $input["id"]);
                } else {
                    return Redirect::to('/');
                }
            } else {
                return Redirect::to('/');
            }
        }
    }

    public function createAlbum() {
        $input = Input::all();
        $albumHelper = new AlbumsHelper();
        $collection = $albumHelper->createAlbum($input, $this->cuser);
        if ($collection == "This Album Already Exist in your Profile") {
            if (isset($input['createCollection'])) {
                return Redirect::back()->withInput()->with('existAlbum', $collection);
            } else {
                return $collection;
            }
        } else {
            if (isset($input['createCollection'])) {
                return Redirect::to('/collection/' . $collection->id);
            } else {
                $helper = new CategoryHelper();
                $collection->category = $helper->getCategoryById($collection->category_id);
                return $collection;
            }
        }
    }

}

?>
