<?php
App::uses('Smile', 'Model');

/**
 * Smile Test Case
 *
 */
class SmileTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.smile'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Smile = ClassRegistry::init('Smile');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Smile);

		parent::tearDown();
	}

}
