<?php

class StoreController extends YoloveController {

    public function getStoresByUser() {
        $page = Input::get('page');
        $id = Input::get('id');
        $limit = (Input::get('limit')) ? (Input::get('limit')) : null;
        $lastStore = (Input::get('lastStore')) ? (Input::get('lastStore')) : null;
        $offset = (Input::get('offset')) ? (Input::get('offset')) : null;
        $stores = new StoreHelper();
        $stores = $stores->getFavoriteStore($id, $limit, $lastStore, $offset);
        if (count($stores)) {
            $stores = $this->getUserLikedStore($stores);
            $lastStore = $stores[count($stores) - 1]->id;
            return View::make('user.store.user_store', array('stores' => $stores, 'lastStore' => $lastStore, 'page' => $page, 'response' => $this->_response));
        }
    }

    public function showStores() {
        $this->siteTitle = "Store List";
        return View::make('user.store.stores', array('response' => $this->_response, 'siteTitle' => $this->siteTitle));
    }

    public function getAllStores() {
        $limit = (Input::get('limit')) ? (Input::get('limit')) : null;
        $lastStore = (Input::get('lastStore')) ? (Input::get('lastStore')) : null;
        $offset = (Input::get('offset')) ? (Input::get('offset')) : null;
        $stores = new StoreHelper();
        $stores = $stores->getAllStores($limit, $lastStore, $offset);
        if (count($stores)) {
            $stores = $this->getUserLikedStore($stores);
            $lastStore = $stores->last()->id;
            return View::make('user.store.user_store', array('stores' => $stores, 'lastStore' => $lastStore, 'response' => $this->_response));
        }
    }

    public function getStoreById($id) {
        $helper = new StoreHelper();
        $store = $helper->getStoreById($id);
        $isLike = FALSE;
        if ($this->islogin) {
            $likeStore = FavoriteStore::where('user_id', '=', $this->cuser['uid'])->where('store_id', '=', $id)->get();
            if (count($likeStore)) {
                $isLike = TRUE;
            }
        }
        $store->isLike = $isLike;
        $this->siteTitle = $store->store_name . " Store";
        return View::make('user.store.store_products', array('response' => $this->_response, 'id' => $id, 'store' => $store, 'siteTitle' => $this->siteTitle));
    }

    public function showUserStores($id, $name) {
        $userInfo = new UserHelper();
        $userInfo = $userInfo->getUserProfile($id);
        $this->siteTitle = $userInfo->nickname . "'s Favorite Stores";
        return View::make('user.store.profileStore', array('response' => $this->_response, 'userInfo' => $userInfo, 'id' => $id, 'name' => $name, 'siteTitle' => $this->siteTitle));
    }

    public function getUserLikedStore($stores) {
        $product = new ProductsHelper();
        foreach ($stores as $key => $store) {
            $items = array();
            $isLike = FALSE;
            $isOwner = FALSE;
            if ($this->islogin) {
                $likeStore = FavoriteStore::where('user_id', '=', $this->cuser['uid'])->where('store_id', '=', $store->id)->get();
                if (count($likeStore)) {
                    $isLike = TRUE;
                }
                if ($this->cuser['uid'] == $store->user_id) {
                    $isOwner = TRUE;
                }
            }
            $stores[$key]->isLike = $isLike;
            $stores[$key]->isOwner = $isOwner;
            $newShares = Share::where('store_id', '=', $store->id)->orderBy('id', "DESC")->take(6)->select('id')->get();
            foreach ($newShares as $share) {

                $item = $product->getById($share->id);
                $items[] = $item["item"]["image_large"];
            }
            $Shares = Share::where('store_id', '=', $store->id)->orderBy('id', "DESC")->select('id')->get();
            if (count($Shares)) {
                $stores[$key]->total_products = count($Shares);
            }

            if (count($items)) {
                $stores[$key]->productsImage = $items;
            }
        }
        return $stores;
    }

