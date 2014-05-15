<?php
/**
 * CampaingApplyToProductFixture
 *
 */
class CampaingApplyToProductFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'campaing_apply_to_product';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id_campaing_apply_to_product' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'campaign_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'product_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id_campaing_apply_to_product', 'unique' => 1),
			'campaing' => array('column' => 'campaign_id', 'unique' => 0),
			'product' => array('column' => 'product_id', 'unique' => 0)
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
			'id_campaing_apply_to_product' => 1,
			'campaign_id' => 1,
			'product_id' => 1
		),
	);

}
