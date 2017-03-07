<?php

App::uses('AppModel', 'Model');

/**
 * Category Model
 *
 */
class Category extends AppModel {

    /**
     * Use table
     *
     * @var mixed False or table name
     */
    public $useTable = 'category';
    var $validate = array(
        'category_name_cn' => array(
            'rule' => 'isUnique',
            'required' => 'required',
            'message' => 'This name already exists',
        ),
        'category_name_en' => array(
            'rule' => 'isUnique',
            'required' => 'required',
            'message' => 'This key already exists',
        ),
    );

    public function reduceShare($id) {
        $category = $this->find('first', array(
            'conditions' => array(
                'id' => $id
            ),
        ));
        if ($category['Category']['total_share'] != 0) {
            $category['Category']['total_share'] = $category['Category']['total_share'] - 1;
            $this->save($category);
        }
    }

}