    public function editStore($id = NULL) {
        if (!$this->islogin) {
            return Redirect::to('/login');
        } else {
            $storeHelper = new StoreHelper();
            $storeData = $storeHelper->getStoreById($id);
            $userinfo = new UserHelper();
            $userinfo = $userinfo->getUserProfile($this->cuser['uid']);
            if (!empty($storeData)) {
                if ($this->cuser['uid'] == $storeData->user_id || $this->isadmin) {
                    return View::make('user.store.edit_store', array('store' => $storeData, 'response' => $this->_response, 'userInfo' => $userinfo));
                } else {
                    return Redirect::to('/');
                }
            } else {
                return Redirect::to('/');
            }
        }
    }

    public function updateStore() {
        if (!$this->islogin) {
            return Redirect::to('/login');
        } else {
            $input = Input::all();
            $helper = new StoreHelper();
            $storeData = $helper->getStoreById($input['id']);
            if (!empty($storeData)) {
                if ($this->cuser['uid'] == $storeData->user_id || $this->isadmin) {
                    $claimStore = $helper->registerStore($input);
                    if (!empty($claimStore)) {
                        return $claimStore;
                    }
                } else {
                    return Redirect::to('/');
                }
            } else {
                return Redirect::to('/');
            }
        }
    }

    public function deleteStore() {
        if (!$this->islogin) {
            return Redirect::to('/login');
        } else {
            $input = Input::all();
            $storeHelper = new StoreHelper();
            $storeData = $storeHelper->getStoreById($input['storeid']);
            if (!empty($storeData)) {
                if ($this->cuser['uid'] == $storeData->user_id || $this->isadmin) {
                    $storeHelper->deleteStore($input['storeid']);
                } else {
                    return Redirect::to('/');
                }
            } else {
                return Redirect::to('/');
            }
        }
    }

    public function registerStore($id) {
        if (!$this->islogin) {
            return Redirect::to('/login');
        } else {
            $helper = new StoreHelper();
            $store = $helper->getStoreById($id);
            if (!$store->isregister) {
                return View::make('user.store.store_register', array('response' => $this->_response, 'store' => $store));
            }
        }
    }

    public function claimStore() {
        if (!$this->islogin) {
            return Redirect::to('/login');
        } else {
            $input = Input::all();
            $helper = new StoreHelper();
            $claimStore = $helper->registerStore($input, $this->cuser);
            if (!empty($claimStore)) {
                return $claimStore;
            }
        }
    }

    public function getCollectionByStore() {
        $id = Input::get('id');
        $limit = (Input::get('limit')) ? (Input::get('limit')) : null;
        $lastAlbum = (Input::get('lastAlbum')) ? (Input::get('lastAlbum')) : null;
        $helper = new AlbumsHelper();
        $collections = $helper->getAlbumsByStore($id, $limit, $lastAlbum);
//        echo "<pre>";print_r($collections);die();
        if (count($collections)) {
            $collections = $helper->getUserLikedCollection($collections);
            $lastAlbum = $collections[count($collections) - 1]->id;
            return View::make('user.collection.user_collection', array('collections' => $collections, 'lastAlbum' => $lastAlbum, 'response' => $this->_response));
        }
    }

    public function getStatisticsByStore($id) {


        $helper = new StoreHelper();

        $item = $helper->getItemLike($id);
        $collection = $helper->getCollectionLike($id);
        $order = $helper->getTotalOrder($id);
        $profit = $helper->getGrossProfit($id);
        $profit1 = $helper->getThisWeekProfit($id);
        $profit2 = $helper->getLastWeekProfit($id);
        $comparison = $helper->getComparison($id);


        return View::make('user.store.storestat', array('item' => $item, 'collection' => $collection, 'order' => $order, 'profit' => $profit, 'profit1' => $profit1, 'profit2' => $profit2, 'comparison' => $comparison));
    }

    public function showStoreProductInfo() {
        $id = Input::get('id');
        $helper = new StoreHelper();
        $store = $helper->getProductByStore($id);

        //print_r($store);die;
        return view::make('user.store.show_product_info', array('store' => $store));
    }

    public function saveStoreStatus() {
        $id = Input::get("idVal");
        $status = Input::get("status");
        $storeProducts = ShippingProduct::find($id);
        $storeProducts->status = $status;
        $storeProducts->save();

        return $storeProducts;
    }

}

?>
