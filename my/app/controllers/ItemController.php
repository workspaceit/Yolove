<?php

class ItemController extends YoloveController {

    public function getAllItems() {
        $items = new ProductsHelper();
        $limit = (Input::get('limit')) ? (Input::get('limit')) : '';
        $lastProduct = (Input::get('lastProduct')) ? (Input::get('lastProduct')) : null;
        $items = $items->getAllProducts($limit, $lastProduct);
        if (count($items)) {
            $items = $this->getUserLikes($items);
            $lastProduct = $items->last()->id;
            return View::make('user.items.product', array('items' => $items, 'lastProduct' => $lastProduct, 'response' => $this->_response));
        }
    }

    public function getBestSellersItems() {
        $items = new ProductsHelper();
        $limit = (Input::get('limit')) ? (Input::get('limit')) : '20';
        $lastProduct = (Input::get('lastProduct')) ? (Input::get('lastProduct')) : null;
        $offset = (Input::get('offset')) ? (Input::get('offset')) : null;
        $items = $items->getBestSellersProducts($limit, $offset);
        if (count($items)) {
            $items = $this->getUserLikes($items);
            //$lastProduct = $items[count($items) - 1]->id;
            return View::make('user.items.product', array('items' => $items, 'response' => $this->_response));
        }
    }

    public function getMixItems() {
        $items = new ProductsHelper();
        $limit = (Input::get('limit')) ? (Input::get('limit')) : '20';
        $items = $items->getMixUpProducts($limit);
        if (count($items)) {
            $items = $this->getUserLikes($items);
            //$lastProduct = $items[count($items) - 1]->id;
            return View::make('user.items.product', array('items' => $items, 'response' => $this->_response));
        }
    }
    public function getNewItems() {
        $items = new ProductsHelper();
        $limit = (Input::get('limit')) ? (Input::get('limit')) : '20';
        $items = $items->getNewProducts($limit);
        if (count($items)) {
            $items = $this->getUserLikes($items);
            //$lastProduct = $items[count($items) - 1]->id;
            return View::make('user.items.product', array('items' => $items, 'response' => $this->_response));
        }
    }
    public function getBeautyItems() {
        $items = new ProductsHelper();
        $limit = (Input::get('limit')) ? (Input::get('limit')) : null;
        $lastProduct = (Input::get('lastProduct')) ? (Input::get('lastProduct')) : null;
        $category = 30;
        $items = $items->getProductsByFiltering($category, null, null, $limit, $lastProduct);
        if (count($items)) {
            $items = $this->getUserLikes($items);
            $lastProduct = $items[count($items) - 1]->id;
            return View::make('user.items.product', array('items' => $items, 'lastProduct' => $lastProduct, 'response' => $this->_response));
        }
    }

    public function getUnderPrice() {
        $items = new ProductsHelper();
        $limit = (Input::get('limit')) ? (Input::get('limit')) : null;
        $offset = (Input::get('offset')) ? (Input::get('offset')) : null;
        $underPrice = (Input::get('underPrice')) ? (Input::get('underPrice')) : null;
        $items = $items->getProductsUnder($limit, $offset, $underPrice);
        if (count($items)) {
            $items = $this->getUserLikes($items);
            //$lastProduct = $items[count($items) - 1]->id;
            return View::make('user.items.product', array('items' => $items, 'response' => $this->_response));
        }
    }

    public function itemDetails($id = null) {
        if (Input::get('id')) {
            $id = Input::get('id');
        }
        $nextProduct = '';
        $prevProduct = '';
        $product = new ProductsHelper();
        $item = $product->getById($id);
        $limit = 20;
        $lastProduct = null;
        $similarItems = $product->getProductsByUser($item['user_id'], $limit, $lastProduct, $id);
        if (count($similarItems)) {
            $similarItems = $this->getUserLikes($similarItems);
            $lastProduct = $similarItems->last()->id;
        }
        $nextProduct = $product->getNextProduct($item['id']);
        $prevProduct = $product->getPrevProduct($item['id']);
        if (!empty($nextProduct)) {
            $nextProduct->slugTitle = $product->createSlug($nextProduct->item->title);
        }
        if (!empty($prevProduct)) {
            $prevProduct->slugTitle = $product->createSlug($prevProduct->item->title);
        }
        $item['item']['slugTitle'] = $product->createSlug($item['item']['title']);
        $item['total_click'] = $product->addviewnum($item['id']);
        $item['socialButton'] = $product->getSocialButton();
        $activity = new ActivityHelper();
        $item = $this->getSingleProductLike($item);
        $item['dif'] = $activity->TimeDifference($item['create_time']);
        $getuser = new UserHelper();
        $followUser = array();
        if ($this->islogin) {
            $userinfo = $getuser->getUserProfile($this->cuser['uid']);
            $i = 0;
            foreach ($userinfo->followings as $following) {
                $followUser[$i] = $following['id'];
                $i++;
            }
        }
        $this->siteTitle = $item['item']['title'] . ' ' . $item['details'][0]->category_name_cn . ' Detail Page';
        return View::make('user.items.itemDetails', array('item' => $item, 'response' => $this->_response, 'similarItems' => $similarItems, 'lastProduct' => $lastProduct, 'nextProduct' => $nextProduct, 'prevProduct' => $prevProduct, 'siteTitle' => $this->siteTitle, 'followUser' => $followUser, 'shareItem' => $item));
    }

