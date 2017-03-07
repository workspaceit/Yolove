<?php

/**
 * UserFixture
 *
 */
class UserFixture extends CakeTestFixture {

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'user';

    /**
     * Fields
     *
     * @var array
     */
    function validateAdminLogin($username,$password) {
        
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
            return $user;
        }

        return false;
    }

    public $fields = array(
        'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
        'uc_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
        'email' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 80, 'key' => 'index', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'passwd' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'nickname' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 80, 'key' => 'index', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'uc_nickname' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 80, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'domain' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 80, 'key' => 'index', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'gender' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 10, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'province' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'city' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'location' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'user_title' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'bio' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'create_time' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false),
        'total_follow' => array('type' => 'integer', 'null' => true, 'default' => '0', 'unsigned' => false),
        'total_follower' => array('type' => 'integer', 'null' => true, 'default' => '0', 'unsigned' => false),
        'total_share' => array('type' => 'integer', 'null' => true, 'default' => '0', 'unsigned' => false),
        'total_album' => array('type' => 'integer', 'null' => true, 'default' => '0', 'unsigned' => false),
        'total_like' => array('type' => 'integer', 'null' => true, 'default' => '0', 'unsigned' => false),
        'total_favorite_share' => array('type' => 'integer', 'null' => true, 'default' => '0', 'unsigned' => false),
        'total_favorite_album' => array('type' => 'integer', 'null' => true, 'default' => '0', 'unsigned' => false),
        'lost_password_key' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 40, 'key' => 'index', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'lost_password_expire' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
        'last_login_time' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => false),
        'credits' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 10, 'unsigned' => false),
        'ext_credits_1' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 10, 'unsigned' => false),
        'ext_credits_2' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 10, 'unsigned' => false),
        'ext_credits_3' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 10, 'unsigned' => false),
        'is_social' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 4, 'unsigned' => false),
        'is_star' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 4, 'unsigned' => false),
        'has_store' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 4, 'unsigned' => false),
        'is_deleted' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 4, 'unsigned' => false),
        'theme' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'follow_you' => array('type' => 'integer', 'null' => true, 'default' => '1', 'length' => 4, 'unsigned' => false),
        'like_collection' => array('type' => 'integer', 'null' => true, 'default' => '1', 'length' => 4, 'unsigned' => false),
        'like_item' => array('type' => 'integer', 'null' => true, 'default' => '1', 'length' => 4, 'unsigned' => false),
        'mentions_you' => array('type' => 'integer', 'null' => true, 'default' => '1', 'length' => 4, 'unsigned' => false),
        'store_follow' => array('type' => 'integer', 'null' => true, 'default' => '1', 'length' => 4, 'unsigned' => false),
        'user_follow' => array('type' => 'integer', 'null' => true, 'default' => '1', 'length' => 4, 'unsigned' => false),
        'collection_follow' => array('type' => 'integer', 'null' => true, 'default' => '1', 'length' => 4, 'unsigned' => false),
        'user_credits' => array('type' => 'float', 'null' => false, 'default' => null, 'unsigned' => false),
        'access_key' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'indexes' => array(
            'PRIMARY' => array('column' => 'id', 'unique' => 1),
            'idx_login' => array('column' => array('email', 'passwd'), 'unique' => 0),
            'idx_nickname' => array('column' => 'nickname', 'unique' => 0),
            'idx_lost_password_key' => array('column' => 'lost_password_key', 'unique' => 0),
            'idx_domain' => array('column' => 'domain', 'unique' => 0),
            'idx_email' => array('column' => 'email', 'unique' => 0)
        ),
        'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
    );

    /**
     * Records
     *
     * @var array
     */
    public $records = array(
        array(
            'id' => 1,
            'uc_id' => 1,
            'email' => 'Lorem ipsum dolor sit amet',
            'passwd' => 'Lorem ipsum dolor sit amet',
            'nickname' => 'Lorem ipsum dolor sit amet',
            'uc_nickname' => 'Lorem ipsum dolor sit amet',
            'domain' => 'Lorem ipsum dolor sit amet',
            'gender' => 'Lorem ip',
            'province' => 'Lorem ipsum dolor ',
            'city' => 'Lorem ipsum dolor ',
            'location' => 'Lorem ipsum dolor ',
            'user_title' => 'Lorem ipsum dolor sit amet',
            'bio' => 'Lorem ipsum dolor sit amet',
            'create_time' => 1,
            'total_follow' => 1,
            'total_follower' => 1,
            'total_share' => 1,
            'total_album' => 1,
            'total_like' => 1,
            'total_favorite_share' => 1,
            'total_favorite_album' => 1,
            'lost_password_key' => 'Lorem ipsum dolor sit amet',
            'lost_password_expire' => 1,
            'last_login_time' => 1,
            'credits' => 1,
            'ext_credits_1' => 1,
            'ext_credits_2' => 1,
            'ext_credits_3' => 1,
            'is_social' => 1,
            'is_star' => 1,
            'has_store' => 1,
            'is_deleted' => 1,
            'theme' => 'Lorem ipsum dolor sit amet',
            'follow_you' => 1,
            'like_collection' => 1,
            'like_item' => 1,
            'mentions_you' => 1,
            'store_follow' => 1,
            'user_follow' => 1,
            'collection_follow' => 1,
            'user_credits' => 1,
            'access_key' => 'Lorem ipsum dolor sit amet'
        ),
    );

}
