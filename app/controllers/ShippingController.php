<?php

class ShippingController extends YoloveController {

    public function addProductToCart() {
        $input = Input::all();
        $helper = new ProductsHelper();
        $input['slugTitle'] = $helper->createSlug($input['title']);
        $shoppingitems = array();
        $totalQuantity = 0;
        if (isset($_SESSION[$this->cartuser]['shoppingItems'])) {
            $exist = FALSE;
            foreach ($_SESSION[$this->cartuser]['shoppingItems'] as $key => $singleItem) {
                if ($singleItem['share_id'] == $input['share_id']) {
                    $exist = TRUE;
                }
            }
            if (!$exist) {
                array_push($_SESSION[$this->cartuser]['shoppingItems'], $input);
            } else {
                return "false";
            }
            foreach ($_SESSION[$this->cartuser]['shoppingItems'] as $key => $qty) {
                $totalQuantity = $totalQuantity + $qty['quantity'];
            }
            $_SESSION[$this->cartuser]['totalQuantity'] = $totalQuantity;
        } else {
            $shoppingitems[] = $input;
            $_SESSION[$this->cartuser]['shoppingItems'] = $shoppingitems;
            $_SESSION[$this->cartuser]['totalQuantity'] = 1;
        }
    }

    public function viewCart() {
        $totalQuantity = 0;
        $totalPrice = 0;
        $shipping_cost = 0;
        $store_id = array();
        if ($this->islogin) {
            $user = User::find($this->cuser['uid']);
            $user_credit = $user->user_credits;
        } else {
            $user_credit = 0;
        }
        if (isset($_SESSION[$this->cartuser]['shoppingItems'])) {
            foreach ($_SESSION[$this->cartuser]['shoppingItems'] as $key => $qty) {
                $totalQuantity = $totalQuantity + $qty['quantity'];
                $price = $qty['quantity'] * $qty['price'];
                $totalPrice = $totalPrice + $price;
                $shareItem = Share::where('id', '=', $qty['share_id'])
                        ->with('size')
                        ->first();
                if (count($shareItem)) {
                    $_SESSION[$this->cartuser]['shoppingItems'][$key]['allSize'] = $shareItem->size;
                }
            }
            $_SESSION[$this->cartuser]['totalQuantity'] = $totalQuantity;
            $_SESSION[$this->cartuser]['totalPrice'] = $totalPrice;

            foreach ($_SESSION[$this->cartuser]['shoppingItems'] as $key => $h) {
                $store_id[$key] = $h['store_id'];
            }
            $unique_store = array_unique($store_id);
            foreach ($unique_store as $key => $store) {
                $shipping_cost = $_SESSION[$this->cartuser]['shoppingItems'][$key]['shipping_cost'] + $shipping_cost;
            }
            $_SESSION[$this->cartuser]['shippingCost'] = $shipping_cost;
            $total_cost = $_SESSION[$this->cartuser]['totalPrice'] + $shipping_cost;
            $_SESSION[$this->cartuser]['totalPriceWithShippingCost'] = $total_cost;
        } else if (empty($_SESSION[$this->cartuser]['shoppingItems'])) {
            $_SESSION[$this->cartuser]['totalQuantity'] = 0;
            $_SESSION[$this->cartuser]['totalPrice'] = 0;
            $_SESSION[$this->cartuser]['totalPriceWithShippingCost'] = 0;
        }
        if (isset($_SESSION[$this->cartuser]['totalPriceWithShippingCost'])) {
            if ($user_credit < $_SESSION[$this->cartuser]['totalPriceWithShippingCost']) {
                if ($_SESSION[$this->cartuser]['shoppingItems']) {
                    if (isset($_SESSION[$this->cartuser]['freeshipping'])) {
                        $_SESSION[$this->cartuser]['totalPriceWithShippingCost'] = $_SESSION[$this->cartuser]['totalPrice'];
                    }
                    if (isset($_SESSION[$this->cartuser]['totalDiscount'])) {
                        if ($_SESSION[$this->cartuser]['totalDiscount'] != 0) {
                            $totalDiscount = 0;
                            foreach ($_SESSION[$this->cartuser]['shoppingItems'] as $key => $product) {
                                $discount = $_SESSION[$this->cartuser]['shoppingItems'][$key]['discount'] * $_SESSION[$this->cartuser]['shoppingItems'][$key]['quantity'];
                                $totalDiscount = $totalDiscount + $discount;
                            }
                            $_SESSION[$this->cartuser]['totalDiscount'] = round($totalDiscount, 2);
                            $_SESSION[$this->cartuser]['totalPriceWithShippingCost'] = $_SESSION[$this->cartuser]['totalPriceWithShippingCost'] - $_SESSION[$this->cartuser]['totalDiscount'];
                        }
                    }
                } else {
                    $_SESSION[$this->cartuser]['totalDiscount'] = 0;
                }
                $totalprice = $_SESSION[$this->cartuser]['totalPriceWithShippingCost'] - $user_credit;
            } else {
                if (isset($_SESSION[$this->cartuser]['shoppingItems'])) {
                    if (isset($_SESSION[$this->cartuser]['freeshipping'])) {
                        $_SESSION[$this->cartuser]['totalPriceWithShippingCost'] = $_SESSION[$this->cartuser]['totalPrice'];
                    }
                    if (isset($_SESSION[$this->cartuser]['totalDiscount'])) {
                        $totalDiscount = 0;
                        foreach ($_SESSION[$this->cartuser]['shoppingItems'] as $key => $product) {
                            $totalDiscount = $totalDiscount + $_SESSION[$this->cartuser]['shoppingItems'][$key]['discount'];
                        }
                        $_SESSION[$this->cartuser]['totalDiscount'] = round($totalDiscount, 2);
                        $_SESSION[$this->cartuser]['totalPriceWithShippingCost'] = $_SESSION[$this->cartuser]['totalPriceWithShippingCost'] - $_SESSION[$this->cartuser]['totalDiscount'];
                    }
                } else {
                    $_SESSION[$this->cartuser]['totalDiscount'] = 0;
                }
                $totalprice = $_SESSION[$this->cartuser]['totalPriceWithShippingCost'];
                $creditMessage = "this credit will be reduce from your store Balance";
                $this->_response['creditMessage'] = $creditMessage;
            }
        }
        $this->siteTitle = "ViewCart";
//echo "<pre>";print_r($_SESSION[$this->cartuser]['shoppingItems']);die;
        return View::make('user.cart.viewcart', array('response' => $this->_response, 'shipping_cost' => $shipping_cost, 'user_credit' => $user_credit, 'totalprice' => $totalprice, 'siteTitle' => $this->siteTitle));
    }

