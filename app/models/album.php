<?php
class Album extends AppModel {
	var $name = 'Album';
	var $displayField = 'title';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Member' => array(
			'className' => 'Member',
			'foreignKey' => 'member_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
            
//		'Friend' => array(
//			'className' => 'Friend',
//			'foreignKey' => 'friend_id',
//			'conditions' => '',
//			'fields' => '',
//			'order' => ''
//		)
	);

	var $hasMany = array(
		'Gal' => array(
			'className' => 'Gal',
			'foreignKey' => 'album_id',
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


	var $hasAndBelongsToMany = array(
		'Member' => array(
			'className' => 'Member',
			'joinTable' => 'albums_members',
			'foreignKey' => 'album_id',
			'associationForeignKey' => 'member_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

}
?>