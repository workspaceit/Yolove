<?php
App::uses('UserUsergroup', 'Model');

/**
 * UserUsergroup Test Case
 *
 */
class UserUsergroupTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user_usergroup'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->UserUsergroup = ClassRegistry::init('UserUsergroup');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UserUsergroup);

		parent::tearDown();
	}

}
