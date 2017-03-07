<?php

class ProductsHelper {

    public function getAllProducts($limit = null, $lastProduct = null) {
        if ($limit && $lastProduct) {
            $items = Share::orderBy('id', 'DESC')->where('id', '<', $lastProduct)->take($limit)->get();
        } elseif ($limit) {
            $items = Share::orderBy('id', 'DESC')->take($limit)->get();
        } else {
            $items = Share::orderBy('id', 'DESC')->get();
        }
        foreach ($items as $key => $item) {
            $product = Item::find($items[$key]->item_id);
            if (!empty($product)) {
                $items[$key]->item = $product;
            }
        }
        return $items;
    }

    public function getBestSellersProducts($limit = null, $offset = null) {
        if ($limit && $offset) {
            $items = DB::table('shipping_product')
                    ->join('share', 'share.id', '=', 'shipping_product.share_id')
                    ->orderBy('shipping_product.id', 'DESC')
                    ->distinct('shipping_product.share_id')
                    ->offset($offset)
                    ->take($limit)
                    ->select('share.*')
                    ->get();
        } elseif ($limit) {
            $items = DB::table('shipping_product')
                    ->join('share', 'share.id', '=', 'shipping_product.share_id')
                    ->orderBy('shipping_product.id', 'DESC')
                    ->distinct('shipping_product.share_id')
                    ->take($limit)
                    ->select('share.*')
                    ->get();
        }
        foreach ($items as $key => $item) {
            $product = Item::find($items[$key]->item_id);
            if (!empty($product)) {
                $items[$key]->item = $product;
            }
        }
        return $items;
    }

    public function getMixUpProducts($limit = null) {
        $items = Share::where('ismixup','=',1)->orderBy('id', 'DESC')->take($limit)->get();
        foreach ($items as $key => $item) {
            $product = Item::find($items[$key]->item_id);
            if (!empty($product)) {
                $items[$key]->item = $product;
            }
        }
        return $items;
    }
    public function getNewProducts($limit = null) {
        $items = Share::where('isnew','=',1)->orderBy('id', 'DESC')->take($limit)->get();
        foreach ($items as $key => $item) {
            $product = Item::find($items[$key]->item_id);
            if (!empty($product)) {
                $items[$key]->item = $product;
            }
        }
        return $items;
    }

    public function getProductsUnder($limit = null, $offset = null, $underPrice = null) {
        if ($limit && $offset) {
            $items = DB::table('share')
                    ->join('item', 'item.id', '=', 'share.item_id')
                    ->where('item.price', '<', intval($underPrice))
                    ->orderBy('share.id', 'DESC')
                    ->offset($offset)
                    ->take($limit)
                    ->select('share.*')
                    ->get();
        }elseif($limit){
            $items = DB::table('share')
                    ->join('item', 'item.id', '=', 'share.item_id')
                    ->where('item.price', '<', intval($underPrice))
                    ->orderBy('share.id', 'DESC')
                    ->take($limit)
                    ->select('share.*')
                    ->get();
        }
        foreach ($items as $key => $item) {
            $product = Item::find($items[$key]->item_id);
            if (!empty($product)) {
                $items[$key]->item = $product;
            }
        }
        return $items;
    }

