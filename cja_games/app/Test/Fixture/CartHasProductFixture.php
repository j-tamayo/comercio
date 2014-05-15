<?php
/**
 * CartHasProductFixture
 *
 */
class CartHasProductFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id_cart_has_products' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'cart_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'product_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'quantity' => array('type' => 'integer', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id_cart_has_products', 'unique' => 1),
			'cart_id' => array('column' => 'cart_id', 'unique' => 0)
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
			'id_cart_has_products' => 1,
			'cart_id' => 1,
			'product_id' => 1,
			'quantity' => 1
		),
	);

}
