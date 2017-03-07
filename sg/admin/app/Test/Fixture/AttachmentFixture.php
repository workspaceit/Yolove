<?php
/**
 * AttachmentFixture
 *
 */
class AttachmentFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'attachment';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'item_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => true, 'key' => 'index'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 8, 'unsigned' => true, 'key' => 'index'),
		'create_time' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'unsigned' => true),
		'filename' => array('type' => 'string', 'null' => false, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'fileext' => array('type' => 'string', 'null' => false, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'filesize' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'unsigned' => true),
		'attachment' => array('type' => 'string', 'null' => false, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'remote' => array('type' => 'string', 'null' => false, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'source' => array('type' => 'string', 'null' => false, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'description' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'readperm' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3, 'unsigned' => true),
		'isimage' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'width' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 6, 'unsigned' => true),
		'height' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 6, 'unsigned' => true),
		'thumb' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'downloads' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 8, 'unsigned' => false),
		'cloud' => array('type' => 'string', 'null' => false, 'length' => 80, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'idx_item_id' => array('column' => 'item_id', 'unique' => 0),
			'idx_user_id' => array('column' => 'user_id', 'unique' => 0)
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
			'item_id' => 1,
			'user_id' => 1,
			'create_time' => 1,
			'filename' => 'Lorem ipsum dolor sit amet',
			'fileext' => 'Lorem ipsum dolor sit amet',
			'filesize' => 1,
			'attachment' => 'Lorem ipsum dolor sit amet',
			'remote' => 'Lorem ipsum dolor sit amet',
			'source' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet',
			'readperm' => 1,
			'isimage' => 1,
			'width' => 1,
			'height' => 1,
			'thumb' => 1,
			'downloads' => 1,
			'cloud' => 'Lorem ipsum dolor sit amet'
		),
	);

}
