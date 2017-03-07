<?php
App::uses('AppController', 'Controller');

class IndexController extends AppController {

    var $layout = 'login';
    var $uses = array('User');

    //var $name = 'User';

    function beforeFilter() {
        if ($this->action != 'logout') {
            if ($this->Session->check('MyUser')) {
                $this->Redirect(array('controller' => 'users', 'action' => 'index'));
                exit();
            }
        }
    }

    public function index() {

        if (empty($this->data['User']['username']) == false) {

            // Here we validate the user by calling that method from the User model
//            $this->prd($this->User);
            if (($user = $this->User->validateAdminLogin($this->data['User']['username'], $this->data['User']['password'])) != false) {
               
                // Write some Session variables and redirect to our next page!
//                $this->Session->setFlash('Thank you for logging in!');
                $data = '<div class="alert alert-info span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>Thank you for logging in!</strong>
                            <br>
                            </div>';
                $this->Session->setFlash(__($data));
                $this->Session->write('MyUser', $user);
                
                // Go to our first destination!
                $this->Redirect(array('controller' => 'Settings', 'action' => 'siteInfo'));
                exit();
            } else {

                $this->Session->setFlash('Incorrect username/password!');
                $this->Redirect(array('action' => 'index'));
                exit();
            }
        }
        else if (empty($this->data['User']['username']) == true && empty($this->data['User']['passwd']) == false) {
                $this->Session->setFlash('Incorrect username/password!');
                $this->Redirect(array('action' => 'index'));
                exit();
            }
    }

    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirect());
            }
            $this->Session->setFlash(__('Your username or password was incorrect.'));
        }
    }

    public function logout() {
        $this->Session->delete('MyUser');
        $this->Session->setFlash('You have been logged out!');

        // Go home!
        $this->Redirect('/');
        exit();
    }

}