<?php

class AlbumsHelper extends YoloveController {

    public function getAllAlbums($limit = null, $lastAlbum = null, $offset = null) {
        if ($limit && $lastAlbum) {
            $albums = Album::where('album_title','!=','Wish List')->orderBy('update_time', 'DESC')->offset($offset)->take($limit)->get();
        } elseif ($limit) {
            $albums = Album::where('album_title','!=','Wish List')->orderBy('update_time', 'DESC')->take($limit)->get();
        } else {
            $albums = Album::where('album_title','!=','Wish List')->orderBy('update_time', 'DESC')->get();
        }
        if (count($albums)) {
            $helper = new CategoryHelper();
            foreach ($albums as $key => $album) {
                $albums[$key]->category = $helper->getCategoryById($album->category_id);
            }
        }
        return $albums;
    }

    public function getAlbumById($id) {
        $album = Album::find($id);
        $helper = new ProductsHelper();
        $album->slugTitle = $helper->createSlug($album->album_title);
        return $album;
    }

    public function getAlbumsByCategory($cat_id) {
        $album = Album::where('category_id', '=', $cat_id)->get();
        return $album;
    }

    public function getAlbumsByUser($userId, $limit = null, $lastAlbum = null) {
        if ($limit && $lastAlbum) {
            $albums = Album::orderBy('id', 'DESC')->where('user_id', '=', $userId)->where('id', '<', $lastAlbum)->take($limit)->get();
        } elseif ($limit) {
            $albums = Album::orderBy('id', 'DESC')->where('user_id', '=', $userId)->take($limit)->get();
        } else {
            $albums = Album::orderBy('id', 'DESC')->where('user_id', '=', $userId)->get();
        }
        if (count($albums)) {
            $helper = new CategoryHelper();
            foreach ($albums as $key => $album) {
                $albums[$key]->category = $helper->getCategoryById($album->category_id);
            }
        }
        return $albums;
    }

    public function getAlbumsByStore($storeId, $limit = null, $lastAlbum = null) {
        if ($limit && $lastAlbum) {
//            $product = DB::table('share')
//                    ->join('album', 'album.id', '=', 'share.album_id')
//                    ->where('share.store_id', '=', $storeId)
//                    ->where('album.id', '<', $lastAlbum)
//                    ->orderBy('album.id', 'DESC')
//                    ->take($limit)
//                    ->select('share.*')
//                    ->get();
            //print_r($product);die();
            $product = Share::where('store_id', '=', $storeId)->where('id', '<', $lastAlbum)->take($limit)->get();
        } elseif ($limit) {
//            $product = DB::table('share')
//                    ->join('album', 'album.id', '=', 'share.album_id')
//                    ->where('share.store_id', '=', $storeId)
//                    ->orderBy('album.id', 'DESC')
//                    ->take($limit)
//                    ->select('share.*')
//                    ->get();
            $product = Share::where('store_id', '=', $storeId)->take($limit)->get();
        } else {
//            $product = DB::table('share')
//                    ->join('album', 'album.id', '=', 'share.album_id')
//                    ->where('share.store_id', '=', $storeId)
//                    ->orderBy('album.id', 'DESC')
//                    ->select('share.*')
//                    ->get();
            $product = Share::where('store_id', '=', $storeId)->get();
        }
        //print_r($product);die();
        if (count($product)) {
            foreach ($product as $key => $h) {
                $album_id[$key] = $h->album_id;
            }
            $unique_album = array_unique($album_id);
            if (count($unique_album)) {


                //$collections = new Album();
                foreach ($unique_album as $key => $album) {
                    $collections[] = Album::find($album);

                    //$collections[$key] = $this->getAlbumById($album);
                }
                //print_r($collections[0]->id);die();
            }
            //print_r($unique_album);die();
            return $collections;
        }
    }

