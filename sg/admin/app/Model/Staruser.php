<?php

App::uses('AppModel', 'Model');

/**
 * Staruser Model
 *
 */
class Staruser extends AppModel {

    /**
     * Use table
     *
     * @var mixed False or table name
     */
    public $useTable = 'staruser';
    public $primaryKey = 'id';
    public $belongsTo = array(
        'user' => array(
            'className' => 'User',
            'foreignKey' => 'user_id'
        ),
    );

}
