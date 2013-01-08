<?php
class Section extends AppModel {
	public $name = 'Section';
	public $order = 'Section.position ASC';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	public $hasMany = array(
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'section_id',
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
?>