    public function getDetails($id = null) {
        if (Input::get('id')) {
            $id = Input::get('id');
        }
        $nextProduct = '';
        $prevProduct = '';
        $product = new ProductsHelper();
        $item = $product->getById($id);
        $limit = 20;
        $lastProduct = null;
        $similarItems = $product->getProductsByUser($item['user_id'], $limit, $lastProduct, $id);
        if (count($similarItems)) {
            $similarItems = $this->getUserLikes($similarItems);
            $lastProduct = $similarItems->last()->id;
        }
        $nextProduct = $product->getNextProduct($item['id']);
        $prevProduct = $product->getPrevProduct($item['id']);
        if (!empty($nextProduct)) {
            $nextProduct->slugTitle = $product->createSlug($nextProduct->item->title);
        }
        if (!empty($prevProduct)) {
            $prevProduct->slugTitle = $product->createSlug($prevProduct->item->title);
        }
        $item['item']['slugTitle'] = $product->createSlug($item['item']['title']);
        $item['total_click'] = $product->addviewnum($item['id']);
        $item['socialButton'] = $product->getSocialButton();
        $activity = new ActivityHelper();
        $item = $this->getSingleProductLike($item);
        $item['dif'] = $activity->TimeDifference($item['create_time']);
        $getuser = new UserHelper();
        $followUser = array();
        if ($this->islogin) {
            $userinfo = $getuser->getUserProfile($this->cuser['uid']);
            $i = 0;
            foreach ($userinfo->followings as $following) {
                $followUser[$i] = $following['id'];
                $i++;
            }
        }
        $this->siteTitle = $item['item']['title'] . ' ' . $item['details'][0]->category_name_cn . ' Detail Page';
        return View::make('user.items.details', array('item' => $item, 'response' => $this->_response, 'similarItems' => $similarItems, 'lastProduct' => $lastProduct, 'nextProduct' => $nextProduct, 'prevProduct' => $prevProduct, 'siteTitle' => $this->siteTitle, 'followUser' => $followUser, 'shareItem' => $item));
    }

    public function getSimilerItems() {
        $input = Input::all();
        $items = new ProductsHelper();
        $limit = ($input['limit']) ? ($input['limit']) : null;
        $lastProduct = ($input['lastProduct']) ? ($input['lastProduct']) : null;
        $items = $items->getProductsByUser($input['user_id'], $limit, $lastProduct);
        if (count($items)) {
            $items = $this->getUserLikes($items);
            $lastProduct = $items[count($items) - 1]->id;
            return View::make('user.items.product', array('items' => $items, 'lastProduct' => $lastProduct, 'response' => $this->_response));
        }
    }

    public function showKeyword($keyword) {
        $this->siteTitle = $keyword . " Search";
        return View::make('user.search.searchProducts', array('response' => $this->_response, 'keyword' => $keyword, 'siteTitle' => $this->siteTitle));
    }

    public function getProductsByKeyword() {
        $limit = (Input::get('limit')) ? (Input::get('limit')) : '';
        $lastProduct = (Input::get('lastProduct')) ? (Input::get('lastProduct')) : null;
        $items = new ProductsHelper();
        $keyword = Input::get('keyword');
        $items = $items->getProductsByKeyword($keyword, $limit, $lastProduct);
        if (count($items)) {
            $items = $this->getUserLikes($items);
            $lastProduct = $items[count($items) - 1]->id;
            return View::make('user.items.product', array('items' => $items, 'lastProduct' => $lastProduct, 'response' => $this->_response));
        }
    }

//    public function getProductByCategories() {
//        $limit = (Input::get('limit')) ? (Input::get('limit')) : null;
//        $lastProduct = (Input::get('lastProduct')) ? (Input::get('lastProduct')) : null;
//        $id = Input::get('id');
//        $items = new ProductsHelper();
//        $items = $items->getProductsByCategory($id, $limit, $lastProduct);
//        if (count($items)) {
//            $items = $this->getUserLikes($items);
//            $lastProduct = $items->last()->id;
//            return View::make('user.items.product', array('items' => $items, 'lastProduct' => $lastProduct,'response' => $this->_response));
//        }
//    }