    public function increaseQuantity() {
        $input = Input::all();
        foreach ($_SESSION[$this->cartuser]['shoppingItems'] as $key => $item) {
            if ($_SESSION[$this->cartuser]['shoppingItems'][$key]['share_id'] == $input['share_id']) {
                $_SESSION[$this->cartuser]['shoppingItems'][$key]['quantity'] = $input['quantity'];
                //return;
            }
        }
    }

    public function changeItemSize() {
        $input = Input::all();
        foreach ($_SESSION[$this->cartuser]['shoppingItems'] as $key => $item) {
            if ($_SESSION[$this->cartuser]['shoppingItems'][$key]['share_id'] == $input['share_id']) {
                $_SESSION[$this->cartuser]['shoppingItems'][$key]['size'] = $input['size'];
            }
        }
    }

    public function deleteCartItem() {
        $input = Input::all();
        foreach ($_SESSION[$this->cartuser]['shoppingItems'] as $key => $item) {
            if ($_SESSION[$this->cartuser]['shoppingItems'][$key]['share_id'] == $input['share_id']) {
                unset($_SESSION[$this->cartuser]['shoppingItems'][$key]);
            }
        }
    }

    public function applyPromoCode() {
        $input = Input::all();
        $promoCode = $input["code"];
        $codeHelper = new CouponHelper();
        $coupon = $codeHelper->getCouponByCode($promoCode);
        if (count($coupon)) {
            if ($coupon[0]->status == "enabled") {
                if ($coupon[0]->date_start < time() && time() < $coupon[0]->date_end) {
                    if ($_SESSION[$this->cartuser]['totalPriceWithShippingCost'] > $coupon[0]->above) {
                        if ($coupon[0]->free_shipping == 1) {
                            $_SESSION[$this->cartuser]['totalPriceWithShippingCost'] = $_SESSION[$this->cartuser]['totalPrice'];
                            $_SESSION[$this->cartuser]['freeshipping'] = "Free";
                            $data['shipping'] = "Free";
                            return $this->ajax_success_response($data);
                        } else {
                            if ($coupon[0]->type == "fixed_amount") {
                                $_SESSION[$this->cartuser]['totalDiscount'] = $coupon[0]->discount;
                                $discountPerProduct = $coupon[0]->discount / $_SESSION[$this->cartuser]['totalQuantity'];
                                foreach ($_SESSION[$this->cartuser]['shoppingItems'] as $key => $product) {
                                    //$_SESSION[$this->cartuser]['shoppingItems'][$key]['discount'] = $discountPerProduct;
                                }
                                $data['discount'] = $coupon[0]->discount;
                                return $this->ajax_success_response($data);
                            } else {
                                $totalDiscount = 0;
                                foreach ($_SESSION[$this->cartuser]['shoppingItems'] as $key => $product) {
                                    $_SESSION[$this->cartuser]['shoppingItems'][$key]['discount'] = ($product['price'] * $coupon[0]->discount) / 100;
                                    $totalDiscount = $totalDiscount + $_SESSION[$this->cartuser]['shoppingItems'][$key]['discount'];
                                }
                                $_SESSION[$this->cartuser]['totalDiscount'] = $totalDiscount;
                                $data['discount'] = $totalDiscount;
                                return $this->ajax_success_response($data);
                            }
                        }
                    } else {
                        $message = "We are sorry, this voucher code will be applied if you buy above $" . $coupon[0]->above . " products";
                        return $this->ajax_failed_response($message);
                    }
                } else {
                    $message = "We are sorry, This Voucher is not available now.";
                    return $this->ajax_failed_response($message);
                }
            } else {
                $message = "We are sorry, This Voucher is disabled by administration.";
                return $this->ajax_failed_response($message);
            }
        } else {
            $message = "We are sorry, we do not recognize this voucher code. Please contact our customer service at support@pinkals.com for assistance.";
            return $this->ajax_failed_response($message);
        }
    }

