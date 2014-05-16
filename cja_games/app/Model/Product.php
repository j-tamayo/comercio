<?php
App::uses('AppModel', 'Model');
/**
 * Product Model
 *
 * @property Category $Category
 * @property Cart $Cart
 * @property Promotion $Promotion
 * @property User $User
 */
class Product extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */


public $validate = array(

		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Debe Colocar Nombre Del Producto',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),'unique' => array(
				'rule' => array('isUnique'),
		        // or: 'update'
		        //'on'         => 'create',
		        'message'    => 'Producto Registrado.Porfavor Coloca Otro Nombre de Producto')
		),
		'price' => array(
				'comparison' => array(
                'rule'    => array('comparison', '>=', 0),
                'message' => 'mayor o igual a 0 el Precio'
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
				'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Debe Colocar Precio',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),'enable' => array(
				'comparison' => array(
                'rule'    => array('comparison', '>=', 0),
                'message' => 'mayor o igual a 0 Disponible'
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
				'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Debe Colocar Precio',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),'in_stock' => array(
				'comparison' => array(
                'rule'    => array('comparison', '>=', 0),
                'message' => 'mayor o igual a 0 En el Almacen'
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
				'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Debe Colocar Precio',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'image' => array(
			'extension' => array(
	     		'rule' => array('extension',array('gif', 'jpeg', 'png', 'jpg','bmp','')),
		        'message' => 'Solo Imagenes'
		     )
			
		),
	);
	public $belongsTo = array(
		'Category' => array(
			'className' => 'Category',
			'foreignKey' => 'category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'ProductsUser' => array(
			'className' => 'ProductsUser',
			'foreignKey' => 'product_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
	
	public $hasAndBelongsToMany = array(
		'Cart' => array(
			'className' => 'Cart',
			'joinTable' => 'carts_products',
			'foreignKey' => 'product_id',
			'associationForeignKey' => 'cart_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
		'Promotion' => array(
			'className' => 'Promotion',
			'joinTable' => 'products_promotions',
			'foreignKey' => 'product_id',
			'associationForeignKey' => 'promotion_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
		'User' => array(
			'className' => 'User',
			'joinTable' => 'products_users',
			'foreignKey' => 'product_id',
			'associationForeignKey' => 'user_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

}
