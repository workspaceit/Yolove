<?php

App::uses('AppModel', 'Model');

/**
 * Store Model
 *
 */
class Store extends AppModel {

    /**
     * Use table
     *
     * @var mixed False or table name
     */
    public $useTable = 'store';
    var $validate = array(
        'store_name' => array(
            'rule' => 'isUnique',
            'required' => 'required',
            'message' => 'This field cannot be left blank',
        ),
        'shipping_fee' => array(
            'rule' => 'isPos',
            'message' => 'Shipping cost cannot be negative',
        ),
    );

    function isPos() {
        return $this->data['Store']['shipping_fee'] >= 0 ? TRUE : FALSE;
    }

    public $primaryKey = 'id';
    public $belongsTo = array(
        'category' => array(
            'className' => 'Category',
            'foreignKey' => 'category_id'
        ),
        'user' => array(
            'className' => 'User',
            'foreignKey' => 'user_id'
        ),
    );

    public function deleteStore($id = null) {
        $db = ConnectionManager::getDataSource('default');
        $db->rawQuery("DELETE FROM favorite_store WHERE store_id=" . $id);
        $sql = "select * from share where store_id=$id";
        $shares = $this->query($sql);
        App::import('model', 'Item');
        $item = new Item();
        if (count($shares)) {
            foreach ($shares as $key => $share) {
                $item->deleteProduct($share['share']);
                $db->rawQuery("DELETE FROM share WHERE id=" . $share['share']['id']);
            }
        }
    }

}