    public function checkout() {
        if (!$this->islogin) {
//            if (isset($_SESSION[$this->cartuser])) {
//                $_SESSION['beforelogin'] = $_SESSION[$this->cartuser];
//            }
            return Redirect::to('/login');
        } else {
            $user = User::find($this->cuser['uid']);
            $shippinghelper = new ShoppingHelper();
            $userInfo = $shippinghelper->getOrderInfo($this->cuser['uid']);
            if (!empty($userInfo)) {
                $address = json_decode($userInfo->shipping_address);
                $user->address = $address;
            }
            $user_credit = $user->user_credits;
            if (isset($_SESSION[$this->cartuser]['shoppingItems'])) {
                if ($user_credit < $_SESSION[$this->cartuser]['totalPriceWithShippingCost']) {
                    if (isset($_SESSION[$this->cartuser]['freeshipping'])) {
                        $shipping_cost = 0;
                    } else {
                        $shipping_cost = $_SESSION[$this->cartuser]['shippingCost'];
                    }
                    $number = 1;
                    if (isset($_SESSION[$this->cartuser]['totalDiscount'])) {
                        $discount = $user_credit + $_SESSION[$this->cartuser]['totalDiscount'];
                    } else {
                        $discount = $user_credit;
                    }
                    $paymentButton = '<form name="_xclick" id="paypal_form" action="https://paypal.com/webscr" method="post" style="margin-top: -19px;margin-left: 20px;">
            <input type="hidden" name="cmd" value="_cart">
            <input type="hidden" name="upload" value="1">
            <input type="hidden" name="business" value="payment@yolove.it">
            <input type="hidden" name="currency_code" value="USD">';
                    foreach ($_SESSION[$this->cartuser]['shoppingItems'] as $key => $item) {
                        $paymentButton .= '<input type="hidden" name="item_name_' . $number . '" value="' . $item['title'] . '">
            <input type="hidden" name="amount_' . $number . '" value="' . $item['price'] . '">
            <input type="hidden" name="quantity_' . $number . '" value="' . $item['quantity'] . '">';
                        $number++;
                    }
                    $paymentButton .= '<input type="hidden" name="item_name_' . $number . '" value="Shipping Cost">
            <input type="hidden" name="amount_' . $number . '" value="' . $shipping_cost . '"> 
                <input type="hidden" name="discount_amount_cart" value="' . $discount . '">
            <input type="hidden" name="no_shipping" value="1">
            <input type="hidden" name="cancel_return" value = "' . URL::to('/') . '/viewcart" />
            <input type="hidden" name="return" value="' . URL::to('/') . '/returnUrl">
             Paypal
            <!--<input type="image" id="paypal" src="https://www.paypalobjects.com/webstatic/en_US/btn/btn_buynow_pp_142x27.png" border="0" name="submit" alt="Make payments with PayPal - its fast, free and secure!" style="">-->
        </form>';
                    $payment['paypal'] = $paymentButton;
//------------------Paypal-End-------------------------------
                } else {
//--------------------------Payment from Yolove Balance-Start--------
                    $paymentButton = '<a href="' . URL::to('/') . '/returnUrl?type=user_credit" style="background-color: #46bfc4;border: medium none;border-radius: 3px;color: #ffffff;font-size: 15px;padding: 8px 55px;">Direct Payment</a>';
                    $payment['direct'] = $paymentButton;
//--------------------------Payment from Yolove Balance-End--------
                }
                $this->siteTitle = "Checkout";
                return View::make('user.cart.checkout', array('response' => $this->_response, 'user' => $user, 'paymentButton' => $payment, 'siteTitle' => $this->siteTitle));
            } else {
                return Redirect::to('/viewcart');
            }
        }
    }

