<?php
/**
 * ShareFixture
 *
 */
class ShareFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'share';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'item_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'poster_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'poster_nickname' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 80, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'original_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'user_nickname' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 80, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'total_comment' => array('type' => 'integer', 'null' => true, 'default' => '0', 'unsigned' => false, 'key' => 'index'),
		'total_click' => array('type' => 'integer', 'null' => true, 'default' => '0', 'unsigned' => false),
		'total_like' => array('type' => 'integer', 'null' => true, 'default' => '0', 'unsigned' => false, 'key' => 'index'),
		'total_forwarding' => array('type' => 'integer', 'null' => true, 'default' => '0', 'unsigned' => false, 'key' => 'index'),
		'create_time' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false, 'key' => 'index'),
		'comments' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'category_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'album_id' => array('type' => 'integer', 'null' => true, 'default' => '0', 'unsigned' => false, 'key' => 'index'),
		'channel' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 40, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'store_id' => array('type' => 'integer', 'null' => true, 'default' => '0', 'unsigned' => false),
		'dtype' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 4, 'unsigned' => false, 'key' => 'index'),
		'lastcomment_time' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 10, 'unsigned' => false),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'idx_item' => array('column' => 'item_id', 'unique' => 0),
			'idx_poster_id' => array('column' => 'poster_id', 'unique' => 0),
			'idx_original_id' => array('column' => 'original_id', 'unique' => 0),
			'idx_user_id' => array('column' => 'user_id', 'unique' => 0),
			'idx_create_time' => array('column' => 'create_time', 'unique' => 0),
			'idx_total_comment' => array('column' => 'total_comment', 'unique' => 0),
			'idx_total_like' => array('column' => 'total_like', 'unique' => 0),
			'idx_dtype' => array('column' => 'dtype', 'unique' => 0),
			'idx_total_forward' => array('column' => 'total_forwarding', 'unique' => 0),
			'idx_category_id' => array('column' => 'category_id', 'unique' => 0),
			'idx_album_id' => array('column' => 'album_id', 'unique' => 0)
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
			'poster_id' => 1,
			'poster_nickname' => 'Lorem ipsum dolor sit amet',
			'original_id' => 1,
			'user_id' => 1,
			'user_nickname' => 'Lorem ipsum dolor sit amet',
			'total_comment' => 1,
			'total_click' => 1,
			'total_like' => 1,
			'total_forwarding' => 1,
			'create_time' => 1,
			'comments' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'category_id' => 1,
			'album_id' => 1,
			'channel' => 'Lorem ipsum dolor sit amet',
			'store_id' => 1,
			'dtype' => 1,
			'lastcomment_time' => 1
		),
	);

}
