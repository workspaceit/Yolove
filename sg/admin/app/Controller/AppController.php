<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    public $user_path = "http://yolove.it/";

    function authenticate() {
        // Check if the session variable User exists, redirect to loginform if not
        if (!$this->Session->check('SgUser')) {
            $this->redirect(array('controller' => 'index'));
            exit();
        }
    }

    // Authenticate on every action, except the login form
    function beforeFilter() {

        if ($this->controller != 'index') {
            $this->authenticate();
        }
        $this->baseUrl = $this->webroot;
        $this->apiPath = $_SERVER['DOCUMENT_ROOT'] . "/yolove_api/sg/";
        if (isset($_SERVER['HTTPS'])) {
            $domain = 'https://' . $_SERVER['SERVER_NAME'];
        } else {
            $domain = 'http://' . $_SERVER['SERVER_NAME'];
        }
        if ($_SERVER['SERVER_NAME'] == "localhost" || $_SERVER['SERVER_NAME'] == "workspaceit.com") {
            $this->apiUrl = $domain . "/yolove_web/yolove_api/sg/";
            $this->siteUrl = $domain. "/yolove_web/sg/";
        } else {
            $this->apiUrl = $domain . "/yolove_api/sg/";
            $this->siteUrl = $domain."/sg/";
        }
        $this->set('baseUrl', $this->baseUrl);
        $this->set('apiPath', $this->apiPath);
        $this->set('apiUrl', $this->apiUrl);
        $this->set('siteUrl', $this->siteUrl);
//        $this->set('base_path', 'http://yolove.it/');
    }

    public function prd($data = NULL) {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
    public function getLogadmin(){
        
    }

}