    public function getProductByStores() {
        $limit = (Input::get('limit')) ? (Input::get('limit')) : null;
        $lastProduct = (Input::get('lastProduct')) ? (Input::get('lastProduct')) : null;
        $id = Input::get('id');
        $items = new ProductsHelper();
        $items = $items->getProductsByStore($id, $limit, $lastProduct);
        if (count($items)) {
            $items = $this->getUserLikes($items);
            $lastProduct = $items->last()->id;
            return View::make('user.items.product', array('items' => $items, 'lastProduct' => $lastProduct, 'response' => $this->_response));
        }
    }

    public function getLikedProducts() {
        $page = Input::get('page');
        $id = Input::get('id');
        $limit = (Input::get('limit')) ? (Input::get('limit')) : null;
        $lastProduct = (Input::get('lastProduct')) ? (Input::get('lastProduct')) : null;
        $items = new ProductsHelper();
        $items = $items->getSavedProducts($id, $limit, $lastProduct);
        if (count($items)) {
            $items = $this->getUserLikes($items);
            $lastProduct = $items[count($items) - 1]->id;
            return View::make('user.items.product', array('items' => $items, 'lastProduct' => $lastProduct, 'page' => $page, 'response' => $this->_response));
        }
    }

    public function getUsersShare() {
        $page = Input::get('page');
        $id = Input::get('id');
        $limit = (Input::get('limit')) ? (Input::get('limit')) : null;
        $lastProduct = (Input::get('lastProduct')) ? (Input::get('lastProduct')) : null;
        $items = new ProductsHelper();
        $items = $items->getProductsByUser($id, $limit, $lastProduct);
        if (count($items)) {
            $items = $this->getUserLikes($items);
            $lastProduct = $items[count($items) - 1]->id;
            return View::make('user.items.product', array('items' => $items, 'lastProduct' => $lastProduct, 'page' => $page, 'response' => $this->_response));
        }
    }

    public function getProductByCollections() {
        $limit = (Input::get('limit')) ? (Input::get('limit')) : null;
        $lastProduct = (Input::get('lastProduct')) ? (Input::get('lastProduct')) : null;
        $id = Input::get('id');
        $items = new ProductsHelper();
        $items = $items->getProductsByAlbum($id, $limit, $lastProduct);
        if (count($items)) {
            $items = $this->getUserLikes($items);
            $lastProduct = $items->last()->id;
            return View::make('user.items.product', array('items' => $items, 'lastProduct' => $lastProduct, 'response' => $this->_response));
        }
    }

    public function showUserSaves($id, $name) {
        $userInfo = new UserHelper();
        $userInfo = $userInfo->getUserProfile($id);
        $this->siteTitle = $userInfo->nickname . "'s Favotite Shares";
        return View::make('user.items.profileSaved', array('response' => $this->_response, 'userInfo' => $userInfo, 'id' => $id, 'name' => $name, 'siteTitle' => $this->siteTitle));
    }

