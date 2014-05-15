<?php
App::uses('UserBuyProduct', 'Model');

/**
 * UserBuyProduct Test Case
 *
 */
class UserBuyProductTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user_buy_product',
		'app.product',
		'app.user',
		'app.city',
		'app.state',
		'app.cart',
		'app.credit_card'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->UserBuyProduct = ClassRegistry::init('UserBuyProduct');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UserBuyProduct);

		parent::tearDown();
	}

}
