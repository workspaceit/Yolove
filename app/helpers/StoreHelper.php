<?php

class StoreHelper {

    public function getAllStores($limit = null, $lastStore = null, $offset = null) {
        if ($limit && $lastStore) {
            $stores = Store::orderBy('update_time', 'DESC')->offset($offset)->take($limit)->get();
        } elseif ($limit) {
            $stores = Store::orderBy('update_time', 'DESC')->take($limit)->get();
        } else {
            $stores = Store::orderBy('update_time', 'DESC')->get();
        }
        return $stores;
    }

    public function getStoreById($id) {
        $store = Store::find($id);
        if (!empty($store)) {
            $Shares = Share::where('store_id', '=', $id)->select('id')->get();
            if (count($Shares)) {
                $store->total_products = count($Shares);
            }
            $product = Share::where('store_id', '=', $id)->get();
            foreach ($product as $key => $h) {
                $album_id[$key] = $h['album_id'];
            }
            $unique_album = array_unique($album_id);
            $store->collection = $unique_album;
            $store->product = $product;
        }
        return $store;
    }

    public function createStore($input, $cuser) {
        $store = new Store();
        $store->poster_id = $cuser['uid'];
        $store->poster_nickname = $cuser['nickname'];
        $store->category_id = $input['category_id'];
        $store->store_name = $input['store_name'];
        $store->domain_name = $input['domain_name'];
        $store->create_time = time();
        $store->update_time = time();
        $store->save();
        return $store;
    }

    public function updateStore($id, $input) {
        $store = Store::find($id);
        $store->store_name = $input['store_name'];
        $store->store_desc = $input['store_desc'];
        $store->shipping_fee = $input['shipping_fee'];
        $store->update_time = time();
        $store->save();
        return $store;
    }

    public function deleteStore($id) {
        $store = Store::find($id);
        $shares = Share::where('store_id', '=', $store->id)->get();
        $favStore = $this->deleteFavoriteStore($store->id);
        foreach ($shares as $key => $share) {
            $deleteShares = new ShareHelper();
            $deleteShares = $deleteShares->deleteProduct($share->id);
        }
        $store->delete();
        return $store;
    }

    public function deleteFavoriteStore($id) {
        $favStore = FavoriteStore::where('store_id', '=', $id)->get();
        if ($favStore) {
            foreach ($favStore as $key => $fav) {
                $favStore[$key]->delete();
            }
        }
    }

    public function getFavoriteStore($userId, $limit = null, $lastStore = null, $offset = null) {
        if ($limit && $lastStore) {
            $stores = DB::table('store')
                    ->join('favorite_store', 'favorite_store.store_id', '=', 'store.id')
                    ->where('favorite_store.user_id', '=', $userId)
                    ->where('store.id', '!=', $lastStore)
                    ->orderBy('store.id', 'DESC')
                    ->offset($offset)
                    ->take($limit)
                    ->select('store.*')
                    ->get();
        } elseif ($limit) {
            $stores = DB::table('store')
                    ->join('favorite_store', 'favorite_store.store_id', '=', 'store.id')
                    ->where('favorite_store.user_id', '=', $userId)
                    ->orderBy('store.id', 'DESC')
                    ->take($limit)
                    ->select('store.*')
                    ->get();
        } else {
            $stores = DB::table('store')
                    ->join('favorite_store', 'favorite_store.store_id', '=', 'store.id')
                    ->where('favorite_store.user_id', '=', $userId)
                    ->orderBy('store.id', 'DESC')
                    ->select('store.*')
                    ->get();
        }
        return $stores;
    }

    public function registerStore($input, $cuser = null) {
        $mainUrl = app('main_url');
        $store = Store::find($input['id']);
        if (!empty($store)) {
            if ($cuser) {
                $store->user_id = $cuser['uid'];
            }
            $store->store_name = $input['storeName'];
            $store->phone = $input['phone'];
            $store->address = $input['address'];
            $store->city = $input['city'];
            $store->province = $input['state'];
            $store->store_desc = $input['description'];
            $store->zip_code = $input['zip'];
            $store->isregister = 1;
            $store->country = $input['country'];
            $store->shipping_fee = $input['cost'];
            $store->update_time = time();
            $store->save();
            if (isset($input['image'])) {
                $api_server = app('api_server');
                $image = $input['image'];
                $imageName = $image->getClientOriginalName();
                $file_extension = $image->getClientOriginalExtension();
                if ($file_extension) {
                    $file_name = $store->id . '_' . md5($store->domain_name) . '';
                    $dir = '/uploads/attachments/store/';
                    //$save_path = base_path() . $dir;
                    $save_path = $api_server . $dir;
                    $imageName = $file_name . '.' . $file_extension;
                    $file_path = $save_path . '/' . $imageName;
                    $image->move($save_path . '/', $imageName);
                    $avatar = Image::make($file_path)->resize(200, 150)->save($save_path . '/' . $file_name . '.' . 'jpg');
                }
            }
            if ($cuser) {
                $emaiData = array();
                $emaiData = array('user' => "<a style='text-decoration:none;color:#46BFC4' href=''> </a>", 'email' => $cuser['email'], 'collection' => "", 'msg' => " Thank you for claiming your store, our staff will contact you in 48 hours for verification….Please update all your items in your store ", 'subject' => " Claim Store ", 'see_post' => "<a style='text-decoration:none;background:#46BFC4;color:#fff;padding:5px 12px;font-weight:700;font-size:14px;border-radius:1px;-moz-border-radius:1px;-webkit-border-radius:1px;' href='".$mainUrl."/store/".$input['id']."' target='_blank'>See Store</a>", 'name' => $cuser['nickname']);
                $mail = new MailHelper();
                $mail = $mail->sendMail($emaiData);
            }
            return $store;
        }
    }