    public function getById($id) {
        $item = Share::where('id', '=', $id)
            ->with('size')
            ->first();
        if (!empty($item)) {
            $item->details = DB::table('share')->join('category', 'share.category_id', '=', 'category.id')->join('album', 'share.album_id', '=', 'album.id')->where('share.id', '=', $id)->select('category.*', 'album.*', 'share.*')->get();
            $share = Item::find($item->item_id);
            $item = $item->toArray();
            if (!empty($share)) {
                $share = $share->toArray();
                $item['item'] = $share;
            }
            $userHelper = new UserHelper();
            $activity = new ActivityHelper();
            $involved = array();
            // $comments = Comment::where('share_id', '=', $item['id'])->get();
            $comments = DB::table('comment')->join('user', 'user.id', '=', 'comment.user_id')->where('share_id', '=', $item['id'])->orderBy('comment.id', 'DESC')->select('user.email', 'user.nickname', 'comment.*')->get();
            foreach ($comments as $key => $comment) {
                if ($comment->search_en != NULL) {
                    foreach (unserialize($comment->search_en)as $inv_user) {
                        $involved[] = $userHelper->getUserById($inv_user);
                    }
                }
                $user = User::find($comment->user_id);
                if (!empty($user)) {
                    if ($user->is_social) {
                        $socialInfo = Connector::where('user_id', '=', $user->id)->get();
                        $comments[$key]->avatar = $socialInfo[0]->avatar;
                    }
                }
                $comments[$key]->tagged = $involved;
                $comments[$key]->diff = $activity->TimeDifference($comment->create_time);
            }
            if (count($comments)) {
                $item['comments'] = $comments;
            }
        }
        return $item;
    }

    public function getProductsByFiltering($category = null, $color = null, $range = null, $limit = null, $lastProduct = null) {
        $shares = DB::table('share')
                ->join('item', 'item.id', '=', 'share.item_id')
                ->where(function($query) use ($category, $color, $range, $lastProduct) {
                    if ($color) {
                        $query->where('item.color', '=', $color);
                    }
                    if ($range) {
                        $pricerange = explode('~', $range);
                        $query->where('item.price', '>=', intval($pricerange[0]));
                        $query->where('item.price', '<=', intval($pricerange[1]));
                    }
                    if ($category) {
                        $query->where('share.category_id', '=', $category);
                    }
                    if ($lastProduct) {
                        $query->where('share.id', '<', $lastProduct);
                    }
                })
                ->orderBy('share.id', 'DESC')
                ->take($limit)
                ->select('share.*')
                ->get();
        if (count($shares)) {
            foreach ($shares as $key => $share) {
                $item = Item::find($share->item_id);
                if (!empty($item)) {
                    $shares[$key]->item = $item;
                }
            }
        }
        return $shares;
    }

    public function getProductsByColor($color, $limit = null, $lastProduct = null) {
        if ($limit && $lastProduct) {
            $shares = DB::table('share')
                    ->join('item', 'item.id', '=', 'share.item_id')
                    ->where('item.color', '=', $color)
                    ->where('share.id', '<', $lastProduct)
                    ->orderBy('share.id', 'DESC')
                    ->take($limit)
                    ->select('share.*')
                    ->get();
        } elseif ($limit) {
            $shares = DB::table('share')
                    ->join('item', 'item.id', '=', 'share.item_id')
                    ->where('item.color', '=', $color)
                    ->orderBy('share.id', 'DESC')
                    ->take($limit)
                    ->select('share.*')
                    ->get();
        } else {
            $shares = DB::table('share')
                    ->join('item', 'item.id', '=', 'share.item_id')
                    ->where('item.color', '=', $color)
                    ->orderBy('share.id', 'DESC')
                    ->select('share.*')
                    ->get();
        }
        if (count($shares)) {
            foreach ($shares as $key => $share) {
                $item = Item::find($share->item_id);
                if (!empty($item)) {
                    $shares[$key]->item = $item;
                }
            }
        }
        return $shares;
    }

