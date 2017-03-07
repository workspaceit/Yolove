<?php

App::uses('AppModel', 'Model');

/**
 * Smile Model
 *
 */
class Smile extends AppModel {

    /**
     * Use table
     *
     * @var mixed False or table name
     */
    public $useTable = 'smile';
    var $validate = array(
        'code' => array(
            'rule' => 'isUnique',
            'required' => 'required',
            'message' => 'This smile code already exists'
        ),
    );

}
