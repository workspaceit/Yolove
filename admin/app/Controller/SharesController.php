<?php

App::uses('AppController', 'Controller');

/**
 * Shares Controller
 *
 * @property Share $Share
 * @property PaginatorComponent $Paginator
 */
class SharesController extends AppController {

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
        $this->Share->recursive = 0;
        $this->Paginator->settings = array(
            'limit' => $limit,
            'order' => array('id' => 'ASC'),
        );
        $this->set('limits', $limit);
        $this->set('shares', $this->Paginator->paginate());
        $this->set('path', $this->user_path);
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Share->exists($id)) {
            throw new NotFoundException(__('Invalid share'));
        }
        $options = array('conditions' => array('Share.' . $this->Share->primaryKey => $id));
        $this->set('share', $this->Share->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Share->create();
            if ($this->Share->save($this->request->data)) {
//                $this->Session->setFlash(__('The share has been saved.'));
                $data = '<div class="alert alert-info span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The share has been saved.</strong>
                            <br>
                            </div>';
                $this->Session->setFlash(__($data));
                return $this->redirect(array('action' => 'index'));
            } else {
//                $this->Session->setFlash(__('The share could not be saved. Please, try again.'));
                $data = '<div class="alert alert-error span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The share could not be saved. Please, try again.</strong>
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
        $this->loadModel('Item');
        if (!$this->Share->exists($id)) {
            throw new NotFoundException(__('Invalid share'));
        }
        if ($this->request->is(array('post', 'put', 'post'))) {
            if ($this->Share->save($this->request->data)) {
                $edit_item = array(
                    'id' => $this->request->data['Share']['item_id'],
                    'title' => $this->request->data['Share']['item_title'],
                    'price' => $this->request->data['Share']['item_price'],
                );
                $this->Item->save($edit_item);
//                $this->Session->setFlash(__('The share has been saved.'));
                $data = '<div class="alert alert-info span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The share has been saved.</strong>
                            <br>
                            </div>';
                $this->Session->setFlash(__($data));
                return $this->redirect(array('action' => 'index'));
            } else {
//                $this->Session->setFlash(__('The share could not be saved. Please, try again.'));
                $data = '<div class="alert alert-error span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The share could not be saved. Please, try again.</strong>
                            <br>
                            </div>';
                $this->Session->setFlash(__($data));
            }
        } else {
            $this->loadModel('Category');
            $cats = $this->Category->find('all');
            $this->loadModel('Album');
            $albums = $this->Album->find('all');
            $catArray = array();
            foreach ($cats as $cat):
                $catArray[$cat['Category']['id']] = $cat['Category']['category_name_cn'];
            endforeach;

            $albumArray = array();
            foreach ($albums as $album):
                $albumArray[$album['Album']['id']] = $album['Album']['album_title'];
            endforeach;
            $options = array('conditions' => array('Share.' . $this->Share->primaryKey => $id));
            $this->request->data = $this->Share->find('first', $options);
            $this->set('catArray', $catArray);
            $this->set('albumArray', $albumArray);
            $this->set('path', $this->user_path);
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
        $options = array('conditions' => array('Share.' . $this->Share->primaryKey => $id));
            $shareItem = $this->Share->find('first', $options);   
        $this->Share->id = $id;
        if (!$this->Share->exists()) {
            throw new NotFoundException(__('Invalid share'));
        }
        //die;
        $this->request->allowMethod('post', 'delete', 'get');
        if ($this->Share->delete()) {
            $this->loadModel('Item');
            $this->Item->deleteProduct($shareItem['Share']);
            
//            $this->Session->setFlash(__('The share has been deleted.'));
            $data = '<div class="alert alert-info span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The share has been deleted.</strong>
                            <br>
                            </div>';
            $this->Session->setFlash(__($data));
            $this->redirect($this->referer());
        } else {
//            $this->Session->setFlash(__('The share could not be deleted. Please, try again.'));
            $data = '<div class="alert alert-error span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The share could not be deleted. Please, try again.</strong>
                            <br>
                            </div>';
            $this->Session->setFlash(__($data));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
