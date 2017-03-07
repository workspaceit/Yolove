<?php
App::uses('PtxAlbum', 'Model');

/**
 * PtxAlbum Test Case
 *
 */
class PtxAlbumTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ptx_album'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PtxAlbum = ClassRegistry::init('PtxAlbum');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PtxAlbum);

		parent::tearDown();
	}

}
