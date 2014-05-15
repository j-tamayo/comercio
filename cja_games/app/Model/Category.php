<?php
App::uses('AppModel', 'Model');
/**
 * Category Model
 *
 * @property Product $Product
 */
class Category extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */

public $validate = array(
		'name' => array(
			'unique' => array(
				'rule' => array('isUnique'),
		        'required'   => true,
		        'allowEmpty' => false,
		        // or: 'update'
		        //'on'         => 'create',
		        'message'    => 'Categoria Registrada.Porfavor Coloca Otro Nombre de Categoria'))
    );

	public $hasMany = array(
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'category_id',
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

}
