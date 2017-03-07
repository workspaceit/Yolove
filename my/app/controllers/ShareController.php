<?php

class ShareController extends YoloveController {

    public function imageFetch() {
        if (!$this->islogin) {
            return Redirect::to('/login');
        } else {
            $input = Input::all();
            $remote_url = trim(Input::get('fetch'));
            $share = new ShareHelper();
            $data = $share->fetchUrl($remote_url);
            if (isset($input['links'])) {
                $input['links'] = unserialize($input['links']);
                $images[]['imageurl'] = $input['links'][0]['src'];
                $data['images'] = $images;
            }
            $album = new AlbumsHelper();
            if ($this->isadmin) {
                $collections = $album->getAllAlbums();
            } else {
                $collections = $album->getAlbumsByUser($this->cuser['uid']);
            }
            $data['collection'] = $collections;
            $this->siteTitle = "Share Product";
            return View::make('user.share.shareProduct', array('response' => $this->_response, 'data' => $data, 'siteTitle' => $this->siteTitle));
        }
    }

    public function postProduct() {
        if (!$this->islogin) {
            return Redirect::to('/login');
        } else {
            $input = Input::all();
            $rules = array(
                'reference_url' => 'required|unique:item',
            );
            $validator = Validator::make($input, $rules);
            if ($validator->fails()) {
                $message = "This product is already Posted";
                return $this->ajax_failed_response($message);
            } else {
                $post = new ShareHelper();
                $shareProduct = $post->PostProduct($input, $this->cuser);
                if (!empty($shareProduct)) {
                    $message = "Product Posted Successfully";
                    return $this->ajax_success_response($shareProduct, $message);
                } else {
                    $message = "Product Posted unseccessfull";
                    return $this->ajax_failed_response($message);
                }
            }
        }
    }

    public function editProduct($id) {
        if (!$this->islogin) {
            return Redirect::to('/login');
        } else {
            $itemHelper = new ProductsHelper();
            $share = $itemHelper->getById($id);

            $itemSize = ItemSize::where('item_id', '=', $id)->get();

            $album = new AlbumsHelper();
            if ($this->isadmin) {
                $collections = $album->getAllAlbums();
            } else {
                $collections = $album->getAlbumsByUser($this->cuser['uid']);
            }
            if (!empty($share)) {
                if ($this->cuser['uid'] == $share['user_id'] || $this->isadmin) {
                    return View::make('user.share.editProduct', ['response' => $this->_response, 'share' => $share, 'collections' => $collections, 'itemSize' => $itemSize]);
                } else {
                    return Redirect::to('/');
                }
            } else {
                return Redirect::to('/');
            }
        }
    }

    public function updateProductInfo() {
        if (!$this->islogin) {
            return Redirect::to('/login');
        } else {
            $input = Input::all();
            $edit = new ShareHelper();
            $itemHelper = new ProductsHelper();
            $item = $itemHelper->getById($input['id']);
            if (!empty($item)) {
                if ($this->cuser['uid'] == $item['user_id'] || $this->isadmin) {
                    $share = $edit->updateProduct($input, $this->cuser);
                    if (!empty($share)) {
                        $message = "Product edited Successfully";
                        return $this->ajax_success_response($share, $message);
                    } else {
                        $message = "Product edited unseccessfull";
                        return $this->ajax_failed_response($message);
                    }
                } else {
                    return Redirect::to('/');
                }
            } else {
                return Redirect::to('/');
            }
        }
    }

}

?>
