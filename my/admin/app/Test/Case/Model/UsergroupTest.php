<?php
App::uses('Usergroup', 'Model');

/**
 * Usergroup Test Case
 *
 */
class UsergroupTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.usergroup'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Usergroup = ClassRegistry::init('Usergroup');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Usergroup);

		parent::tearDown();
	}

}
