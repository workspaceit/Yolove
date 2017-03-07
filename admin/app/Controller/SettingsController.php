<?php

App::uses('AppController', 'Controller');

/**
 * Settings Controller
 *
 * @property Setting $Setting
 * @property PaginatorComponent $Paginator
 */
class SettingsController extends AppController {

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
    public function index() {
        if ($this->request->is('post')) {
            $this->Paginator->settings = array(
                'conditions' => array('Setting.set_key like ' => 'socialapi'),
            );
            $p = $this->Paginator->paginate();

            $s = $p[0];

            $settings = $s["Setting"];
            $setKey = unserialize($settings["set_value"]);
            $newApi = array();
            $newApi['key'] = trim($this->request->data['Setting']["key"]);
            $newApi['name'] = trim($this->request->data['Setting']["name"]);
            $newApi['appkey'] = trim($this->request->data['Setting']["appkey"]);
            $newApi['appsecret'] = trim($this->request->data['Setting']["appsecret"]);
            $newApi['callback'] = trim($this->request->data['Setting']["callback"]);
//            $newApi['unionid'] = trim($this->request->data['Setting']["unionid"]);
            $newApi['open'] = trim($this->request->data['Setting']["open"]);
//            if($newApi['key'] == "")
//                $this->redirect($this->referer(array('action'=>'index'), false));
            $setKey[$newApi['key']] = $newApi;



            $res = serialize($setKey);
            $p[0]['Setting']['set_value'] = $res;
            $data = array(
                'id' => $s['Setting']['id'],
                'set_value' => $p[0]['Setting']['set_value']
            );

            $this->Setting->save($data);

            $data = '<div class="alert alert-info span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The API has been saved.</strong>
                            <br>
                            </div>';
            $this->Session->setFlash(__($data));
        }
        $this->Setting->recursive = 0;

        $this->Paginator->settings = array(
            'conditions' => array('Setting.set_key like ' => 'socialapi'),
                //'limit' => 10
        );

        $this->set('settings', $this->Paginator->paginate());
    }

    public function deleteapi($name = "") {

        $this->Setting->recursive = 0;
        $this->Paginator->settings = array(
            'conditions' => array('Setting.set_key like ' => 'socialapi'),
                //'limit' => 10
        );

        $p = $this->Paginator->paginate();

        $s = $p[0];

        $settings = $s["Setting"];

        $setKey = unserialize($settings["set_value"]);
        unset($setKey[$name]);

        $res = serialize($setKey);
        $p[0]['Setting']['set_value'] = $res;
        $data = array(
            'id' => trim($s['Setting']['id']),
            'set_value' => trim($p[0]['Setting']['set_value']),
        );

        $this->Setting->save($data);

        $data = '<div class="alert alert-info span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The API has been deleted.</strong>
                            <br>
                            </div>';
        $this->Session->setFlash(__($data));
        $this->redirect($this->referer());
//        return $this->redirect(
//                        array('controller' => 'Settings', 'action' => 'index')
//        );
    }

    public function editapi($name = "") {
        if ($this->request->is('post')) {
            $this->Paginator->settings = array(
                'conditions' => array('Setting.set_key like ' => 'socialapi'),
            );
            $p = $this->Paginator->paginate();
            $s = $p[0];

            $settings = $s["Setting"];
            $setKey = unserialize($settings["set_value"]);

            $setKey[$name]["open"] = trim($this->request->data['Setting']["open"]);
            $setKey[$name]["name"] = trim($this->request->data['Setting']["name"]);
            $setKey[$name]["appkey"] = trim($this->request->data['Setting']["appkey"]);
            $setKey[$name]["appsecret"] = trim($this->request->data['Setting']["appsecret"]);
            $setKey[$name]["callback"] = trim($this->request->data['Setting']["callback"]);
            $setKey[$name]["unionid"] = trim($this->request->data['Setting']["unionid"]);
            $res = serialize($setKey);

            $p[0]['Setting']['set_value'] = $res;
            $data = array(
                'id' => trim($s['Setting']['id']),
                'set_value' => trim($p[0]['Setting']['set_value']),
            );

            $this->Setting->save($data);


            $data = '<div class="alert alert-info span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The API has been saved.</strong>
                            <br>
                            </div>';
            $this->Session->setFlash(__($data));

            return $this->redirect(
                            array('controller' => 'Settings', 'action' => 'index')
            );
        }

        $this->Setting->recursive = 0;

        $this->Paginator->settings = array(
            'conditions' => array('Setting.set_key like ' => 'socialapi'),
        );

        $this->set('name', $name);
        $this->set('settings', $this->Paginator->paginate());
    }

