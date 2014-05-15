<?php
App::uses('CartHasProduct', 'Model');

/**
 * CartHasProduct Test Case
 *
 */
class CartHasProductTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.cart_has_product',
		'app.cart',
		'app.user',
		'app.product'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CartHasProduct = ClassRegistry::init('CartHasProduct');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CartHasProduct);

		parent::tearDown();
	}

}
