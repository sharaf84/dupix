<?php
class Group extends AppModel {
	var $name = 'Group';
	var $displayField = 'name';
	
	//Validation rules
	var $validate = array(
	    'name' => array(
	        'rule' => 'isUnique',
	        'required' => true,
	        'allowEmpty' => false,
	        'message' => 'Name must be uniqe and not blank.'
	    )
	);
	
	
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	//Set 'dependent' => true to cascade delete related users.
	var $hasMany = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'group_id',
			'dependent' => true,
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