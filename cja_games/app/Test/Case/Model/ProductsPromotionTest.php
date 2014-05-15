<?php
App::uses('ProductsPromotion', 'Model');

/**
 * ProductsPromotion Test Case
 *
 */
class ProductsPromotionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.products_promotion',
		'app.promotion',
		'app.product',
		'app.category',
		'app.cart',
		'app.user',
		'app.carts_product',
		'app.products_user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ProductsPromotion = ClassRegistry::init('ProductsPromotion');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ProductsPromotion);

		parent::tearDown();
	}

}
