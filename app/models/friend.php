<?php

class Friend extends AppModel {

    public $name = 'Friend';
    var $displayField = 'title';
    //The Associations below have been created with all possible keys, those that are not needed can be removed

    var $belongsTo = array(
   
        'Parent' => array(
            'className' => 'Friend',
            'foreignKey' => 'parent_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Member' => array(
			'className' => 'Member',
			'foreignKey' => 'member_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
    );
    
    var $hasMany = array(
            'Album' => array(
                'className' => 'Album',
                'foreignKey' => 'friend_id',
                'dependent' => false,
                'conditions' => '',
                'fields' => '',
                'order' => '',
                'limit' => '',
                'offset' => '',
                'exclusive' => '',
                'finderQuery' => '',
                'counterQuery' => ''
        ),

        
        'Child' => array(
            'className' => 'Friend',
            'foreignKey' => 'parent_id',
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