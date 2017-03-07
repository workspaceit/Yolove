<?php
/**
 * CategoryFixture
 *
 */
class CategoryFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'category';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'category_name_cn' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 80, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'category_name_en' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 80, 'key' => 'index', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'parent_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => false, 'key' => 'index'),
		'parent_name' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 80, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'is_system' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4, 'unsigned' => false, 'key' => 'index'),
		'is_open' => array('type' => 'integer', 'null' => true, 'default' => '1', 'length' => 4, 'unsigned' => false),
		'is_home' => array('type' => 'boolean', 'null' => true, 'default' => '1'),
		'description' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'category_hot_words' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'category_home_shares' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'display_order' => array('type' => 'integer', 'null' => false, 'default' => '100', 'unsigned' => false, 'key' => 'index'),
		'total_share' => array('type' => 'integer', 'null' => true, 'default' => '0', 'unsigned' => false),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'idx_category_name_en' => array('column' => 'category_name_en', 'unique' => 0),
			'idx_display_order' => array('column' => 'display_order', 'unique' => 0),
			'idx_parent_id' => array('column' => 'parent_id', 'unique' => 0),
			'idx_is_system' => array('column' => 'is_system', 'unique' => 0)
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
			'category_name_cn' => 'Lorem ipsum dolor sit amet',
			'category_name_en' => 'Lorem ipsum dolor sit amet',
			'parent_id' => 1,
			'parent_name' => 'Lorem ipsum dolor sit amet',
			'is_system' => 1,
			'is_open' => 1,
			'is_home' => 1,
			'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'category_hot_words' => 'Lorem ipsum dolor sit amet',
			'category_home_shares' => 'Lorem ipsum dolor sit amet',
			'display_order' => 1,
			'total_share' => 1
		),
	);

}