    public function getItemLike($id) {

        $stores = DB::table('share')
                ->where('store_id', '=', $id)
                ->sum('total_like');


        return $stores;
    }

    public function getCollectionLike($id) {

        $stores = DB::table('album')
                ->join('share', 'share.album_id', '=', 'album.id')
                ->where('share.store_id', '=', $id)
                ->sum('album.total_like');


        return $stores;
    }

    public function getTotalOrder($id) {

        $stores = DB::table('shipping_product')
                ->where('store_id', '=', $id)
                ->count();


        return $stores;
    }

    public function getGrossProfit($id) {

        $stores = DB::table('shipping_product')
                ->join('shipping_info', 'shipping_product.transaction_id', '=', 'shipping_info.id')
                ->select(DB::raw('sum(shipping_product.price*shipping_product.quantity+shipping_product.shipping_cost) AS total_sales'))
                ->where('shipping_info.status','=','paid')
                ->where('shipping_product.store_id', '=', $id)
                ->first();


        return $stores->total_sales;
    }

    public function getComparison($id) {

        $date = date("Y-m-d"); // current date

        $date1 = strtotime(date("Y-m-d"));

        $date2 = strtotime(date("Y-m-d", strtotime($date)) . " -1 week");

        $date3 = strtotime(date("Y-m-d", strtotime($date)) . " -2 week");

        var_dump($date3);

        $stores1 = DB::table('shipping_product')
                ->join('shipping_info', 'shipping_product.transaction_id', '=', 'shipping_info.id')
                ->select(DB::raw('sum(shipping_product.price*shipping_product.quantity+shipping_product.shipping_cost) AS total_sales'))
                ->where('shipping_info.status','=','paid')
                ->where('shipping_product.store_id', '=', $id)
                ->whereBetween('shipping_product.create_time', array($date2, $date1))
                ->first();


        $stores2 = DB::table('shipping_product')
                ->join('shipping_info', 'shipping_product.transaction_id', '=', 'shipping_info.id')
                ->select(DB::raw('sum(shipping_product.price*shipping_product.quantity+shipping_product.shipping_cost) AS total_sales'))
                ->where('shipping_info.status','=','paid')
                ->where('shipping_product.store_id', '=', $id)
                ->whereBetween('shipping_product.create_time', array($date3, $date2))
                ->first();

        $stores = $stores1->total_sales - $stores2->total_sales;



        return $stores;
    }

    public function getThisWeekProfit($id) {

        $date = date("Y-m-d"); // current date

        $date1 = strtotime(date("Y-m-d"));

        $date2 = strtotime(date("Y-m-d", strtotime($date)) . " -1 week");


        $stores1 = DB::table('shipping_product')
                ->join('shipping_info', 'shipping_product.transaction_id', '=', 'shipping_info.id')
                ->select(DB::raw('sum(shipping_product.price*shipping_product.quantity+shipping_product.shipping_cost) AS total_sales'))
                ->where('shipping_info.status','=','paid')
                ->where('shipping_product.store_id', '=', $id)
                ->whereBetween('shipping_product.create_time', array($date2, $date1))
                ->first();



        return $stores1->total_sales;
    }

    public function getLastWeekProfit($id) {

        $date = date("Y-m-d"); // current date

        $date2 = strtotime(date("Y-m-d", strtotime($date)) . " -1 week");

        $date3 = strtotime(date("Y-m-d", strtotime($date)) . " -2 week");



        $stores2 = DB::table('shipping_product')
                ->join('shipping_info', 'shipping_product.transaction_id', '=', 'shipping_info.id')
                ->select(DB::raw('sum(shipping_product.price*shipping_product.quantity+shipping_product.shipping_cost) AS total_sales'))
                ->where('shipping_info.status','=','paid')
                ->where('shipping_product.store_id', '=', $id)
                ->whereBetween('shipping_product.create_time', array($date3, $date2))
                ->first();



        return $stores2->total_sales;
    }

    public function getProductByStore($storeId) {
        $products = ShippingProduct::where('store_id', '=', $storeId)->get();
        if (count($products)) {
            foreach ($products as $key => $product) {
                $getShare = new ProductsHelper();
                $share = $getShare->getById($product->share_id);
                $products[$key]->title = $share['item']['title'];
                $products[$key]->price = $share['item']['price'];
            }
        }
        return $products;
    }

}

?>
