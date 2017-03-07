<?php
App::uses('AppModel', 'Model');
/**
 * Tag Model
 *
 */
class Tag extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'tag';
        var $validate = array(
        'tag_name' => array(
            'unique_tagName' => array(
                'rule' => 'isUnique',
                'message' => 'The tag name already exists',
            ),
        ),
    );
}
