<?php

App::uses('AppController', 'Controller');

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');
//    var $components = array('PaginationRecall'); 
    private $group;

    public function editprofile() {
        $this->loadModel('User');
        $userInfo = $this->Session->read('SgUser');
        $id = $userInfo['User']['id'];
        $mail = $userInfo['User']['email'];
        if ($this->request->is(array('post', 'put'))) {
            $this->request->data['User']['nickname'] = trim($this->request->data['User']['nickname']);
            $this->request->data['User']['email'] = $mail;
            if ($this->User->save($this->request->data)) {
//                $this->Session->setFlash(__('The user has been saved.'));
                $data = '<div class="alert alert-info span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The user has been saved.</strong>
                            <br>
                            </div>';
                $this->Session->setFlash(__($data));
                $userData = $this->User->query('Select * From user where id =' . $id);
                $this->set('user', $userData);
            } else {
//                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
                $data = '<div class="alert alert-error span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The user could not be saved. Please, try again.</strong>
                            <br>
                            </div>';
                $this->Session->setFlash(__($data));
                $userData = $this->User->query('Select * From user where id =' . $id);
                $this->set('user', $userData);
            }
        } else {
            $userData = $this->User->query('Select * From user where id =' . $id);
            $userData = $this->User->query('Select * From user where id =' . $id);
            $this->set('user', $userData);
//            $this->set('usergroup', $usergroup);
//            $this->set('user_usergroup', $user_usergroup);
        }
    }

    public function changePassword() {
        $userInfo = $this->Session->read('SgUser');
        $this->loadModel('User');
        $user = $this->User->find('first', array(
            'conditions' => array('User.id' => $userInfo['User']['id'])
        ));
        if ($this->request->is('post')) {
            $this->request->data['User']['id'] = $userInfo['User']['id'];
            if ($user['User']['passwd'] != md5($this->request->data['User']['old_password'])) {
                $data = '<div class="alert alert-error span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>Incorrect old password</strong>
                            <br>
                            </div>';
                $this->Session->setFlash(__($data));
                $this->redirect(Router::url($this->referer(), true));
            } else {
                $this->request->data['User']['passwd'] = trim($this->request->data['User']['passwd']);
                $this->request->data['User']['passwd'] = md5($this->request->data['User']['passwd']);
                $this->User->create();
                if ($this->User->save($this->request->data)) {
                    $data = '<div class="alert alert-info span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>Password changed</strong>
                            <br>
                            </div>';
                    $this->Session->setFlash(__($data));
                    $this->redirect(Router::url($this->referer(), true));
                } else {
                    
                }
            }
        }
    }

    public function addStaruser() {
        $this->loadModel('Staruser');
        if ($this->request->is('post')) {
            $this->Staruser->create();
            if ($this->Staruser->save($this->request->data)) {
//                $this->Session->setFlash(__('The user has been saved.'));
                $data = '<div class="alert alert-info span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The star user has been saved.</strong>
                            <br>
                            </div>';
                $this->Session->setFlash(__($data));
                return $this->redirect(array('action' => 'manageStar'));
            } else {
//                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
                $data = '<div class="alert alert-error span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The star user could not be saved. Please, try again.</strong>
                            <br>
                            </div>';
                $this->Session->setFlash(__($data));
            }
        }
    }

    public function editStaruser($id = NULL) {
        $this->loadModel('Staruser');
        $this->loadModel('Usergroup');
        if (!$this->Staruser->exists($id)) {
            throw new NotFoundException(__('Invalid share'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Staruser->save($this->request->data)) {
//                $this->Session->setFlash(__('The share has been saved.'));
                $data = '<div class="alert alert-info span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The star user has been saved.</strong>
                            <br>
                            </div>';
                $this->Session->setFlash(__($data));
                return $this->redirect(array('action' => 'manageStar'));
            } else {
//                $this->Session->setFlash(__('The share could not be saved. Please, try again.'));
                $data = '<div class="alert alert-error span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The star user could not be saved. Please, try again.</strong>
                            <br>
                            </div>';
                $this->Session->setFlash(__($data));
            }
        } else {
            $options = array('conditions' => array('Usergroup.' . $this->Usergroup->primaryKey => $id));
            $this->request->data = $this->Usergroup->find('first', $options);
        }
    }

    public function deleteStaruser($id = null) {
        $this->loadModel('Staruser');
        $this->Staruser->id = $id;
        if (!$this->Staruser->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->request->allowMethod('get', 'delete');
        if ($this->Staruser->delete()) {
//            $this->Session->setFlash(__('The user has been deleted.'));
            $data = '<div class="alert alert-info span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The star user has been deleted.</strong>
                            <br>
                            </div>';
            $this->Session->setFlash(__($data));
            $this->redirect($this->referer());
        } else {
//            $this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
            $data = '<div class="alert alert-error span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The star user could not be deleted. Please, try again.</strong>
                            <br>
                            </div>';
            $this->Session->setFlash(__($data));
        }
        return $this->redirect(array('action' => 'manageStar'));
    }

    public function manageStar($limit = 10) {
        $this->loadModel('Staruser');
        $stars = $this->Staruser->find('all');
//        $this->prd($stars);
        $this->Paginator->settings = array(
            'order' => array('id' => 'ASC'),
            'limit' => $limit
        );
        $this->set('limits', $limit);
        $this->set('starUser', $this->Paginator->paginate('Staruser'));
    }

    public function deleteUsergroup($id = null) {
        $this->loadModel('Usergroup');
        $this->Usergroup->id = $id;
        if (!$this->Usergroup->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->request->allowMethod('get', 'delete');
        if ($this->Usergroup->delete()) {
//            $this->Session->setFlash(__('The user has been deleted.'));
            $data = '<div class="alert alert-info span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The user group has been deleted.</strong>
                            <br>
                            </div>';
            $this->Session->setFlash(__($data));
            $this->redirect($this->referer());
        } else {
//            $this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
            $data = '<div class="alert alert-error span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The user group could not be deleted. Please, try again.</strong>
                            <br>
                            </div>';
            $this->Session->setFlash(__($data));
        }
        return $this->redirect(array('action' => 'userGroups'));
    }

    public function addUsergroup() {
        $this->loadModel('Usergroup');
        if ($this->request->is('post')) {
            $this->Usergroup->create();
            if ($this->Usergroup->save($this->request->data)) {
//                $this->Session->setFlash(__('The user has been saved.'));
                $data = '<div class="alert alert-info span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The user group has been saved.</strong>
                            <br>
                            </div>';
                $this->Session->setFlash(__($data));
                return $this->redirect(array('action' => 'userGroups/' . $this->request->data['Usergroup']['usergroup_type']));
            } else {
//                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
                $data = '<div class="alert alert-error span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The user group could not be saved. Please, try again.</strong>
                            <br>
                            </div>';
                $this->Session->setFlash(__($data));
            }
        }
    }

    public function editUsergroup($id = NULL) {
        $this->loadModel('Usergroup');
        if (!$this->Usergroup->exists($id)) {
            throw new NotFoundException(__('Invalid share'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $this->request->data['Usergroup']['usergroup_name'] = trim($this->request->data['Usergroup']['usergroup_name']);
            $this->request->data['Usergroup']['usergroup_key'] = trim($this->request->data['Usergroup']['usergroup_key']);
            if ($this->Usergroup->save($this->request->data)) {
//                $this->Session->setFlash(__('The share has been saved.'));
                $data = '<div class="alert alert-info span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The user group has been saved.</strong>
                            <br>
                            </div>';
                $this->Session->setFlash(__($data));
                return $this->redirect(array('action' => 'userGroups/' . $this->request->data['Usergroup']['usergroup_type']));
            } else {
//                $this->Session->setFlash(__('The share could not be saved. Please, try again.'));
                $data = '<div class="alert alert-error span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The user group could not be saved. Please, try again.</strong>
                            <br>
                            </div>';
                $this->Session->setFlash(__($data));
            }
        } else {
            $options = array('conditions' => array('Usergroup.' . $this->Usergroup->primaryKey => $id));
            $this->request->data = $this->Usergroup->find('first', $options);
        }
    }

    public function userGroups($category = 'system') {
        $this->loadModel('Usergroup');
        $this->User->recursive = 0;
        $this->Paginator->settings = array(
            'conditions' => array('Usergroup.usergroup_type' => $category),
//            'fields' => array($result),
            'order' => array('id' => 'ASC'),
            'limit' => 10,
        );
        $limit = 10;
        $this->set('limits', $limit);
        $this->set('cat', $category);
        $this->set('usergroup', $this->Paginator->paginate('Usergroup'));
    }

    /**
     * index method
     *
     * @return void
     */
    public function index($limit = 10) {
        $this->User->recursive = 0;
        $this->Paginator->settings = array(
            'limit' => $limit,
            'maxLimit' => 100,
            'order' => array('id' => 'DESC'),
        );

        $this->set('limits', $limit);
        $this->loadModel('User');
        $allUser = $this->Paginator->paginate();
        $this->loadModel('UserUsergroup');
        $user_usergroup = array();
        foreach ($allUser as $users):
            $user_usergroup[] = $this->UserUsergroup->find('all', array(
                'conditions' => array('UserUsergroup.user_id' => $users['User']['id']),
                'fields' => array('UserUsergroup.id'),
                'order' => array('UserUsergroup.create_time')
            ));
        endforeach;
        $this->loadModel('Usergroup');
        $usergroup = array();
        foreach ($user_usergroup as $key => $group):
            $usergroup[$key][0] = $this->Usergroup->find('first', array(
                'conditions' => array('Usergroup.id' => (isset($group[0]['UserUsergroup']['id']) ? $group[0]['UserUsergroup']['id'] : 0)),
                'fields' => array('Usergroup.usergroup_name')
            ));
            $usergroup[$key][1] = $this->Usergroup->find('first', array(
                'conditions' => array('Usergroup.id' => (isset($group[1]['UserUsergroup']['id']) ? $group[1]['UserUsergroup']['id'] : 0)),
                'fields' => array('Usergroup.usergroup_name')
            ));
        endforeach;

        $this->set('users', $this->Paginator->paginate());
        $this->set('usergroup', $usergroup);
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $this->set('user', $this->User->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {

        $this->request->data['User']['create_time'] = time();
        if ($this->request->is('post')) {
            $this->request->data['User']['email'] = trim($this->request->data['User']['email']);
            $this->request->data['User']['passwd'] = trim($this->request->data['User']['passwd']);
            if(strlen($this->request->data['User']['passwd']) >= 6){
                $this->request->data['User']['passwd'] = md5($this->request->data['User']['passwd']);
            }
            $this->request->data['User']['nickname'] = trim($this->request->data['User']['nickname']);
            $this->User->create();
            if ($this->User->save($this->request->data)) {
//                $this->Session->setFlash(__('The user has been saved.'));
                $this->loadModel('UserUsergroup');
                $uid = $this->User->id;
                $time = time();
                $newtime = $time + 1;
                $this->UserUsergroup->query('INSERT INTO `user_usergroup`(`id`, `user_id`, `create_time`) VALUES (6, ' . $uid . ', ' . $time . ')');
                $this->UserUsergroup->query('INSERT INTO `user_usergroup`(`id`, `user_id`, `create_time`) VALUES (8, ' . $uid . ', ' . $newtime . ')');

                $data = '<div class="alert alert-info span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The user has been saved.</strong>
                            <br>
                            </div>';
                $this->Session->setFlash(__($data));
                return $this->redirect(array('action' => 'index'));
            } else {
//                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
                $data = '<div class="alert alert-error span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The user could not be saved. Please, try again.</strong>
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
        $this->loadModel('Usergroup');
        $this->loadModel('UserUsergroup');
        $this->loadModel('User');

        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $userData = $this->User->query('Select * From user where id =' . $id);

            $this->request->data['User']['email'] = $userData[0]['user']['email'];
            $this->request->data['User']['nickname'] = trim($this->request->data['User']['nickname']);
            $this->request->data['User']['passwd'] = trim($this->request->data['User']['passwd']);
            if(strlen($this->request->data['User']['passwd']) == 0)
                $this->request->data['User']['passwd'] = $userData[0]['user']['passwd'];
            else if(strlen($this->request->data['User']['passwd']) >= 6)
                $this->request->data['User']['passwd'] = md5($this->request->data['User']['passwd']);
            $time = time();
            $data = $this->UserUsergroup->query('Select * From user_usergroup where user_id =' . $id . ' order by create_time');
            $this->UserUsergroup->query('UPDATE `user_usergroup` SET `id`=' . $this->request->data['User']['system_group'] . ' WHERE `user_id`=' . $this->request->data['User']['id'] . ' AND `create_time`=' . $data[0]['user_usergroup']['create_time']);
            $this->UserUsergroup->query('UPDATE `user_usergroup` SET `id`=' . $this->request->data['User']['member_group'] . ' WHERE `user_id`=' . $this->request->data['User']['id'] . ' AND `create_time`=' . $data[1]['user_usergroup']['create_time']);


            if ($this->User->save($this->request->data)) {
//                $this->Session->setFlash(__('The user has been saved.'));
                $user_usergroup = array();
                $user_usergroup[] = $this->UserUsergroup->find('all', array(
                    'conditions' => array('UserUsergroup.user_id' => $id),
                    'fields' => array('UserUsergroup.id'),
                    'order' => array('UserUsergroup.create_time')
                ));
                $usergroup = array();
                foreach ($user_usergroup as $key => $group):
                    $usergroup[$key][0] = $this->Usergroup->find('first', array(
                        'conditions' => array('Usergroup.id' => $group[0]['UserUsergroup']['id']),
                        'fields' => array('Usergroup.usergroup_name', 'Usergroup.id')
                    ));
                    $usergroup[$key][1] = $this->Usergroup->find('first', array(
                        'conditions' => array('Usergroup.id' => $group[1]['UserUsergroup']['id']),
                        'fields' => array('Usergroup.usergroup_name', 'Usergroup.id')
                    ));
                endforeach;
                $totalGroups = array();
                $totalGroups[] = $this->Usergroup->find('all');
                foreach ($totalGroups[0] as $tot):
                    if ($tot['Usergroup']['usergroup_type'] == 'system')
                        $systems[$tot['Usergroup']['id']] = $tot['Usergroup']['usergroup_name'];
                    if ($tot['Usergroup']['usergroup_type'] == 'member')
                        $members[$tot['Usergroup']['id']] = $tot['Usergroup']['usergroup_name'];
                endforeach;
                $this->set('usergroup', $usergroup);
                $this->set('user_usergroup', $user_usergroup);
                $this->set('systems', $systems);
                $this->set('members', $members);
                $data = '<div class="alert alert-info span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The user has been saved.</strong>
                            <br>
                            </div>';
                $this->Session->setFlash(__($data));
//                $this->redirect($this->referer());
                return $this->redirect(array('action' => 'index'));
            } else {
//                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
                $data = '<div class="alert alert-error span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The user could not be saved. Please, try again.</strong>
                            <br>
                            </div>';
                $this->Session->setFlash(__($data));
                $user_usergroup = array();
                $user_usergroup[] = $this->UserUsergroup->find('all', array(
                    'conditions' => array('UserUsergroup.user_id' => $id),
                    'fields' => array('UserUsergroup.id'),
                    'order' => array('UserUsergroup.create_time')
                ));
                $usergroup = array();
                foreach ($user_usergroup as $key => $group):
                    $usergroup[$key][0] = $this->Usergroup->find('first', array(
                        'conditions' => array('Usergroup.id' => $group[0]['UserUsergroup']['id']),
                        'fields' => array('Usergroup.usergroup_name', 'Usergroup.id')
                    ));
                    $usergroup[$key][1] = $this->Usergroup->find('first', array(
                        'conditions' => array('Usergroup.id' => $group[1]['UserUsergroup']['id']),
                        'fields' => array('Usergroup.usergroup_name', 'Usergroup.id')
                    ));
                endforeach;
                $totalGroups = array();
                $totalGroups[] = $this->Usergroup->find('all');
                foreach ($totalGroups[0] as $tot):
                    if ($tot['Usergroup']['usergroup_type'] == 'system')
                        $systems[$tot['Usergroup']['id']] = $tot['Usergroup']['usergroup_name'];
                    if ($tot['Usergroup']['usergroup_type'] == 'member')
                        $members[$tot['Usergroup']['id']] = $tot['Usergroup']['usergroup_name'];
                endforeach;
                $this->set('usergroup', $usergroup);
                $this->set('user_usergroup', $user_usergroup);
                $this->set('systems', $systems);
                $this->set('members', $members);
            }
        } else {
            $user_usergroup = array();
            $user_usergroup[] = $this->UserUsergroup->find('all', array(
                'conditions' => array('UserUsergroup.user_id' => $id),
                'fields' => array('UserUsergroup.id'),
                'order' => array('UserUsergroup.create_time')
            ));
            $this->loadModel('Usergroup');
            $usergroup = array();
            foreach ($user_usergroup as $key => $group):
                $usergroup[$key][0] = $this->Usergroup->find('first', array(
                    'conditions' => array('Usergroup.id' => $group[0]['UserUsergroup']['id']),
                    'fields' => array('Usergroup.usergroup_name', 'Usergroup.id')
                ));
                if (isset($group[1]['UserUsergroup']['id'])) {
                    $usergroup[$key][1] = $this->Usergroup->find('first', array(
                        'conditions' => array('Usergroup.id' => $group[1]['UserUsergroup']['id']),
                        'fields' => array('Usergroup.usergroup_name', 'Usergroup.id')
                    ));
                }
            endforeach;

            $totalGroups = array();
            $totalGroups[] = $this->Usergroup->find('all');
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));

            $this->request->data = $this->User->find('first', $options);
            foreach ($totalGroups[0] as $tot):
                if ($tot['Usergroup']['usergroup_type'] == 'system')
                    $systems[$tot['Usergroup']['id']] = $tot['Usergroup']['usergroup_name'];
                if ($tot['Usergroup']['usergroup_type'] == 'member')
                    $members[$tot['Usergroup']['id']] = $tot['Usergroup']['usergroup_name'];
            endforeach;
            $this->set('usergroup', $usergroup);
            $this->set('user_usergroup', $user_usergroup);
            $this->set('systems', $systems);
            $this->set('members', $members);
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

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        } 
        $this->request->allowMethod('get', 'delete');
        if ($this->User->delete()) {
            $this->User->deleteUser($id);
//            $this->Session->setFlash(__('The user has been deleted.'));
            $this->loadModel('UserUsergroup');
            $this->UserUsergroup->query('DELETE FROM `user_usergroup` WHERE user_id = ' . $id . '');
            $data = '<div class="alert alert-info span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The user has been deleted.</strong>
                            <br>
                            </div>';
            $this->Session->setFlash(__($data));
            $this->redirect($this->referer());
        } else {
//            $this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
            $data = '<div class="alert alert-error span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The user could not be deleted. Please, try again.</strong>
                            <br>
                            </div>';
            $this->Session->setFlash(__($data));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
