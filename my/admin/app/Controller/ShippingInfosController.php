<?php

App::uses('AppController', 'Controller');
App::import('Controller', 'ShippingProducts');

/**
 * ShippingInfos Controller
 *
 * @property ShippingInfo $ShippingInfo
 * @property PaginatorComponent $Paginator
 */
class ShippingInfosController extends AppController {

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
    public function index($limit = 10) {
        $this->ShippingInfo->recursive = 0;
        $this->Paginator->settings = array(
            'order' => array('id' => 'DESC'),
            'limit' => $limit,
        );
        $this->set('limits', $limit);
        $this->set('shippingInfos', $this->Paginator->paginate());
    }

    public function paid($limit = 10) {
        $this->ShippingInfo->recursive = 0;
        $this->Paginator->settings = array(
            'conditions' => array('ShippingInfo.status like ' => 'paid'),
            'order' => array('id' => 'DESC'),
            'limit' => $limit
        );
        $this->set('limits', $limit);
        $this->set('shippingInfos', $this->Paginator->paginate());
    }

    public function unpaid($limit = 10) {
        $this->ShippingInfo->recursive = 0;
        $this->Paginator->settings = array(
            'conditions' => array('ShippingInfo.status like ' => 'unpaid'),
            'order' => array('id' => 'DESC'),
            'limit' => $limit
        );
        $this->set('limits', $limit);
        $this->set('shippingInfos', $this->Paginator->paginate());
    }

    public function follow_up($limit = 10) {
        $this->ShippingInfo->recursive = 0;

        $this->Paginator->settings = array(
            'conditions' => array('ShippingInfo.status like ' => 'follow_up'),
            'order' => array('id' => 'DESC'),
            'limit' => $limit
        );
        $this->set('limits', $limit);
        $this->set('shippingInfos', $this->Paginator->paginate());
    }

    public function complete($limit = 10) {
        $this->ShippingInfo->recursive = 0;
        $this->Paginator->settings = array(
            'conditions' => array('ShippingInfo.status like ' => 'complete'),
            'order' => array('id' => 'DESC'),
            'limit' => $limit
        );
        $this->set('limits', $limit);
        $this->set('shippingInfos', $this->Paginator->paginate());
    }

    public function details($id = NULL) {
        $this->loadModel('ShippingProduct');
        $products = $this->ShippingProduct->find('all', array(
            'conditions' => array('ShippingProduct.transaction_id' => $id)
        ));

        $items = array();
        $this->loadModel('Item');
        foreach ($products as $product):
            $items[] = $this->Item->find('first', array(
                'conditions' => array('Item.id' => $product['Share']['item_id'])
            ));
        endforeach;

        $this->set('products', $products);
        $this->set('items', $items);
        $this->set('shippingInfos', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->ShippingInfo->exists($id)) {
            throw new NotFoundException(__('Invalid shipping info'));
        }

        $options = array('conditions' => array('ShippingInfo.' . $this->ShippingInfo->primaryKey => $id));

        $this->set('shippingInfo', $this->ShippingInfo->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->ShippingInfo->create();
            if ($this->ShippingInfo->save($this->request->data)) {
//                $this->Session->setFlash(__('The shipping info has been saved.'));
                $data = '<div class="alert alert-info span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The shipping info has been saved.</strong>
                            <br>
                            </div>';
                $this->Session->setFlash(__($data));
                return $this->redirect(array('action' => 'index'));
            } else {
//                $this->Session->setFlash(__('The shipping info could not be saved. Please, try again.'));
                $data = '<div class="alert alert-error span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The shipping info could not be saved. Please, try again.</strong>
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
        if (!$this->ShippingInfo->exists($id)) {
            throw new NotFoundException(__('Invalid shipping info'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->ShippingInfo->save($this->request->data)) {
//                $this->Session->setFlash(__('The shipping info has been saved.'));
                $data = '<div class="alert alert-info span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The shipping info has been saved.</strong>
                            <br>
                            </div>';
                $this->Session->setFlash(__($data));
                return $this->redirect(array('action' => 'index'));
            } else {
//                $this->Session->setFlash(__('The shipping info could not be saved. Please, try again.'));
                $data = '<div class="alert alert-error span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The shipping info could not be saved. Please, try again.</strong>
                            <br>
                            </div>';
                $this->Session->setFlash(__($data));
            }
        } else {
            $options = array('conditions' => array('ShippingInfo.' . $this->ShippingInfo->primaryKey => $id));
            $this->request->data = $this->ShippingInfo->find('first', $options);
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
        $this->ShippingInfo->id = $id;
        if (!$this->ShippingInfo->exists()) {
            throw new NotFoundException(__('Invalid shipping info'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->ShippingInfo->delete()) {
//            $this->Session->setFlash(__('The shipping info has been deleted.'));
            $data = '<div class="alert alert-info span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The shipping info has been deleted.</strong>
                            <br>
                            </div>';
            $this->Session->setFlash(__($data));
            $this->redirect($this->referer());
        } else {
//            $this->Session->setFlash(__('The shipping info could not be deleted. Please, try again.'));
            $data = '<div class="alert alert-error span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The shipping info could not be deleted. Please, try again.</strong>
                            <br>
                            </div>';
            $this->Session->setFlash(__($data));
        }
        return $this->redirect(array('action' => 'unpaid'));
    }

    public function updateStatus() {
        $edit_product = array(
            'id' => $_POST['id'],
            'status' => "complete"
        );

        $this->ShippingInfo->save($edit_product);
        $data = '<div class="alert alert-info span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The product has been saved.</strong>
                            <br>
                            </div>';
        $this->Session->setFlash(__($data));
    }
    
    public function changeOrderStatus() {
        $id = $_POST['id'];
        $status = $_POST['status'];
        $products = new ShippingProductsController;
        $products->changeStatusto($id, $status);
        $data = '<div class="alert alert-info span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The Status has been changed.</strong>
                            <br>
                            </div>';
        $this->Session->setFlash(__($data));
        die();
    }

}
