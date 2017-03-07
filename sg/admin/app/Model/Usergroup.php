<?php

App::uses('AppModel', 'Model');

/**
 * Usergroup Model
 *
 */
class Usergroup extends AppModel {

    /**
     * Use table
     *
     * @var mixed False or table name
     */
    public $useTable = 'usergroup';
    var $validate = array(
        'usergroup_key' => array(
            'unique_email' => array(
                'rule' => 'isUnique',
                'message' => 'The key already exists',
            ),
        ),
        'usergroup_name' => array(
            'unique_email' => array(
                'rule' => 'isUnique',
                'message' => 'The name already exists',
            ),
        ),
    );

}
