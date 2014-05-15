<?php
App::uses('CampaingApplyToProduct', 'Model');

/**
 * CampaingApplyToProduct Test Case
 *
 */
class CampaingApplyToProductTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.campaing_apply_to_product',
		'app.campaign',
		'app.product'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CampaingApplyToProduct = ClassRegistry::init('CampaingApplyToProduct');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CampaingApplyToProduct);

		parent::tearDown();
	}

}
