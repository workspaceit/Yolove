<?php
App::uses('ShippingInfo', 'Model');

/**
 * ShippingInfo Test Case
 *
 */
class ShippingInfoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.shipping_info'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ShippingInfo = ClassRegistry::init('ShippingInfo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ShippingInfo);

		parent::tearDown();
	}

}
