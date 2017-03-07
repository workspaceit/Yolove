<?php
App::uses('PtxUser', 'Model');

/**
 * PtxUser Test Case
 *
 */
class PtxUserTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ptx_user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PtxUser = ClassRegistry::init('PtxUser');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PtxUser);

		parent::tearDown();
	}

}
