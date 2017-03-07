<?php

App::uses('AppController', 'Controller');

/**
 * Albums Controller
 *
 * @property Album $Album
 * @property PaginatorComponent $Paginator
 */
class AlbumsController extends AppController {

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
        $this->Album->recursive = 0;
        $this->Paginator->settings = array(
            'limit' => $limit,
            'order' => array('id' => 'ASC'),
        );
        $this->set('limits', $limit);
        $this->set('albums', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Album->exists($id)) {
            throw new NotFoundException(__('Invalid album'));
        }
        $options = array('conditions' => array('Album.' . $this->Album->primaryKey => $id));
        $this->set('album', $this->Album->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        $this->loadModel('Category');
        $user = $this->Session->read('MyUser');
        $cates = $this->Category->find('all');
        $catArray = array();
        foreach ($cates as $cat):
            $catArray[$cat['Category']['id']] = $cat['Category']['category_name_cn'];
        endforeach;
        $this->set('catArray', $catArray);
        if ($this->request->is('post')) {
            $this->request->data['Album']['album_title'] = trim($this->request->data['Album']['album_title']);
            $this->request->data['Album']['user_id'] = $user['User']['id'];
            $this->request->data['Album']['create_time'] = time();
            $this->Album->create();
            $this->loadModel('User');
            $this->User->increaseUserAlbum($user['User']['id']);
            if ($this->Album->save($this->request->data)) {
                $cates = $this->Category->find('all');
                $catArray = array();
                foreach ($cates as $cat):
                    $catArray[$cat['Category']['id']] = $cat['Category']['category_name_cn'];
                endforeach;
                $this->set('catArray', $catArray);
//                $this->Session->setFlash(__('The album has been saved.'));
                $data = '<div class="alert alert-info span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The album has been saved.</strong>
                            <br>
                            </div>';
                $this->Session->setFlash(__($data));


                return $this->redirect(array('action' => 'index'));
            } else {
//                $this->Session->setFlash(__('The album could not be saved. Please, try again.'));
                $data = '<div class="alert alert-error span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The album could not be saved. Please, try again.</strong>
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
        if (!$this->Album->exists($id)) {
            throw new NotFoundException(__('Invalid album'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $this->request->data['Album']['update_time'] = time();
            if ($this->Album->save($this->request->data)) {
//                $this->Session->setFlash(__('The album has been saved.'));
                $data = '<div class="alert alert-info span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The album has been saved.</strong>
                            <br>
                            </div>';
                $this->Session->setFlash(__($data));
                return $this->redirect(array('action' => 'index'));
            } else {
//                $this->Session->setFlash(__('The album could not be saved. Please, try again.'));
                $data = '<div class="alert alert-error span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The album could not be saved. Please try again.</strong>
                            <br>
                            </div>';
                $this->Session->setFlash(__($data));
            }
        } else {
            $this->loadModel('Category');
            $cates = $this->Category->find('all');
            $catArray = array();
            foreach ($cates as $cat):
                $catArray[$cat['Category']['id']] = $cat['Category']['category_name_cn'];
            endforeach;
            $options = array('conditions' => array('Album.' . $this->Album->primaryKey => $id));
            $this->request->data = $this->Album->find('first', $options);
            $this->set('catArray', $catArray);
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
        $this->Album->id = $id;
        $options = array('conditions' => array('Album.' . $this->Album->primaryKey => $id));
        $deletedAlbum = $this->Album->find('first', $options);
        $userId = $deletedAlbum['Album']['user_id'];
        if (!$this->Album->exists()) {
            throw new NotFoundException(__('Invalid album'));
        }
        $this->request->allowMethod('post', 'delete', 'get');
        if ($this->Album->delete()) {
            $this->Album->deleteAlbum($id,$userId);
//            $this->Session->setFlash(__('The album has been deleted.'));
            $data = '<div class="alert alert-info span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The album has been deleted.</strong>
                            <br>
                            </div>';
                $this->Session->setFlash(__($data));
                $this->redirect($this->referer());
        } else {
//            $this->Session->setFlash(__('The album could not be deleted. Please, try again.'));
            $data = '<div class="alert alert-error span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The album could not be deleted. Please try again.</strong>
                            <br>
                            </div>';
                $this->Session->setFlash(__($data));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
