<?php
App::uses('ShippingProduct', 'Model');

/**
 * ShippingProduct Test Case
 *
 */
class ShippingProductTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.shipping_product'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ShippingProduct = ClassRegistry::init('ShippingProduct');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ShippingProduct);

		parent::tearDown();
	}

}