    public function addCartToDatabase() {
        $input = Input::all();
        if (isset($_SESSION[$this->cartuser]['freeshipping'])) {
            $shipping_cost = $_SESSION[$this->cartuser]['freeshipping'];
        } else {
            $shipping_cost = $_SESSION[$this->cartuser]['totalPriceWithShippingCost'] - $_SESSION[$this->cartuser]['totalPrice'];
        }
        $shipping_info = array();
        $shipping_info['product_cost'] = $_SESSION[$this->cartuser]['totalPrice'];
        $shipping_info['status'] = "unpaid";
        $shipping_info['shipping_cost'] = $shipping_cost;
        $shipping_info['total_cost'] = $_SESSION[$this->cartuser]['totalPriceWithShippingCost'];
        $shipping_address = json_encode($input);
        $shipping_info['shipping_address'] = $shipping_address;
        $shipping_info['shoppingItems'] = json_encode($_SESSION[$this->cartuser]['shoppingItems']);
        $orderHelper = new ShoppingHelper();
        $transaction = $orderHelper->createOrder($shipping_info, $this->cuser);
    }

    public function returnUrl() {
        $input = Input::all();
        $orderHelper = new ShoppingHelper();
        $OrderInfo = $orderHelper->getOrderInfo($this->cuser['uid']);
        $info = json_decode($OrderInfo->shipping_address);
        $creditHelper = new UserHelper();
        if (isset($input['tx'])) {
            $returnValue['tx'] = $input['tx'];
            $returnValue['st'] = $input['st'];
            $returnValue['amt'] = $input['amt'];
            $returnValue['cc'] = $input['cc'];
            $returnFromPaypal['return_value'] = serialize($returnValue);
            $returnFromPaypal['payment_type'] = "paypal";
            $returnFromPaypal['status'] = "paid";
            $changeStatus = $orderHelper->updateOrder($this->cuser['uid'], $returnFromPaypal);
            $newCredit = 0;
            $userCredit = $creditHelper->updateUserCredit($this->cuser['uid'], $newCredit);
            foreach ($_SESSION[$this->cartuser]['shoppingItems'] as $k => $itemData) {
                if (!empty($itemData['sizeId'])) {
                    $orderHelper->updateQuantity($itemData['sizeId'], $itemData['quantity']);
                }
            }
            if (!empty($changeStatus)) {
                unset($_SESSION[$this->cartuser]);
            }
            $emaiData = array();
            $emaiData = array('user' => "", 'email' => $info->email, 'collection' => "", 'msg' => " Admin have received your Order. Your Order Id is : #" . $OrderInfo->unique_token_id . " ", 'subject' => " Order place on Yolove.it ", 'see_post' => "", 'name' => $info->name);
            $mail = new MailHelper();
            $mail = $mail->sendMail($emaiData);
            $message = "Your paypal transaction is succesfull. Admin will approved your order and an email will send to you";
            return Redirect::to('/success?message=' . $message);
        } elseif (isset($input['type'])) {
            $returnValue = NULL;
            $returnFromUrl['return_value'] = serialize($returnValue);
            $returnFromUrl['payment_type'] = "user_credit";
            $returnFromUrl['status'] = "paid";
            $changeStatus = $orderHelper->updateOrder($this->cuser['uid'], $returnFromUrl);
            $user = User::find($this->cuser['uid']);
            $credit = $user->user_credits;
            $newCredit = $credit - $_SESSION[$this->cartuser]['totalPriceWithShippingCost'];
            $userCredit = $creditHelper->updateUserCredit($this->cuser['uid'], $newCredit);
            foreach ($_SESSION[$this->cartuser]['shoppingItems'] as $k => $itemData) {
                if (!empty($itemData['sizeId'])) {
                    $orderHelper->updateQuantity($itemData['sizeId'], $itemData['quantity']);
                }
            }
            if (!empty($changeStatus)) {
                unset($_SESSION[$this->cartuser]);
            }
            $emaiData = array();
            $emaiData = array('user' => "", 'email' => $info->email, 'collection' => "", 'msg' => " Admin have received your Order. Your Order Id is : #" . $OrderInfo->unique_token_id . " ", 'subject' => " Order place on Yolove.it ", 'see_post' => "", 'name' => $info->name);
            $mail = new MailHelper();
            $mail = $mail->sendMail($emaiData);
            $message = "Your transaction is succesfull. Transaction amount will be deducted from your credits. Admin will approved your order and an email will send to you";
            return Redirect::to('/success?message=' . $message);
        } elseif ($input['skey']) {
            $skey = $input['skey'];
            $vkey = "ab9aa88ffb6115ed060cf4658d0db6f2";
            $key0 = md5($input['tranID'] . $input['orderid'] . $input['status'] . $input['domain'] . $input['amount'] . $input['currency']);
            $key1 = md5($input['paydate'] . $input['domain'] . $key0 . $input['appcode'] . $vkey);
            if ($skey === $key1) {
                if ($input['status'] == "00") {
                    $returnValue['orderid'] = $input['orderid'];
                    $returnValue['appcode'] = $input['appcode'];
                    $returnValue['tranID'] = $input['tranID'];
                    $returnValue['domain'] = $input['domain'];
                    $returnValue['amount'] = $input['amount'];
                    $returnValue['status'] = "success";
                    $returnValue['currency'] = $input['currency'];
                    $returnValue['paydate'] = $input['paydate'];
                    $returnValue['skey'] = $input['skey'];
                    $returnValue['channel'] = $input['channel'];
                    $returnFromMolpay['return_value'] = serialize($returnValue);
                    $returnFromMolpay['payment_type'] = "molpay";
                    $returnFromMolpay['status'] = "paid";
                    $changeStatus = $orderHelper->updateOrder($this->cuser['uid'], $returnFromMolpay);
                    $newCredit = 0;
                    $userCredit = $creditHelper->updateUserCredit($this->cuser['uid'], $newCredit);
                    foreach ($_SESSION[$this->cartuser]['shoppingItems'] as $k => $itemData) {
                        if (!empty($itemData['sizeId'])) {
                            $orderHelper->updateQuantity($itemData['sizeId'], $itemData['quantity']);
                        }
                    }
                    if (!empty($changeStatus)) {
                        unset($_SESSION[$this->cartuser]);
                    }
                    $emaiData = array();
                    $emaiData = array('user' => "", 'email' => $info['email'], 'collection' => "", 'msg' => " Admin have received your Order. Your Order Id is : #" . $OrderInfo->unique_token_id . " ", 'subject' => " Order place on Yolove.it ", 'see_post' => "", 'name' => $info['name']);
                    $mail = new MailHelper();
                    $mail = $mail->sendMail($emaiData);
                    $message = "Your transaction is succesfull. Admin will approved your order and an email will send to you";
                    return Redirect::to('/success?message=' . $message);
                }
            } elseif ($skey != $key1) {
                return View::make('user.cart.cancel', array('response' => $this->_response));
            }
        } else {
            return View::make('user.cart.cancel', array('response' => $this->_response));
        }
    }

    public function success() {
        $message = Input::get('message');
        return View::make('user.cart.success', array('response' => $this->_response, 'message' => $message));
    }

    public function getOrderInfo() {
        $input = Input::all();
        $orderHelper = new ShoppingHelper();
        $orderStatus = $orderHelper->getOrderStatus($input);
        if (!empty($orderStatus)) {
            $orderStatus->last_update = date("Y-m-d H:i:s", $orderStatus->update_time);
            $orderStatus->created_at = date("Y-m-d H:i:s", $orderStatus->create_time);
            $orderProduct = $orderHelper->getProductByOrder($orderStatus->id);
            foreach ($orderProduct as $key => $item) {
                if ($orderProduct[$key]->status == "") {
                    $orderProduct[$key]->status = "Order Being Processed";
                } else {

                    $orderProduct[$key]->status = "Received";
                }
            }
            return View::make('user.cart.showorder', array('response' => $this->_response, 'orderStatus' => $orderStatus, 'orderProduct' => $orderProduct));
        }
    }

    public function updateStatus() {
        $id = Input::get("idVal");
        $status = Input::get("status");
        $shpment = ShippingProduct::find($id);

        $shpment->status = $status;

        $shpment->save();

        return $shpment;
    }

}

?>
