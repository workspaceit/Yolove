<?php
App::uses('Staruser', 'Model');

/**
 * Staruser Test Case
 *
 */
class StaruserTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.staruser'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Staruser = ClassRegistry::init('Staruser');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Staruser);

		parent::tearDown();
	}

}
