<?php

App::uses('AppController', 'Controller');

/**
 * Coupons Controller
 *
 * @property Coupon $Coupon
 * @property PaginatorComponent $Paginator
 */
class CouponsController extends AppController {

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
        $this->Coupon->recursive = 0;
        $this->Paginator->settings = array(
            'limit' => $limit,
            'order' => array('id' => 'ASC'),
        );
        $this->set('limits', $limit);
        $this->set('coupons', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Coupon->exists($id)) {
            throw new NotFoundException(__('Invalid coupon'));
        }
        $options = array('conditions' => array('Coupon.' . $this->Coupon->primaryKey => $id));
        $this->set('coupon', $this->Coupon->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->request->data['Coupon']['date_start'] = strtotime($this->request->data['Coupon']['date_start']);
            $this->request->data['Coupon']['date_end'] = strtotime($this->request->data['Coupon']['date_end']);
            $this->Coupon->create();
            if ($this->Coupon->save($this->request->data)) {
//                $this->Session->setFlash(__('The coupon has been saved.'));
                $data = '<div class="alert alert-info span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The coupon has been saved.</strong>
                            <br>
                            </div>';
                $this->Session->setFlash(__($data));
                return $this->redirect(array('action' => 'index'));
            } else {
//                $this->Session->setFlash(__('The coupon could not be saved. Please, try again.'));
                $data = '<div class="alert alert-error span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The coupon could not be saved. Please, try again.</strong>
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
        if (!$this->Coupon->exists($id)) {
            throw new NotFoundException(__('Invalid coupon'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->request->data['Coupon']['date_start'] = strtotime($this->request->data['Coupon']['date_start']);
            $this->request->data['Coupon']['date_end'] = strtotime($this->request->data['Coupon']['date_end']);
            if ($this->Coupon->save($this->request->data)) {
//                $this->Session->setFlash(__('The coupon has been saved.'));
                $data = '<div class="alert alert-info span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The coupon has been saved.</strong>
                            <br>
                            </div>';
                $this->Session->setFlash(__($data));
                return $this->redirect(array('action' => 'index'));
            } else {
//                $this->Session->setFlash(__('The coupon could not be saved. Please, try again.'));
                $data = '<div class="alert alert-error span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The coupon could not be saved. Please, try again.</strong>
                            <br>
                            </div>';
                $this->Session->setFlash(__($data));
            }
        } else {
            $options = array('conditions' => array('Coupon.' . $this->Coupon->primaryKey => $id));
            $this->request->data = $this->Coupon->find('first', $options);
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
        $this->Coupon->id = $id;
        if (!$this->Coupon->exists()) {
            throw new NotFoundException(__('Invalid coupon'));
        }
        $this->request->allowMethod('post', 'delete', 'get');
        if ($this->Coupon->delete()) {
//            $this->Session->setFlash(__('The coupon has been deleted.'));
            $data = '<div class="alert alert-info span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The coupon has been deleted.</strong>
                            <br>
                            </div>';
            $this->Session->setFlash(__($data));
            $this->redirect($this->referer());
        } else {
//            $this->Session->setFlash(__('The coupon could not be deleted. Please, try again.'));
            $data = '<div class="alert alert-error span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The coupon could not be deleted. Please, try again.</strong>
                            <br>
                            </div>';
            $this->Session->setFlash(__($data));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
