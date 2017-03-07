<?php

App::uses('AppModel', 'Model');

/**
 * ShippingProduct Model
 *
 */
class ShippingProduct extends AppModel {

    /**
     * Use table
     *
     * @var mixed False or table name
     */
    public $useTable = 'shipping_product';
    public $primaryKey = 'id';
    public $belongsTo = array(
        'user' => array(
            'className' => 'User',
            'foreignKey' => 'user_id'
        ),
        'Share' => array(
            'className' => 'Share',
            'foreignKey' => 'share_id'
        ),
    );

    function conn() {
        $result = $this->find('first', array(
            'contain' => array('Category', 'Section', 'Division'),
            'fields' => array('Division.id')
        ));
    }

}
