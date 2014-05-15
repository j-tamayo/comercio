<?php
App::uses('ProductsUser', 'Model');

/**
 * ProductsUser Test Case
 *
 */
class ProductsUserTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.products_user',
		'app.product',
		'app.category',
		'app.cart',
		'app.user',
		'app.carts_product',
		'app.promotion',
		'app.products_promotion'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ProductsUser = ClassRegistry::init('ProductsUser');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ProductsUser);

		parent::tearDown();
	}

}
