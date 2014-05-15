<?php
/**
 * ProductsPromotionFixture
 *
 */
class ProductsPromotionFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'promotion_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'product_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'product' => array('column' => 'product_id', 'unique' => 0),
			'campaing' => array('column' => 'promotion_id', 'unique' => 0),
			'pro' => array('column' => 'promotion_id', 'unique' => 0),
			'prod' => array('column' => 'product_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'promotion_id' => 1,
			'product_id' => 1
		),
	);

}
