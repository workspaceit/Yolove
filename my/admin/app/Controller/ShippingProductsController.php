<?php

App::uses('AppController', 'Controller');

/**
 * ShippingProducts Controller
 *
 * @property ShippingProduct $ShippingProduct
 * @property PaginatorComponent $Paginator
 */
class ShippingProductsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    /**
     * index method
     *
     * @return void
     */
    public function index($id = NULL) {
        $this->ShippingProduct->recursive = 0;
        $this->Paginator->settings = array(
            'conditions' => array('ShippingProduct.transaction_id like ' => $id),
            'order' => array('id' => 'ASC'),
//            'limit' => 100
        );
        $result = $this->Paginator->paginate();
        $items = array();
        $this->loadModel('Item');
        foreach ($result as $key => $product):
            $items[$key] = $this->Item->find('first', array(
                'conditions' => array('Item.id' => $product['Share']['item_id'])
            ));
            if (!empty($items[$key])) {
                $items[$key]['slugTitle'] = $this->createSlug($items[$key]['Item']['title']);
            }
        endforeach;
        $this->loadModel('ShippingInfo');
        $shippingInfos = $this->ShippingInfo->find('first', array(
            'conditions' => array('ShippingInfo.id' => $id)
        ));
        $this->set('items', $items);
        $this->set('shippingInfos', $shippingInfos);
        $this->set('shippingProducts', $this->Paginator->paginate());
    }

    public function paid($limit = 10) {
        $this->ShippingProduct->recursive = 0;
        $this->Paginator->settings = array(
            'conditions' => array('ShippingInfo.status like ' => 'paid'),
            'limit' => $limit
        );
        $this->set('limits', $limit);
        $this->set('shippingProducts', $this->Paginator->paginate());
    }

    public function unpaid($limit = 10) {
        $this->ShippingProduct->recursive = 0;
        $this->Paginator->settings = array(
            'conditions' => array('ShippingInfo.status like ' => 'unpaid'),
            'limit' => $limit
        );
        $this->set('limits', $limit);
        $this->set('shippingProducts', $this->Paginator->paginate());
    }

    public function follow_up($limit = 10) {
        $this->ShippingProduct->recursive = 0;

        $this->Paginator->settings = array(
            'conditions' => array('ShippingInfo.status like ' => 'follow_up'),
            'limit' => $limit
        );
        $this->set('limits', $limit);
        $this->set('shippingProducts', $this->Paginator->paginate());
    }

    public function complete($limit = 10) {
        $this->ShippingProduct->recursive = 0;
        $this->Paginator->settings = array(
            'conditions' => array('ShippingInfo.status like ' => 'complete'),
            'limit' => $limit
        );
        $this->set('limits', $limit);
        $this->set('shippingProducts', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->ShippingProduct->exists($id)) {
            throw new NotFoundException(__('Invalid shipping product'));
        }
        $options = array('conditions' => array('ShippingProduct.' . $this->ShippingProduct->primaryKey => $id));
        $this->set('shippingProduct', $this->ShippingProduct->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->ShippingProduct->create();
            if ($this->ShippingProduct->save($this->request->data)) {
//                $this->Session->setFlash(__('The shipping product has been saved.'));
                $data = '<div class="alert alert-info span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The product has been saved.</strong>
                            <br>
                            </div>';
                $this->Session->setFlash(__($data));
                return $this->redirect(array('action' => 'index'));
            } else {
//                $this->Session->setFlash(__('The shipping product could not be saved. Please, try again.'));
                $data = '<div class="alert alert-error span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The product could not be saved. Please, try again.</strong>
                            <br>
                            </div>';
                $this->Session->setFlash(__($data));
            }
        }
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->ShippingProduct->exists($id)) {
            throw new NotFoundException(__('Invalid shipping product'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->ShippingProduct->save($this->request->data)) {
//                $this->Session->setFlash(__('The shipping product has been saved.'));
                $data = '<div class="alert alert-info span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The product has been saved.</strong>
                            <br>
                            </div>';
                $this->Session->setFlash(__($data));
                return $this->redirect(array('action' => 'index'));
            } else {
//                $this->Session->setFlash(__('The shipping product could not be saved. Please, try again.'));
                $data = '<div class="alert alert-error span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The product could not be saved. Please, try again.</strong>
                            <br>
                            </div>';
                $this->Session->setFlash(__($data));
            }
        } else {
            $options = array('conditions' => array('ShippingProduct.' . $this->ShippingProduct->primaryKey => $id));
            $this->request->data = $this->ShippingProduct->find('first', $options);
        }
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->ShippingProduct->id = $id;
        if (!$this->ShippingProduct->exists()) {
            throw new NotFoundException(__('Invalid shipping product'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->ShippingProduct->delete()) {
//            $this->Session->setFlash(__('The shipping product has been deleted.'));
            $data = '<div class="alert alert-info span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The product has been deleted.</strong>
                            <br>
                            </div>';
            $this->Session->setFlash(__($data));
            $this->redirect($this->referer());
        } else {
//            $this->Session->setFlash(__('The shipping product could not be deleted. Please, try again.'));
            $data = '<div class="alert alert-error span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The product could not be deleted. Please, try again.</strong>
                            <br>
                            </div>';
            $this->Session->setFlash(__($data));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function editProduct() {
        $this->autoRender = false;
        if ($this->request->isAjax()) {
            if ($_POST['productid']) {
                $this->loadModel('User');
                $userinfo = $this->User->find('first', array(
                    'conditions' => array('User.id' => $_POST['userid'])
                ));
                $edit_product = array(
                    'id' => $_POST['productid'],
                    'status' => "returned"
                );

                $this->ShippingProduct->save($edit_product);
                $add_credit = array(
                    'id' => $_POST['userid'],
                    'user_credits' => $userinfo['User']['user_credits'] + $_POST['add']
                );

                $this->User->save($add_credit);
                $data = '<div class="alert alert-info span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The product has been saved.</strong>
                            <br>
                            </div>';
                $this->Session->setFlash(__($data));
            }
        }
    }

    public function cartAction() {
        $this->loadModel('User');
        $this->loadModel('ShippingInfo');
        $this->autoRender = false;
        if ($this->request->isAjax()) {
            $uid = $_POST['uid'];
            $tid = $_POST['tid'];
            $pid = $_POST['pid'];
            $status = $_POST['status'];
            $shippingCost = 0;
            $shippedPrice = 0;
            $totalRefundPrice = 0;
            $userinfo = $this->User->find('first', array(
                'conditions' => array('User.id' => $uid)
            ));
            $getstatus = $this->ShippingInfo->find('first', array(
                'conditions' => array('ShippingInfo.id' => $tid)
            ));
            $email = json_decode($getstatus['ShippingInfo']['shipping_address']);
            if ($status) {
                $ItemStatus = $status;
            }
            if ($ItemStatus) {
                $shippedItemInfo = array();
                foreach ($ItemStatus as $key => $item) {
                    if ($item['status'] == "shipped") {
                        $shippedItemInfo[] = $this->ShippingProduct->find('first', array(
                            'conditions' => array('ShippingProduct.id' => $item['itemId'])
                        ));
                    }
                }
                if (!empty($shippedItemInfo)) {
                    foreach ($shippedItemInfo as $key => $h) {
                        $store_id[$key] = $h['ShippingProduct']['store_id'];
                    }
                    $unique_store = array_unique($store_id);
                    foreach ($unique_store as $key => $store) {
                        $shippingCost = $shippingCost + $shippedItemInfo[$key]['ShippingProduct']['shipping_cost'];
                    }

                    foreach ($shippedItemInfo as $key => $shippedItem) {

                        $price = $shippedItem['ShippingProduct']['price'] * $shippedItem['ShippingProduct']['quantity'];
                        $shippedPrice = $shippedPrice + $price;
                    }
                    $totalShippedPrice = $shippedPrice + $shippingCost;
                } else {
                    $totalShippedPrice = 0;
                }
                $totalRefundPrice = round($getstatus['ShippingInfo']['total_cost']) - round($totalShippedPrice);
                if ($totalRefundPrice != 0) {
                    if ($pid && $getstatus['ShippingInfo']['payment_type'] == "paypal") {
                        $paypalAmt = unserialize($getstatus['ShippingInfo']['return_from_paypal']);
                        $payViaPaypal = $paypalAmt['amt'];
                        $returnBalance = $getstatus['ShippingInfo']['total_cost'] - $payViaPaypal;
                        if ($totalRefundPrice > $payViaPaypal) {
                            $totalRefundPrice = $payViaPaypal;
                        }
                        if ($totalShippedPrice > $returnBalance) {
                            $returnBalance = 0;
                        } else {
                            $returnBalance = $returnBalance - $totalShippedPrice;
                        }
                        $aryData['transactionID'] = $pid;
                        $aryData['refundType'] = "Partial"; //Partial or Full
                        $aryData['currencyCode'] = "MYR";
                        $aryData['amount'] = $totalRefundPrice;
                        $aryData['memo'] = "There Memo Detail entered for Partial Refund";
                        $aryData['invoiceID'] = "";
                        App::import('Component', 'PayPalRefund');
                        $ref = new PayPalRefundComponent("sandbox");
                        $aryRes = $ref->refundAmount($aryData);
                        if ($aryRes['ACK'] == "Success") {
                            foreach ($ItemStatus as $key => $product) {
                                $changeProductStatus = $this->changeProductStatusto($product['itemId'], $product['status']);
                            }
                            $orderStatus = "complete";
                            $changeStatus = $this->changeStatusto($tid, $orderStatus);
                            $returnCredit = $this->changeCradit($uid, $returnBalance);
                            $emaiData = array();
                            $emaiData = array('user' => "", 'email' => $email->email, 'collection' => "", 'msg' => " Admin Cannot approved all of your product ,Some of the requested products are not available in our store. Your payment for those order will be Refunded. Admin refunnd $" . $totalRefundPrice . " to your paypal account and $" . $returnBalance . " to your yolove.it balance", 'subject' => " Buying product on Yolove.it ", 'see_post' => "", 'name' => $userinfo['User']['nickname']);
                            $this->sendMail($emaiData);
                        } else {
                            echo "Error Refunding Amount";
                            echo "<pre>";
                            print_r($aryRes);
                            echo "</pre>";
                            die();
                        }
                    } elseif ($pid && $getstatus['ShippingInfo']['payment_type'] == "molpay") {
                        $paypalAmt = unserialize($getstatus['ShippingInfo']['return_from_paypal']);
                        $payViamolpay = $paypalAmt['amount'];
                        $returnBalance = $getstatus['ShippingInfo']['total_cost'] - $payViamolpay;
                        if ($totalRefundPrice > $payViamolpay) {
                            $totalRefundPrice = $payViamolpay;
                        }
                        if ($totalShippedPrice > $returnBalance) {
                            $returnBalance = 0;
                        } else {
                            $returnBalance = $returnBalance - $totalShippedPrice;
                        }
                        foreach ($ItemStatus as $key => $product) {
                            $changeProductStatus = $this->changeProductStatusto($product['itemId'], $product['status']);
                        }
                        $orderStatus = "complete";
                        $changeStatus = $this->changeStatusto($tid, $orderStatus);
                        $returnCredit = $this->changeCradit($uid, $returnBalance);
                        $emaiData = array();
                        $emaiData = array('user' => "", 'email' => $email->email, 'collection' => "", 'msg' => " Admin Cannot approved all of your product ,Some of the requested products are not available in our store. Your payment for those order will be Refunded. Admin refunnd $" . $totalRefundPrice . " to your paypal account and $" . $returnBalance . " to your yolove.it balance", 'subject' => " Buying product on Yolove.it ", 'see_post' => "", 'name' => $userinfo['User']['nickname']);
                        $this->sendMail($emaiData);
                    } else {
                        $returnBalance = $totalRefundPrice;
                        foreach ($ItemStatus as $key => $product) {
                            $changeProductStatus = $this->changeProductStatusto($product['itemId'], $product['status']);
                        }
                        $orderStatus = "complete";
                        $changeStatus = $this->changeStatusto($tid, $orderStatus);
                        $returnCredit = $this->changeCradit($uid, $returnBalance);
                        $emaiData = array();
                        $emaiData = array('user' => "", 'email' => $email->email, 'collection' => "", 'msg' => " Admin approved your order ,All of the requested products will deliverd soon.", 'subject' => " Buying product on Yolove.it ", 'see_post' => "", 'name' => $userinfo['User']['nickname']);
                        $this->sendMail($emaiData);
                    }
                } else {
                    foreach ($ItemStatus as $key => $product) {
                        $changeProductStatus = $this->changeProductStatusto($product['itemId'], $product['status']);
                    }
                    $orderStatus = "complete";
                    $changeStatus = $this->changeStatusto($tid, $orderStatus);
                    $emaiData = array();
                    $emaiData = array('user' => "", 'email' => $email->email, 'collection' => "", 'msg' => " Admin approved your order ,All of the requested products will deliverd soon.", 'subject' => " Buying product on Yolove.it ", 'see_post' => "", 'name' => $userinfo['User']['nickname']);
                    $this->sendMail($emaiData);
                }
            }
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function orderFollowUp() {
        $this->loadModel('User');
        $this->loadModel('ShippingInfo');
        $orderId = $_POST['order_id'];
        $orderStatus = $_POST['order_status'];
        $userId = $_POST['user_id'];
        $message = $_POST['message'];
        $userinfo = $this->User->find('first', array(
            'conditions' => array('User.id' => $userId)
        ));
        $getstatus = $this->ShippingInfo->find('first', array(
            'conditions' => array('ShippingInfo.id' => $orderId)
        ));
        $unique_token_id = $getstatus['ShippingInfo']['unique_token_id'];
        $email = json_decode($getstatus['ShippingInfo']['shipping_address']);
        $emaiData = array();
        $emaiData = array('user' => "", 'email' => $email->email, 'collection' => "", 'msg' => $message, 'subject' => "Follow Up Order #" . $unique_token_id . " on Yolove.it", 'see_post' => "", 'name' => $userinfo['User']['nickname']);
        $this->sendMail($emaiData);
        $changeStatus = $this->changeStatusto($orderId, $orderStatus);
        return $this->redirect(array('action' => 'index'));
    }

    public function changeStatustoReturned() {
        $this->loadModel('User');
        $this->loadModel('ShippingInfo');
        $itemStatus = $_POST['item_status'];
        $itemId = $_POST['item_id'];
        $userId = $_POST['uid'];
        $orderId = $_POST['tid'];
        $credits = $_POST['price'];
        $quantity = $_POST['quantity'];
        if ($itemStatus == "returned") {
            $userinfo = $this->User->find('first', array(
                'conditions' => array('User.id' => $userId)
            ));
            $getstatus = $this->ShippingInfo->find('first', array(
                'conditions' => array('ShippingInfo.id' => $orderId)
            ));
            $unique_token_id = $getstatus['ShippingInfo']['unique_token_id'];
            $email = json_decode($getstatus['ShippingInfo']['shipping_address']);
            $credits = $credits * $quantity;
            $credits = $credits + $userinfo['User']['user_credits'];
            $returnCredit = $this->changeCradit($userId, $credits);
            $emaiData = array();
            $emaiData = array('user' => "", 'email' => $email->email, 'collection' => "", 'msg' => $message, 'subject' => "Follow Up Order #" . $unique_token_id . " on Yolove.it", 'see_post' => "", 'name' => $userinfo['User']['nickname']);
            $this->sendMail($emaiData);
            $changeProductStatus = $this->changeProductStatusto($itemId, $itemStatus);
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function changeProductStatusto($id, $status) {
        $edit_shippingProduct = array(
            'id' => $id,
            'status' => $status
        );
        $this->ShippingProduct->save($edit_shippingProduct);
    }

    public function changeStatusto($orderId, $orderStatus) {
        $this->loadModel('ShippingInfo');
        $edit_shippingInfo = array(
            'id' => $orderId,
            'status' => $orderStatus
        );
        $this->ShippingInfo->save($edit_shippingInfo);
    }

    public function changeCradit($userId, $balance) {
//        $this->loadModel('User');
//        $userinfo = $this->User->find('first', array(
//            'conditions' => array('User.id' => $userId)
//        ));
        $add_credit = array(
            'id' => $userId,
            'user_credits' => $balance
        );
        $this->User->save($add_credit);
    }

    public function sendMail($data) {
        $this->loadModel('Setting');
        $smtpEmail = $this->Setting->find('first', array(
            'conditions' => array('Setting.set_key' => 'email')
        ));
        if ($smtpEmail) {
            $sender = unserialize($smtpEmail['Setting']['set_value']);
            $serverEmail = $sender['from'];
        }
        $subject = $data['subject'];
        $message = '<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet"></head>';
        $message .= '<div style="width:690px;height:auto;margin-right:auto;margin-left:auto;background:#f8f8f8;margin-top:20px;padding:20px 0px">
	<div style="min-height: 500px;">
	

	<div style="background:#46BFC4;min-height:60px;padding-top:20px;text-align:center;border:1px solid #ddd;width:600px;margin-left:auto;margin-right:auto;">
	
		<img src="http://yolove.it/sg/assets/css/logo_email.png"/>
	</div>	

	<div style="margin-top:20px;border:1px solid #ddd;background:#fff;width:600px;margin-left:auto;margin-right:auto;min-height:100px;text-align:center;padding:50px 0;">
		<p style="font-size: 22px">Hi ' . $data['name'] . '</p>
                <p style="font-size: 22px">' . $data['user'] . '</a>' . $data['msg'] . $data['collection'] . '</p>
		<p style="font-size: 22px"><img style="padding: 10px 15px;" src="http://yolove.it/sg/assets/css/yolove_email.png"/> <br> </p>

		<div  style="padding:10px 0;border:1px solid #ddd;background:#f2f2f2;width:500px;margin-left:auto;margin-right:auto;min-height:20px;text-align:center;">
			' . $data['see_post'] . '
		</div>

	</div>

	<div style="margin-top:20px;border:1px solid #ddd;background:#fff;width:600px;margin-left:auto;margin-right:auto;min-height:50px;text-align:center;padding:50px 0; padding-bottom: 0px;">
		<p> 
			<a style= "text-decoration: none; color: #46BFC4;"  href="https://www.facebook.com/pages/Pinkalscom/564548893582317?ref=hl"><img style="padding: 10px 5px 20px 5px;" src ="http://yolove.it/sg/assets/css/facebook_email.png"/></a>
			<a style= "text-decoration: none; color: #46BFC4;"  href="https://twitter.com/PinkalsLLP"><img style="padding: 10px 5px 20px 5px;" src ="http://yolove.it/sg/assets/css/twitter_email.png"/></a>
			<a style= "text-decoration: none; color: #46BFC4;" href="http://yolove.it/sg"><img style="padding: 10px 5px 20px 5px;" src ="http://yolove.it/sg/assets/css/instagram_email.png"/></a>
		</p>

		<p style="font-size: 16px;">This email was sent by Yolove.it. <a style="text-decoration:none;color:#46BFC4"  href="http://' . $exp[0] . '.' . $exp[1] . '/home/basicsetting">You can edit your notification settings on Yolove.it</a> <br> Thank you </p>
	
		<div style="margin-top:30px;background:#46BFC4;width:600px;margin-left:auto;margin-right:auto;min-height:30px;padding-top:10px;text-align:center;">
	    	<img src="http://yolove.it/sg/assets/css/logo_footer_email.png"/>
		</div>

			</div>
	</div>


</div>';
        $to = $data['email'];
        $from = $serverEmail;
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From:" . $from;
        mail($to, $subject, $message, $headers);
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

}
