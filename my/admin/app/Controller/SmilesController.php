<?php

App::uses('AppController', 'Controller');

/**
 * Smiles Controller
 *
 * @property Smile $Smile
 * @property PaginatorComponent $Paginator
 */
class SmilesController extends AppController {

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
        $this->Smile->recursive = 0;
        $this->Paginator->settings = array(
            'limit' => $limit,
            'order' => array('id' => 'ASC'),
        );
        $this->set('limits', $limit);
        $this->set('smiles', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Smile->exists($id)) {
            throw new NotFoundException(__('Invalid smile'));
        }
        $options = array('conditions' => array('Smile.' . $this->Smile->primaryKey => $id));
        $this->set('smile', $this->Smile->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $image = $this->request->data['Smile']['emo_image'];
            $smileData['code'] = $this->request->data['Smile']['code'];
            $smileData['displayorder'] = $this->request->data['Smile']['displayorder'];
            if (!empty($image)) {
                if ($image['type'] == "image/gif") {
//                $newImage = explode('.', $image['name']);
//                array_pop($newImage);
//                $newImage = implode('.', $newImage);
//                $imageUrl = WWW_ROOT . "assets/smiley/" . $newImage . ".gif";
                    $imageUrl = WWW_ROOT . "assets/smiley/" . $image['name'];
                    move_uploaded_file($image['tmp_name'], $imageUrl);
//                App::import('Component', 'Image');
//                $MyImageCom = new ImageComponent();
//                $MyImageCom->prepare($imageUrl);
//                $MyImageCom->resize(20, 20);
//                $MyImageCom->save($imageUrl);
//                $smileData['url'] = $newImage . ".gif";
                    $smileData['url'] = $image['name'];
                }
            }
            $this->Smile->create();
            if ($this->Smile->save($smileData)) {
//                $this->Session->setFlash(__('The smile has been saved.'));
                $data = '<div class="alert alert-info span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The smile has been saved.</strong>
                            <br>
                            </div>';
                $this->Session->setFlash(__($data));
                return $this->redirect(array('action' => 'index'));
            } else {
//                $this->Session->setFlash(__('The smile could not be saved. Please, try again.'));
                $data = '<div class="alert alert-error span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The smile could not be saved. Please, try again.</strong>
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
        if (!$this->Smile->exists($id)) {
            throw new NotFoundException(__('Invalid smile'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Smile->save($this->request->data)) {
//                $this->Session->setFlash(__('The smile has been saved.'));
                $data = '<div class="alert alert-info span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The smile has been saved.</strong>
                            <br>
                            </div>';
                $this->Session->setFlash(__($data));
                return $this->redirect(array('action' => 'index'));
            } else {
//                $this->Session->setFlash(__('The smile could not be saved. Please, try again.'));
                $data = '<div class="alert alert-error span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The smile could not be saved. Please, try again.</strong>
                            <br>
                            </div>';
                $this->Session->setFlash(__($data));
            }
        } else {
            $options = array('conditions' => array('Smile.' . $this->Smile->primaryKey => $id));
            $this->request->data = $this->Smile->find('first', $options);
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
        $this->Smile->id = $id;
        if (!$this->Smile->exists()) {
            throw new NotFoundException(__('Invalid smile'));
        }
        $this->request->allowMethod('post', 'delete', 'get');
        if ($this->Smile->delete()) {
//            $this->Session->setFlash(__('The smile has been deleted.'));
            $data = '<div class="alert alert-info span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The smile has been deleted.</strong>
                            <br>
                            </div>';
            $this->Session->setFlash(__($data));
            $this->redirect($this->referer());
        } else {
//            $this->Session->setFlash(__('The smile could not be deleted. Please, try again.'));
            $data = '<div class="alert alert-error span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The smile could not be deleted. Please, try again.</strong>
                            <br>
                            </div>';
            $this->Session->setFlash(__($data));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