    public function showUserShares($id, $name) {
        $userInfo = new UserHelper();
        $userInfo = $userInfo->getUserProfile($id);
        $this->siteTitle = $userInfo->nickname . "'s Share";
        return View::make('user.items.profileShares', array('response' => $this->_response, 'userInfo' => $userInfo, 'id' => $id, 'name' => $name, 'siteTitle' => $this->siteTitle));
    }

//    public function getProductByColors() {
//        $limit = (Input::get('limit')) ? (Input::get('limit')) : null;
//        $lastProduct = (Input::get('lastProduct')) ? (Input::get('lastProduct')) : null;
//        $color = Input::get('color');
//        $items = new ProductsHelper();
//        $items = $items->getProductsByColor($color, $limit, $lastProduct);
//        if (count($items)) {
//            $items = $this->getUserLikes($items);
//            $lastProduct = $items[count($items) - 1]->id;
//            return View::make('user.items.product', array('items' => $items, 'lastProduct' => $lastProduct,'response' => $this->_response));
//        }
//    }
//    public function getProductByRange() {
//        $limit = (Input::get('limit')) ? (Input::get('limit')) : null;
//        $lastProduct = (Input::get('lastProduct')) ? (Input::get('lastProduct')) : null;
//        $range = Input::get('range');
//        $items = new ProductsHelper();
//        $items = $items->getProductsByRange($range, $limit, $lastProduct);
//        if (count($items)) {
//            $items = $this->getUserLikes($items);
//            $lastProduct = $items[count($items) - 1]->id;
//            return View::make('user.items.product', array('items' => $items, 'lastProduct' => $lastProduct,'response' => $this->_response));
//        }
//    }
//    public function getProductByRangeAndColor() {
//        $limit = (Input::get('limit')) ? (Input::get('limit')) : null;
//        $lastProduct = (Input::get('lastProduct')) ? (Input::get('lastProduct')) : null;
//        $range = Input::get('range');
//        $color = Input::get('color');
//        $items = new ProductsHelper();
//        $items = $items->getProductsByColorAndRange($color, $range, $limit, $lastProduct);
//        if (count($items)) {
//            $items = $this->getUserLikes($items);
//            $lastProduct = $items[count($items) - 1]->id;
//            return View::make('user.items.product', array('items' => $items, 'lastProduct' => $lastProduct,'response' => $this->_response));
//        }
//    }
    public function getProductsByFiltering() {
        $items = new ProductsHelper();
        $limit = (Input::get('limit')) ? (Input::get('limit')) : null;
        $lastProduct = (Input::get('lastProduct')) ? (Input::get('lastProduct')) : null;
        $category = (Input::get('category')) ? (Input::get('category')) : null;
        $color = (Input::get('color')) ? (Input::get('color')) : null;
        $range = (Input::get('range')) ? (Input::get('range')) : null;
        $items = $items->getProductsByFiltering($category, $color, $range, $limit, $lastProduct);
        if (count($items)) {
            $items = $this->getUserLikes($items);
            $lastProduct = $items[count($items) - 1]->id;
            return View::make('user.items.product', array('items' => $items, 'lastProduct' => $lastProduct, 'response' => $this->_response));
        }
    }

    public function getSingleProductLike($item) {
        $isLikeStore = FALSE;
        $isLike = FALSE;
        $isBuy = FALSE;
        $isOwner = FALSE;
        if (isset($_SESSION[$this->cartuser]['shoppingItems'])) {
            foreach ($_SESSION[$this->cartuser]['shoppingItems'] as $k => $cartItem) {
                if ($item['id'] == $cartItem['share_id']) {
                    $isBuy = TRUE;
                }
            }
        }
        if ($this->islogin) {
            $likeProduct = Activity::where('user_id', '=', $this->cuser['uid'])->where('act_code', '=', 'addlike')->where('rel_id', '=', $item['id'])->get();
            if (count($likeProduct)) {
                $isLike = TRUE;
            }
            if ($item['user_id'] == $this->_response['cuser']['uid']) {
                $isOwner = TRUE;
            }
        }
        $user = User::find($item['user_id']);
        $productStore = Store::find($item['store_id']);
        if (!empty($user)) {
            if ($user->is_social) {
                $socialInfo = Connector::where('user_id', '=', $user->id)->get();
                $user->socialInfo = $socialInfo[0];
            }
            unset($user->passwd);
            $item['productOwner'] = $user;
        }
        if (!empty($productStore)) {
            $item['store'] = $productStore;
            if ($this->islogin) {
                $likeStore = FavoriteStore::where('user_id', '=', $this->cuser['uid'])->where('store_id', '=', $item['store_id'])->get();
                if (count($likeStore)) {
                    $isLikeStore = TRUE;
                }
            }
        }
        $productHelper = new ProductsHelper();
        $storeProducts = $productHelper->getStoreProducts($item['store_id'], $item['id']);
        if (!empty($storeProducts)) {
            foreach ($storeProducts as $key => $products) {
                $newslug = new ProductsHelper();
                $title = $newslug->createSlug($products->title);
                $storeProducts[$key]->slugTitle = utf8_encode($title);
            }
            $item['storeProducts'] = $storeProducts;
        }
        $item['isLike'] = $isLike;
        $store = Store::find($item['store_id']);
        if (!empty($store)) {
            $item['shipping_cost'] = $store->shipping_fee;
        } else {
            $item['shipping_cost'] = 0;
        }
        $item['store']->isLike = $isLikeStore;
        $item['isBuy'] = $isBuy;
        $item['isOwner'] = $isOwner;
        return $item;
    }