    public function getProductsByRange($range, $limit = null, $lastProduct = null) {
        $pricerange = explode('~', $range);
        if ($limit && $lastProduct) {
            $shares = DB::table('share')
                    ->join('item', 'item.id', '=', 'share.item_id')
                    ->where('item.price', '>=', intval($pricerange[0]))
                    ->where('item.price', '<=', intval($pricerange[1]))
                    ->where('share.id', '<', $lastProduct)
                    ->orderBy('share.id', 'DESC')
                    ->take($limit)
                    ->select('share.*')
                    ->get();
        } elseif ($limit) {
            $shares = DB::table('share')
                    ->join('item', 'item.id', '=', 'share.item_id')
                    ->where('item.price', '>=', intval($pricerange[0]))
                    ->where('item.price', '<=', intval($pricerange[1]))
                    ->orderBy('share.id', 'DESC')
                    ->take($limit)
                    ->select('share.*')
                    ->get();
        } else {
            $shares = DB::table('share')
                    ->join('item', 'item.id', '=', 'share.item_id')
                    ->where('item.price', '>=', intval($pricerange[0]))
                    ->where('item.price', '<=', intval($pricerange[1]))
                    ->orderBy('share.id', 'DESC')
                    ->select('share.*')
                    ->get();
        }
        if (count($shares)) {
            foreach ($shares as $key => $share) {
                $item = Item::find($share->item_id);
                if (!empty($item)) {
                    $shares[$key]->item = $item;
                }
            }
        }
        return $shares;
    }

    public function getProductsByColorAndRange($color, $range, $limit = null, $lastProduct = null) {
        $pricerange = explode('~', $range);
        if ($limit && $lastProduct) {
            $shares = DB::table('share')
                    ->join('item', 'item.id', '=', 'share.item_id')
                    ->where('tem.color', '=', $color)
                    ->where('item.price', '>=', intval($pricerange[0]))
                    ->where('item.price', '<=', intval($pricerange[1]))
                    ->where('share.id', '<', $lastProduct)
                    ->orderBy('share.id', 'DESC')
                    ->take($limit)
                    ->select('share.*')
                    ->get();
        } elseif ($limit) {
            $shares = DB::table('share')
                    ->join('item', 'item.id', '=', 'share.item_id')
                    ->where('item.color', '=', $color)
                    ->where('item.price', '>=', intval($pricerange[0]))
                    ->where('item.price', '<=', intval($pricerange[1]))
                    ->orderBy('share.id', 'DESC')
                    ->take($limit)
                    ->select('share.*')
                    ->get();
        } else {
            $shares = DB::table('share')
                    ->join('item', 'item.id', '=', 'share.item_id')
                    ->where('item.color', '=', $color)
                    ->where('item.price', '>=', intval($pricerange[0]))
                    ->where('item.price', '<=', intval($pricerange[1]))
                    ->orderBy('share.id', 'DESC')
                    ->select('share.*')
                    ->get();
        }
        if (count($shares)) {
            foreach ($shares as $key => $share) {
                $item = Item::find($share->item_id);
                if (!empty($item)) {
                    $shares[$key]->item = $item;
                }
            }
        }
        return $shares;
    }

    public function getProductByHashtag($tid) {
        
    }

    public function getProductsByUser($userId, $limit = null, $lastProduct = null, $productId = null) {
        if ($limit && $lastProduct) {
            $items = Share::orderBy('id', 'DESC')->where('id', '<', $lastProduct)->where('user_id', '=', $userId)->take($limit)->get();
        } elseif ($limit) {
            if ($productId) {
                $items = Share::orderBy('id', 'DESC')->where('user_id', '=', $userId)->where('id', '!=', $productId)->take($limit)->get();
            } else {
                $items = Share::orderBy('id', 'DESC')->where('user_id', '=', $userId)->take($limit)->get();
            }
        } else {
            $items = Share::orderBy('id', 'DESC')->where('user_id', '=', $userId)->get();
        }
        foreach ($items as $key => $item) {
            $product = Item::find($items[$key]->item_id);
            if (!empty($product)) {
                $items[$key]->item = $product;
            }
        }
        return $items;
    }

    public function updateProduct() {
        
    }

    public function deleteProduct($id) {
        $item = Item::find($id);
        $item->delete();
        $deleteAttachment = $this->deleteAttachment($id);
    }

