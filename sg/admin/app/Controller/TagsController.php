<?php

App::uses('AppController', 'Controller');

/**
 * Tags Controller
 *
 * @property Tag $Tag
 * @property PaginatorComponent $Paginator
 */
class TagsController extends AppController {

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
        $this->Tag->recursive = 0;
        $this->Paginator->settings = array(
            'limit' => $limit,
            'order' => array('id' => 'DESC'),
        );
        $this->set('limits', $limit);
        $this->set('tags', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Tag->exists($id)) {
            throw new NotFoundException(__('Invalid tag'));
        }
        $options = array('conditions' => array('Tag.' . $this->Tag->primaryKey => $id));
        $this->set('tag', $this->Tag->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->request->data['Tag']['create_time'] = time();
            $this->Tag->create();
            if ($this->Tag->save($this->request->data)) {
                $data = '<div class="alert alert-info span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The hashtag has been saved.</strong>
                            <br>
                            </div>';
                $this->Session->setFlash(__($data));
                return $this->redirect(array('action' => 'index'));
            } else {
                $data = '<div class="alert alert-error span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The hashtag could not be saved. Please, try again.</strong>
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
        if (!$this->Tag->exists($id)) {
            throw new NotFoundException(__('Invalid tag'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Tag->save($this->request->data)) {
                $data = '<div class="alert alert-info span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The hashtag has been saved.</strong>
                            <br>
                            </div>';
                $this->Session->setFlash(__($data));
                return $this->redirect(array('action' => 'index'));
            } else {
                $data = '<div class="alert alert-error span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The hashtag could not be saved. Please try again.</strong>
                            <br>
                            </div>';
                $this->Session->setFlash(__($data));
            }
        } else {
            $options = array('conditions' => array('Tag.' . $this->Tag->primaryKey => $id));
            $this->request->data = $this->Tag->find('first', $options);
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
        $this->Tag->id = $id;
        if (!$this->Tag->exists()) {
            throw new NotFoundException(__('Invalid tag'));
        }
        $this->request->allowMethod('post', 'delete', 'get');
        if ($this->Tag->delete()) {
            $data = '<div class="alert alert-info span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The hashtag has been deleted.</strong>
                            <br>
                            </div>';
                $this->Session->setFlash(__($data));
        } else {
            $data = '<div class="alert alert-error span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The hashtag could not be deleted. Please try again.</strong>
                            <br>
                            </div>';
                $this->Session->setFlash(__($data));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
