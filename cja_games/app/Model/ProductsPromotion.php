<?php
App::uses('AppModel', 'Model');
/**
 * ProductsPromotion Model
 *
 * @property Promotion $Promotion
 * @property Product $Product
 */
class ProductsPromotion extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Promotion' => array(
			'className' => 'Promotion',
			'foreignKey' => 'promotion_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'product_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