    public function getProductsByCategory($id, $limit = null, $lastProduct = null) {
        if ($limit && $lastProduct) {
            $products = Share::where('category_id', '=', $id)->orderBy('id', 'DESC')->where('id', '<', $lastProduct)->take($limit)->get();
        } elseif ($limit) {
            $products = Share::where('category_id', '=', $id)->orderBy('id', 'DESC')->take($limit)->get();
        } else {
            $products = Share::where('category_id', '=', $id)->orderBy('id', 'DESC')->get();
        }
        if (count($products)) {
            foreach ($products as $key => $product) {
                $item = Item::find($products[$key]->item_id);
                if (!empty($item)) {
                    $products[$key]->item = $item;
                }
            }
        }
        return $products;
    }

    public function getProductsByStore($id, $limit = null, $lastProduct = null) {
        if ($limit && $lastProduct) {
            $products = Share::where('store_id', '=', $id)->orderBy('id', 'DESC')->where('id', '<', $lastProduct)->take($limit)->get();
        } elseif ($limit) {
            $products = Share::where('store_id', '=', $id)->orderBy('id', 'DESC')->take($limit)->get();
        } else {
            $products = Share::where('store_id', '=', $id)->orderBy('id', 'DESC')->get();
        }
        if (count($products)) {
            foreach ($products as $key => $product) {
                $item = Item::find($products[$key]->item_id);
                if (!empty($item)) {
                    $products[$key]->item = $item;
                }
            }
        }
        return $products;
    }

    public function getProductsByKeyword($keyword, $limit = null, $lastProduct = null) {
        if ($limit && $lastProduct) {
            $shares = DB::table('share')
                    ->join('item', 'item.id', '=', 'share.item_id')
                    ->where('item.title', 'like', '%' . $keyword . '%')
                    ->where('share.id', '<', $lastProduct)
                    ->orderBy('share.id', 'DESC')
                    ->take($limit)
                    ->select('share.*')
                    ->get();
        } elseif ($limit) {
            $shares = DB::table('share')
                    ->join('item', 'item.id', '=', 'share.item_id')
                    ->where('item.title', 'like', '%' . $keyword . '%')
                    ->orderBy('share.id', 'DESC')
                    ->take($limit)
                    ->select('share.*')
                    ->get();
        } else {
            $shares = DB::table('share')
                    ->join('item', 'item.id', '=', 'share.item_id')
                    ->where('item.title', 'like', '%' . $keyword . '%')
                    ->orderBy('share.id', 'DESC')
                    ->select('share.*')
                    ->get();
        }
        if (count($shares)) {
            foreach ($shares as $key => $share) {
                $item = Item::find($share->item_id);
                if (!empty($item)) {
                    $shares[$key]->item = $item;
                }
            }
        }
        return $shares;
    }

    public function deleteAttachment($item_id) {
        $attachment = Attachment::where('item_id', '=', $item_id)->get();
        if ($attachment) {
            foreach ($attachment as $key => $value) {
                $attachment[$key]->delete();
            }
        }
    }

    public function getByTagName($tag) {
        $hashTag = Tag::where('tag_name', '=', $tag)->get();
        if (count($hashTag)) {
            $products = unserialize($hashTag[0]->share_id);
            foreach ($products as $key => $product) {
                $share[$key] = $this->getproductByTag($product);
            }
            if (!empty($share)) {
                $hashTag[0]->products = $share;
            }
        }
        return $hashTag[0];
    }

    public function getTagMenue() {
        $hashTag = Tag::orderBy('id', 'DESC')->where('is_show', '=', 1)->take(10)->get();
        return $hashTag;
    }

    public function getNextProduct($itemId) {
        $share = Share::orderBy('id', 'DESC')->where('id', '<', $itemId)->take(1)->get();
        if (count($share)) {
            $item = Item::find($share[0]->item_id);
            if (!empty($item)) {
                $share[0]->item = $item;
            }
            return $share[0];
        }
    }

    public function getPrevProduct($itemId) {
        $share = Share::orderBy('id', 'ASC')->where('id', '>', $itemId)->take(1)->get();
        if (count($share)) {
            $item = Item::find($share[0]->item_id);
            if (!empty($item)) {
                $share[0]->item = $item;
            }
            return $share[0];
        }
    }

