<?php
App::uses('Promotion', 'Model');

/**
 * Promotion Test Case
 *
 */
class PromotionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.promotion',
		'app.product',
		'app.category',
		'app.cart',
		'app.user',
		'app.carts_product',
		'app.products_promotion',
		'app.products_user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Promotion = ClassRegistry::init('Promotion');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Promotion);

		parent::tearDown();
	}

}
