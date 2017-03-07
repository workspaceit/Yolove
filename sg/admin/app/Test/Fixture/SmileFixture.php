<?php
/**
 * SmileFixture
 *
 */
class SmileFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'smile';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 6, 'unsigned' => true, 'key' => 'primary'),
		'typeid' => array('type' => 'integer', 'null' => false, 'default' => '1', 'length' => 6, 'unsigned' => true),
		'displayorder' => array('type' => 'boolean', 'null' => false, 'default' => '0', 'key' => 'index'),
		'code' => array('type' => 'string', 'null' => false, 'length' => 30, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'url' => array('type' => 'string', 'null' => false, 'length' => 30, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'idx_displayorder' => array('column' => 'displayorder', 'unique' => 0)
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
			'typeid' => 1,
			'displayorder' => 1,
			'code' => 'Lorem ipsum dolor sit amet',
			'url' => 'Lorem ipsum dolor sit amet'
		),
	);

}
