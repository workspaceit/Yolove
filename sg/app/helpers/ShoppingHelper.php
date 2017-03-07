<?php

class ShoppingHelper {

    public function createOrder($input, $cuser) {
        $order = new ShippingInfo();
        $order->product_cost = $input['product_cost'];
        $order->user_id = $cuser['uid'];
        $order->status = "unpaid";
        $order->shipping_cost = $input['shipping_cost'];
        $order->total_cost = $input['total_cost'];
        $order->shipping_address = $input['shipping_address'];
        $order->create_time = time();
        $order->save();
        if ($input['shoppingItems']) {
            $shoppingItems = json_decode($input['shoppingItems']);
            foreach ($shoppingItems as $key => $item) {
                $item->user_id = $order->user_id;
                $item->transaction_id = $order->id;
                $product = $this->productOrder($item);
            }
        }
        return $order;
    }

    public function productOrder($item) {
        $product = new ShippingProduct();
        $product->transaction_id = $item->transaction_id;
        $product->share_id = $item->share_id;
        $product->user_id = $item->user_id;
        $product->store_id = $item->store_id;
        $product->shipping_cost = $item->shipping_cost;
        $product->price = $item->price;
        $product->quantity = $item->quantity;
        $product->size = $item->size;
        $product->create_time = time();
        $product->save();
    }

    public function updateOrder($id, $input) {
        $order = ShippingInfo::where('user_id', '=', $id)->orderBy('id', 'DESC')->take(1)->get();
        $tokenId = uniqid();
        $order[0]->unique_token_id = $tokenId;
        $order[0]->payment_type = $input['payment_type'];
        $order[0]->status = $input['status'];
        $order[0]->return_from_paypal = ($input['return_value']) ? $input['return_value'] : '';
        $order[0]->update_time = time();
        $order[0]->save();
        $order[0]->shipping_address = json_decode($order[0]->shipping_address);
        $order[0]->return_from_paypal = unserialize($order[0]->return_from_paypal);
        return $order[0];
    }

    public function getOrderInfo($userId) {
        $order = ShippingInfo::where('user_id', '=', $userId)->orderBy('id', 'DESC')->take(1)->get();
        if (count($order)) {
            return $order[0];
        }
    }

    public function getOrderStatus($input) {
        $order = ShippingInfo::where('unique_token_id', '=', $input['id'])->get();
        if (count($order)) {
            $shippingAddress = json_decode($order[0]->shipping_address);
            if ($shippingAddress->email == $input['email']) {
                return $order[0];
            } else {
                return 0;
            }
        }
    }

    public function getProductByOrder($orderId) {
        $products = ShippingProduct::where('transaction_id', '=', $orderId)->get();
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

    public function updateQuantity($id, $quantity) {
        $order = ItemSize::where('id', '=', $id)->get();
        if ($order[0]->quantity > 0) {
            $order[0]->quantity = $order[0]->quantity - $quantity;
        }
        return $order[0];
    }

}

?>