    public function getUserLikedCollection($collections) {
        $product = new ProductsHelper();
        foreach ($collections as $key => $collection) {
            $items = array();
            $isLike = FALSE;
            $isOwner = FALSE;
            if ($this->islogin) {
                $likeAlbum = Activity::where('user_id', '=', $this->cuser['uid'])->where('act_code', '=', 'addlikealbum')->where('rel_id', '=', $collection->id)->get();
                if (count($likeAlbum)) {
                    $isLike = TRUE;
                }
                if ($collection->user_id == $this->_response['cuser']['uid']) {
                    $isOwner = TRUE;
                }
            }
            $collections[$key]->isLike = $isLike;
            $newShares = Share::where('album_id', '=', $collection->id)->orderBy('id', "DESC")->take(4)->select('id')->get();
            foreach ($newShares as $share) {

                $item = $product->getById($share->id);
                
                $items[] = $item["item"]["image_large"];
            }
            
            
            if (count($items)) {
                $collections[$key]->productsImage = $items;
            }
            $collections[$key]->isOwner = $isOwner;
            $allShares = Share::where('album_id', '=', $collection->id)->orderBy('id', "DESC")->select('id')->get();
            $collections[$key]->itemCount = count($allShares);
        } 

        return $collections;
    }

    public function createAlbum($input, $cuser) {
        $albumExist = Album::where('album_title', '=', $input['album_title'])->where('user_id', '=', $cuser['uid'])->get();
        if (count($albumExist)) {
            return "This Album Already Exist in your Profile";
        } else {
            $album = new Album();
            $album->category_id = $input['category_id'];
            $album->album_title = $input['album_title'];
            $album->album_desc = isset($input['album_desc']) ? $input['album_desc'] : "";
            $album->create_time = time();
            $album->update_time = time();
            $album->user_id = $cuser['uid'];
            $album->save();
            $user = User::find($cuser['uid']);
            $user->total_album = $user->total_album + 1;
            $user->save();
            if (isset($input['collection_image'])) {
                $api_server = app('api_server');
                $image = $input['collection_image'];
                $imageName = $image->getClientOriginalName();
                $file_extension = $image->getClientOriginalExtension();
                if ($file_extension) {
                    $file_name = $album->id . '_' . md5($album->album_title) . '';
                    $dir = '/uploads/attachments/collection/';
                    //$save_path = base_path() . $dir;
                    $save_path = $api_server . $dir;
                    $imageName = $file_name . '.' . $file_extension;
                    $file_path = $save_path . '/' . $imageName;
                    $image->move($save_path . '/', $imageName);
                    $avatar = Image::make($file_path)->resize(200, 150)->save($save_path . '/' . $file_name . '.' . 'jpg');
                }
            }
            return $album;
        }
    }

    public function updateAlbum($id, $input) {
        $album = Album::find($id);
        $album->category_id = $input['category_id'];
        $album->album_title = $input['album_title'];
        $album->album_desc = $input['album_desc'];
        $album->update_time = time();
        $album->save();
        if (isset($input['collection_image'])) {
            $api_server = app('api_server');
            $image = $input['collection_image'];
            $imageName = $image->getClientOriginalName();
            $file_extension = $image->getClientOriginalExtension();
            if ($file_extension) {
                $file_name = $album->id . '_' . md5($album->album_title) . '';
                $dir = '/uploads/attachments/collection/';
                //$save_path = base_path() . $dir;
                $save_path = $api_server . $dir;
                $imageName = $file_name . '.' . $file_extension;
                $file_path = $save_path . '/' . $imageName;
                $image->move($save_path . '/', $imageName);
                $avatar = Image::make($file_path)->resize(200, 150)->save($save_path . '/' . $file_name . '.' . 'jpg');
            }
        }
        return $album;
    }

    public function deleteAlbum($id) {
        $album = Album::find($id);
        $userId = $album->user_id;
        $shares = Share::where('album_id', '=', $album->id)->get();
        $favAlbum = $this->deleteFavoriteAlbum($album->id);
        foreach ($shares as $key => $share) {
            $deleteShares = new ShareHelper();
            $deleteShares = $deleteShares->deleteProduct($share->id);
        }
        $deleteAlbumActivity = new ActivityHelper();
        $deleteAlbumActivity = $deleteAlbumActivity->deleteAlbumActivity($id);
        $album->delete();
        $user = User::find($userId);
        if ($user->total_album != 0) {
            $user->total_album = $user->total_album - 1;
            $user->save();
        }
        return $album;
    }

    public function deleteFavoriteAlbum($id) {
        $favAlbum = FavoriteAlbum::where('album_id', '=', $id)->get();
        if ($favAlbum) {
            foreach ($favAlbum as $key => $fav) {
                $favAlbum[$key]->delete();
            }
        }
    }

    public function reduceAlbumShare($id) {
        $album = Album::find($id);
        if ($album->total_share != 0) {
            $album->total_share = $album->total_share - 1;
            $album->save();
        }
    }

}

?>
