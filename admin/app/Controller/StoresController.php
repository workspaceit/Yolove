<?php

App::uses('AppController', 'Controller');

/**
 * Stores Controller
 *
 * @property Store $Store
 * @property PaginatorComponent $Paginator
 */
class StoresController extends AppController {

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
        $this->Store->recursive = 0;
        $this->Paginator->settings = array(
            'limit' => $limit,
            'order' => array('id' => 'ASC'),
        );
        $this->set('limits', $limit);
        $this->set('stores', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Store->exists($id)) {
            throw new NotFoundException(__('Invalid store'));
        }
        $options = array('conditions' => array('Store.' . $this->Store->primaryKey => $id));
        $this->set('store', $this->Store->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Store->create();
            if ($this->Store->save($this->request->data)) {
//                $this->Session->setFlash(__('The store has been saved.'));
                $data = '<div class="alert alert-info span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The store has been saved.</strong>
                            <br>
                            </div>';
                $this->Session->setFlash(__($data));
                return $this->redirect(array('action' => 'index'));
            } else {
//                $this->Session->setFlash(__('The store could not be saved. Please, try again.'));
                $data = '<div class="alert alert-error span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The store could not be saved. Please, try again.</strong>
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
        if (!$this->Store->exists($id)) {
            throw new NotFoundException(__('Invalid store'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Store->save($this->request->data)) {

//                $this->Session->setFlash(__('The store has been saved.'));
                $data = '<div class="alert alert-info span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The store has been saved.</strong>
                            <br>
                            </div>';
                $this->Session->setFlash(__($data));
                return $this->redirect(array('action' => 'index'));
            } else {

//                $this->Session->setFlash(__('The store could not be saved. Please, try again.'));
                $data = '<div class="alert alert-error span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The store could not be saved. Please, try again.</strong>
                            <br>
                            </div>';
                $this->Session->setFlash(__($data));
            }
        } else {
            $options = array('conditions' => array('Store.' . $this->Store->primaryKey => $id));
            $this->request->data = $this->Store->find('first', $options);
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
        $this->Store->id = $id;
        if (!$this->Store->exists()) {
            throw new NotFoundException(__('Invalid store'));
        }
        $this->request->allowMethod('post', 'delete', 'get');
        if ($this->Store->delete()) {
            $this->Store->deleteStore($id);
//            $this->Session->setFlash(__('The store has been deleted.'));
            $data = '<div class="alert alert-info span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The store has been deleted.</strong>
                            <br>
                            </div>';
            $this->Session->setFlash(__($data));
            $this->redirect($this->referer());
        } else {
//            $this->Session->setFlash(__('The store could not be deleted. Please, try again.'));
            $data = '<div class="alert alert-error span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The store could not be deleted. Please, try again.</strong>
                            <br>
                            </div>';
            $this->Session->setFlash(__($data));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
