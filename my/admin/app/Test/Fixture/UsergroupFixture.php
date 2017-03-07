<?php
/**
 * UsergroupFixture
 *
 */
class UsergroupFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'usergroup';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 6, 'unsigned' => true, 'key' => 'primary'),
		'usergroup_key' => array('type' => 'string', 'null' => false, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'usergroup_name' => array('type' => 'string', 'null' => false, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'credits_lower' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'unsigned' => false),
		'credits_higher' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'unsigned' => false, 'key' => 'index'),
		'stars' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3, 'unsigned' => false),
		'color' => array('type' => 'string', 'null' => false, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'icon' => array('type' => 'string', 'null' => false, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'allow_visit' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
		'allow_share' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
		'need_verify' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
		'other_permission' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'idx_credits_range' => array('column' => array('credits_higher', 'credits_lower'), 'unique' => 0)
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
			'usergroup_key' => 'Lorem ipsum dolor sit amet',
			'usergroup_name' => 'Lorem ipsum dolor sit amet',
			'credits_lower' => 1,
			'credits_higher' => 1,
			'stars' => 1,
			'color' => 'Lorem ipsum dolor sit amet',
			'icon' => 'Lorem ipsum dolor sit amet',
			'allow_visit' => 1,
			'allow_share' => 1,
			'need_verify' => 1,
			'other_permission' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.'
		),
	);

}
