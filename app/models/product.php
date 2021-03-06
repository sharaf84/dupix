<?php

class Product extends AppModel {

    public $name = 'Product';
    public $order = 'Product.position ASC';
    //The Associations below have been created with all possible keys, those that are not needed can be removed

    var $belongsTo = array(
        
        'Member' => array(
            'className' => 'Member',
            'foreignKey' => 'member_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        
        'Section' => array(
            'className' => 'Section',
            'foreignKey' => 'section_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Product_Parent' => array(
            'className' => 'Product',
            'foreignKey' => 'parent_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
    
    var $hasMany = array(
        'Gal' => array(
            'className' => 'Gal',
            'foreignKey' => 'product_id',
            'dependent' => true,
            'conditions' => '',
            'fields' => '',
            'order' => 'Gal.position ASC',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'Project' => array(
            'className' => 'Project',
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
        ),
        'Product_Child' => array(
            'className' => 'Product',
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