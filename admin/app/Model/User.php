<?php

App::uses('AppModel', 'Model');

/**
 * User Model
 *
 */
class User extends AppModel {

    /**
     * Use table
     *
     * @var mixed False or table name
     */
    public $useTable = 'user';
    var $validate = array(
        'email' => array(
            'unique_email' => array(
                'rule' => 'isUnique',
                'message' => 'The email already exists',
            ),
            'regex' => array(
                'rule' => '/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/',
                'message' => 'Use a valid email'
            )
        ),
        'nickname' => array(
            'unique_nickname' => array(
                'rule' => 'isUnique',
                'message' => 'The nickname already exists',
            ),
        ),
        'passwd' => array(
            'length' => array(
                'rule' => array('minLength', 6),
                'message' => 'Minimum password length is 6 character',
            ),
//            'md5' => array(
//                'rule' => array('beforeSave'),
//            ),
        )
    );
    
    
//    function beforeSave($temp = array()) {
//        $this->data['User']['passwd'] = md5($this->data['User']['passwd']);
//        return true;
//    }

    function getUser() {
        $sql = "select * from user";
        return $this->query($sql);
    }

    function getUserIds($id) {
        $sql = "select * from user_usergroup where user_id=$id";
        $user = $this->query($sql);
        if (empty($user) == false) {
            return $user;
        }
    }

    function getUsersGroup($id) {
        $sql = "select * from usergroup where id=$id";
        return $this->query($sql);
    }

    function validateAdminLogin($username, $password) {
        // Search our database where the 'username' field is equal to our form input.
        // Same with the password (this example uses PLAIN TEXT passwords, you should encrypt yours!)
        // The second parameter tells us which fields to return from the database
        // Here is the corresponding query:
        // "SELECT id, username FROM users WHERE username = 'xxx' AND password = 'yyy'"
        //$user = $this->find(array('email' => $data['username'], 'password' => $data['password']));

        $user = $this->find('first', array(
            'conditions' => array(
                'email' => $username,
                'passwd' => md5($password)
            ),
        ));
        if (empty($user) == false) {

            $userGroup = $this->getUserIds($user['User']['id']);
            foreach ($userGroup as $group):
                if ($group['user_usergroup']['id'] == 1){
                    return $user;
                }
            endforeach;

            return false;
        }

        return false;
    }
    public function reduceUserShare($id) {
        $user = $this->find('first', array(
            'conditions' => array(
                'id' => $id
            ),
        ));
        if ($user['User']['total_share'] != 0) {
            $user['User']['total_share'] = $user['User']['total_share'] - 1;
            $this->save($user);
        }
    }
    public function deleteUser($id=null){
        $sql = "select * from album where user_id=$id";
        $albums = $this->query($sql);
        $newsql = "select * from store where user_id=$id";
        $stores = $this->query($newsql);
        App::import('model', 'Album');
        $userAlbum = new Album();
        App::import('model', 'Store');
        $userStore = new Store();
        $db = ConnectionManager::getDataSource('default');
        if(count($albums)){
            foreach ($albums as $key => $album) {
                $userAlbum->deleteAlbum($album['album']['id']);
                $db->rawQuery("DELETE FROM album WHERE id=". $album['album']['id']);
            }
        }
        if(count($stores)){
            foreach ($stores as $key => $store) {
                $userStore->deleteStore($store['store']['id']);
                $db->rawQuery("DELETE FROM store WHERE id=". $store['store']['id']);
            }
        }
        
        $db->rawQuery("DELETE FROM relationship WHERE user_id=" . $id . " or friend_id=". $id);
        $db->rawQuery("DELETE FROM activity WHERE act_code ='follow' and rel_id =" . $id);
        $db->rawQuery("DELETE FROM activity WHERE user_id=" . $id . " or to_user_id=". $id);
    }
//    public function deleteUsersGroup($id) {
//        $db = ConnectionManager::getDataSource('default');
//        $db->rawQuery("DELETE FROM user_usergroup WHERE id=" . $id);
//        $sql = "select * from user_usergroup where id=$id";
//        return $this->query($sql);
//    }
    public function reduceUserAlbum($id) {
        $user = $this->find('first', array(
            'conditions' => array(
                'id' => $id
            ),
        ));
        if ($user['User']['total_album'] != 0) {
            $user['User']['total_album'] = $user['User']['total_album'] - 1;
            $this->save($user);
        }
    }
    public function increaseUserAlbum($id) {
        $user = $this->find('first', array(
            'conditions' => array(
                'id' => $id
            ),
        ));
        $user['User']['total_album'] = $user['User']['total_album'] + 1;
        $this->save($user);
    }

}