    public function getSavedProducts($userId, $limit = null, $lastProduct = null) {
        if ($limit && $lastProduct) {
            $shares = DB::table('share')
                    ->join('activity', 'activity.rel_id', '=', 'share.id')
                    ->where('activity.act_code', '=', "addlike")
                    ->where('activity.user_id', '=', $userId)
                    ->where('share.id', '<', $lastProduct)
                    ->orderBy('share.id', 'DESC')
                    ->take($limit)
                    ->select('share.*')
                    ->get();
        } elseif ($limit) {
            $shares = DB::table('share')
                    ->join('activity', 'activity.rel_id', '=', 'share.id')
                    ->where('activity.act_code', '=', "addlike")
                    ->where('activity.user_id', '=', $userId)
                    ->orderBy('share.id', 'DESC')
                    ->take($limit)
                    ->select('share.*')
                    ->get();
        } else {
            $shares = DB::table('share')
                    ->join('activity', 'activity.rel_id', '=', 'share.id')
                    ->where('activity.act_code', '=', "addlike")
                    ->where('activity.user_id', '=', $userId)
                    ->orderBy('share.id', 'DESC')
                    ->select('share.*')
                    ->get();
        }
        if (count($shares)) {
            foreach ($shares as $key => $share) {
                $item = Item::find($share->item_id);
                if (!empty($item)) {
                    $shares[$key]->item = $item;
                }
            }
        }
        return $shares;
    }

    public function getProductsByAlbum($id, $limit = null, $lastProduct = null) {
        if ($limit && $lastProduct) {
            $products = Share::where('album_id', '=', $id)->orderBy('id', 'DESC')->where('id', '<', $lastProduct)->take($limit)->get();
        } elseif ($limit) {
            $products = Share::where('album_id', '=', $id)->orderBy('id', 'DESC')->take($limit)->get();
        } else {
            $products = Share::where('album_id', '=', $id)->orderBy('id', 'DESC')->get();
        }
        if (count($products)) {
            foreach ($products as $key => $product) {
                $item = Item::find($products[$key]->item_id);
                if (!empty($item)) {
                    $products[$key]->item = $item;
                }
            }
        }
        return $products;
    }

    public function createSlug($data) {
        $title = preg_replace('/\%/', ' percentage', $data);
        $title = preg_replace('/\@/', ' at ', $title);
        $title = preg_replace('/\&/', ' and ', $title);
        $title = preg_replace('/\s[\s]+/', '-', $title);    // Strip off multiple spaces 
        $title = preg_replace('/[\s\W]+/', '-', $title);    // Strip off spaces and non-alpha-numeric 
        $title = preg_replace('/^[\-]+/', '', $title); // Strip off the starting hyphens 
        $title = preg_replace('/[\-]+$/', '', $title); // // Strip off the ending hyphens 
        $title = strtolower($title);
        return $title;
    }

    public function getStoreProducts($store_id, $item_id) {
        $shares = DB::table('share')
                ->join('item', 'item.id', '=', 'share.item_id')
                ->where('share.store_id', '=', $store_id)
                ->where('share.id', '!=', $item_id)
                ->orderBy('share.id', 'DESC')
                ->take(4)
                ->select('share.*', 'item.*')
                ->get();
        return $shares;
    }

    public function getproductByTag($id) {
        $items = Share::find($id);
        if (!empty($items)) {
            $product = Item::find($items->item_id);
            if (!empty($product)) {
                $items->item = $product;
            }
        }
        return $items;
    }

    public function addviewnum($id) {
        $share = Share::find($id);
        $share->total_click = $share->total_click + 1;
        return $share->total_click;
    }

    public function getSocialButton() {
        $socialShare = Settings::where('set_key', '=', 'sharebutton')->get();
        $shareButton = unserialize($socialShare[0]->set_value);
        return $shareButton;
    }

    public function getSettings($key) {
        $colorIndex = Settings::where('set_key', '=', $key)->get();
        $color = unserialize($colorIndex[0]->set_value);
        return $color;
    }

}

?>