    public function siteInfo() {

        if ($this->request->is('post')) {
            $this->Paginator->settings = array(
                'conditions' => array('Setting.set_key like ' => 'global'),
            );

            $p = $this->Paginator->paginate();

            $s = $p[0];

            $settings = $s["Setting"];

            $setKey = unserialize($settings["set_value"]);

            $setKey["site_name"] = trim($this->request->data['Setting']["site_name"]);
            $setKey["site_domain"] = trim($this->request->data['Setting']["site_domain"]);
            $setKey["site_email"] = trim($this->request->data['Setting']["site_email"]);
            $setKey["site_analyze_code"] = trim($this->request->data['Setting']["site_analyze_code"]);
            $setKey['siteclosed'] = trim($this->request->data['Setting']["siteclosed"]);
            $banner = $this->request->data['Setting']['site_banner'];
            if (!empty($banner)) {
                $path = $_SERVER['DOCUMENT_ROOT'] . "/yolove_api/";
                $dir = 'uploads/attachments/banner/';
                if (!file_exists($path . $dir)) {
                    mkdir($path . $dir);
                }
                $filename = "banner.png";
                $imageUrl = $path . $dir . $filename;

                move_uploaded_file($banner['tmp_name'], $imageUrl);
                $setKey['site_banner'] = $dir . $filename;
            }
            $res = serialize($setKey);

            $p[0]['Setting']['set_value'] = $res;
            $data = array(
                'id' => trim($s['Setting']['id']),
                'set_value' => trim($p[0]['Setting']['set_value']),
            );

            $this->Setting->save($data);

            $data = '<div class="alert alert-info span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The Site Information has been saved.</strong>
                            <br>
                            </div>';
            $this->Session->setFlash(__($data));
        }

        $this->Setting->recursive = 0;

        $this->Paginator->settings = array(
            'conditions' => array('Setting.set_key like ' => 'global'),
        );

        $this->set('settings', $this->Paginator->paginate());
    }

    public function globalSetting() {
        $this->Setting->recursive = 0;

        $this->Paginator->settings = array(
            'conditions' => array('Setting.set_key like ' => 'global_setting'),
        );

        $this->set('settings', $this->Paginator->paginate());
    }

    public function emailSetting() {
        if ($this->request->is('post')) {
            $this->Paginator->settings = array(
                'conditions' => array('Setting.set_key like ' => 'email'),
            );
            $p = $this->Paginator->paginate();

            $s = $p[0];

            $settings = $s["Setting"];
            $setKey = unserialize($settings["set_value"]);

            $setKey["protocol"] = trim($this->request->data['Setting']["protocol"]);
            $setKey["from"] = trim($this->request->data['Setting']["from"]);
            $setKey["sender"] = trim($this->request->data['Setting']["sender"]);
            $setKey["smtp_host"] = trim($this->request->data['Setting']["smtp_host"]);
            $setKey["smtp_user"] = trim($this->request->data['Setting']["smtp_user"]);
            $setKey["smtp_pass"] = trim($this->request->data['Setting']["smtp_pass"]);
            $setKey["smtp_port"] = trim($this->request->data['Setting']["smtp_port"]);
            $res = serialize($setKey);

            $p[0]['Setting']['set_value'] = $res;
            $data = array(
                'id' => trim($s['Setting']['id']),
                'set_value' => trim($p[0]['Setting']['set_value']),
            );

            $this->Setting->save($data);

            $data = '<div class="alert alert-info span6">
                         <button class="close" data-dismiss="alert" type="button">
                          <i class="icon-remove"></i>
                          </button>
                           <strong>The Email setting has been saved.</strong>
                            <br>
                            </div>';
            $this->Session->setFlash(__($data));
        }

        $this->Setting->recursive = 0;

        $this->Paginator->settings = array(
            'conditions' => array('Setting.set_key like ' => 'email'),
        );
        $protocols = array("mail" => "mail", "sendmail" => "sendmail", "smtp" => "smtp");
        $this->set('protocols', $protocols);
        $this->set('settings', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Setting->exists($id)) {
            throw new NotFoundException(__('Invalid setting'));
        }
        $options = array('conditions' => array('Setting.' . $this->Setting->primaryKey => $id));
        $this->set('setting', $this->Setting->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Setting->create();
            if ($this->Setting->save($this->request->data)) {
                $this->Session->setFlash(__('The setting has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The setting could not be saved. Please, try again.'));
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
        if (!$this->Setting->exists($id)) {
            throw new NotFoundException(__('Invalid setting'));
        }
        if ($this->request->is(array('post', 'put'))) {

            if ($this->Setting->save($this->request->data)) {
                $this->Session->setFlash(__('The setting has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The setting could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Setting.' . $this->Setting->primaryKey => $id));
            $this->request->data = $this->Setting->find('first', $options);
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
        $this->Setting->id = $id;
        if (!$this->Setting->exists()) {
            throw new NotFoundException(__('Invalid setting'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Setting->delete()) {
            $this->Session->setFlash(__('The setting has been deleted.'));
        } else {
            $this->Session->setFlash(__('The setting could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
