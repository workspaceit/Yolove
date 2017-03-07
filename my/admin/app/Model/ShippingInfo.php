<?php

App::uses('AppModel', 'Model');

/**
 * ShippingInfo Model
 *
 */
class ShippingInfo extends AppModel {

    /**
     * Use table
     *
     * @var mixed False or table name
     */
    public $useTable = 'shipping_info';
    public $primaryKey = 'id';
    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id'
        ),
    );
    public $hasMany = array(
        'ShippingProduct' => array(
            'className' => 'ShippingProduct',
            'foreignKey' => 'transaction_id'
        ),
    );

    function getShippingProduct($id) {
        $sql = "select * from shipping_product where transaction_id=$id";
        return $this->query($sql);
    }

}
