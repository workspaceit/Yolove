<?php

App::uses('AppModel', 'Model');

/**
 * Share Model
 *
 */
class Share extends AppModel {

    /**
     * Use table
     *
     * @var mixed False or table name
     */
    public $useTable = 'share';
    public $primaryKey = 'id';
    public $belongsTo = array(
        'Category' => array(
            'className' => 'Category',
            'foreignKey' => 'category_id'
        ),
        'Item' => array(
            'className' => 'Item',
            'foreignKey' => 'item_id'
        ),
        'Album' => array(
            'className' => 'Album',
            'foreignKey' => 'album_id'
        ),
    );
    
    var $validate = array(
        'item_title' => array(
            'rule'=>'notEmpty',
            'required' => 'required',
            'message' => 'Title cannot be left blank',
        ),
        'item_price' => array(
            'rule'=>'notEmpty',
            'required' => 'required',
            'message' => 'Price cannot be left blank',
        ),
    );
    

}