    public function getUserLikes($items) {
        foreach ($items as $key => $item) {
            $isLike = FALSE;
            $isBuy = FALSE;
            $isOwner = FALSE;
            if (isset($_SESSION[$this->cartuser]['shoppingItems'])) {
                foreach ($_SESSION[$this->cartuser]['shoppingItems'] as $k => $cartItem) {
                    if ($item->id == $cartItem['share_id']) {
                        $isBuy = TRUE;
                    }
                }
            }
            if ($this->islogin) {
                $likeProduct = Activity::where('user_id', '=', $this->cuser['uid'])->where('act_code', '=', 'addlike')->where('rel_id', '=', $item->id)->get();
                if (count($likeProduct)) {
                    $isLike = TRUE;
                }
                if ($item->user_id == $this->_response['cuser']['uid']) {
                    $isOwner = TRUE;
                }
            }
            $user = User::find($item->user_id);
            $store = Store::find($item->store_id);
            $collection = Album::find($item->album_id);
            if (!empty($user)) {
                unset($user->passwd);
                $items[$key]->productOwner = $user;
            }
//            if (!empty($store)) {
//                
//            }
            if (!empty($collection)) {
                $items[$key]->collection = $collection;
            }
            $items[$key]->isLike = $isLike;
            //$store = Store::find($item->store_id);
            if (!empty($store)) {
                $items[$key]->store = $store;
                $items[$key]->shipping_cost = $store->shipping_fee;
            } else {
                $items[$key]->shipping_cost = 0;
            }
            $helper = new ProductsHelper();
            $colorsetting = $helper->getSettings("colorindex");
            $colorValue = (isset($colorsetting[$item->item->color])) ? $colorsetting[$item->item->color] : $colorsetting['gray'];
            $items[$key]->isBuy = $isBuy;
            $items[$key]->isOwner = $isOwner;
            $title = $helper->createSlug($item->item->title);
            $items[$key]->slugTitle = utf8_encode($title);
            $items[$key]->colorValue = $colorValue;
        }
        return $items;
    }

    public function deleteProduct() {
        if (!$this->islogin) {
            return Redirect::to('/login');
        } else {          
            $product = new ProductsHelper();
            $input = Input::all();
            $share = $product->getById($input['itemId']);
            if (!empty($share)) {
                if ($this->cuser['uid'] == $share['user_id'] || $this->isadmin) {
                    $itemHelper = new ShareHelper();
                    $itemHelper->deleteProduct($input['itemId']);
                } else {
                    return Redirect::to('/');
                }
            } else {
                return Redirect::to('/');
            }
        }
    }

    public function commentOnProduct() {
        if ($this->islogin) {
            $input = Input::all();
            $commentHelper = new CommentHelper();
            $commentHelper->createComment($input, $this->cuser);
        }
    }

    public function showHashtagItems($tag) {
        $hashtag = Tag::where('tag_name', '=', $tag)->get();
        $this->siteTitle = "#" . $tag;
        $helper = new ProductsHelper();
        $tagMenu = $helper->getTagMenue();
        return View::make('user.items.hash_tag_items', array('response' => $this->_response, 'tag' => $hashtag[0], 'siteTitle' => $this->siteTitle, 'tagMenu' => $tagMenu));
    }

    public function showBestSellers() {
        $this->siteTitle = "Best Sell Items";
        return View::make('user.items.bestSellers', array('response' => $this->_response, 'siteTitle' => $this->siteTitle));
    }
     public function showBeauty() {
        $this->siteTitle = "Beauty Items";
        return View::make('user.items.beauty', array('response' => $this->_response, 'siteTitle' => $this->siteTitle));
    }

    public function getItemByHashtag() {
        $limit = (Input::get('limit')) ? (Input::get('limit')) : null;
        $lastProduct = (Input::get('lastProduct')) ? (Input::get('lastProduct')) : null;
        $tag = Input::get('tag');
        $helper = new ProductsHelper();
        $items = $helper->getByTagName($tag);
        if (count($items->products)) {
            $items = $this->getUserLikes($items->products);
            $lastProduct = $items[count($items) - 1]->id;
            return View::make('user.items.product', array('items' => $items, 'lastProduct' => $lastProduct, 'response' => $this->_response));
        }
    }

    public function sizeGuide() {
        $image = Input::get('image');
        return View::make('user.site.size', array('image' => $image, 'response' => $this->_response));
    }

}

?>
