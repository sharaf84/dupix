<?php

class Dschool extends AppModel {
    public $useTable = 'members';
    var $name = ' ';
    var $displayField = 'name';
    var $validate = array(
//        'name' => array(
//            'rule' => 'notEmpty',
//            'required' => true,
//            'allowEmpty' => false,
//            'message' => 'Please enter a name.'
//        ),
        'email' => array(
            'emailRule-1' => array(
                'rule' => 'email',
                'required' => true,
                'allowEmpty' => false,
                'message' => 'Please enter a valid email.',
                'last' => true
            ),
            'emailRule-2' => array(
                'rule' => 'isUnique',
                'message' => 'An account with this e-mail already exists.'
            )
        ),
        'password' => array(
            'notempty' => array(
                'rule' => 'notEmpty',
                'required' => true,
                'allowEmpty' => false,
                'message' => 'Please enter a password.'
            ),
            'passwordSimilar' => array(
                'rule' => 'checkPasswords',
                'message' => 'Different password re entered.'
            )
        )
    );

    // validat functions:
    function checkPasswords($data) {
        if ($data['password'] == $this->data['Dschool']['confirm_password'])
            return true;
        return false;
    }

    //The Associations below have been created with all possible keys, those that are not needed can be removed
    var $belongsTo = array(
        'Dschool_Parent' => array(
            'className' => 'Dschool',
            'foreignKey' => 'parent_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
    var $hasMany = array(
        'Album' => array(
            'className' => 'Album',
            'foreignKey' => 'member_id',
            'dependent' => true,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'Event' => array(
            'className' => 'Event',
            'foreignKey' => 'member_id',
            'dependent' => true,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'Friend' => array(
            'className' => 'Friend',
            'foreignKey' => 'member_id',
            'dependent' => true,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'Gal' => array(
            'className' => 'Gal',
            'foreignKey' => 'member_id',
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
        'Product' => array(
            'className' => 'Product',
            'foreignKey' => 'member_id',
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
        'Project' => array(
            'className' => 'Project',
            'foreignKey' => 'member_id',
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
        'Order' => array(
            'className' => 'Order',
            'foreignKey' => 'member_id',
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
        'Dschool_Child' => array(
            'className' => 'Dschool',
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
    var $hasAndBelongsToMany = array(
        'Album' => array(
            'className' => 'Album',
            'joinTable' => 'albums_members',
            'foreignKey' => 'member_id',
            'associationForeignKey' => 'album_id',
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

    function afterSave($creat) {
        if ($creat)
            $this->createDir();
    }

    //create member default album and projects dir.
    function createDir() {
        $album = array('title' => 'Default', 'member_id' => $this->id);
        $this->Album->create();
        $this->Album->save($album);

//		$dir = IMAGES.'upload'.DS.$this->id.DS.'projects'.DS;
//		if(!file_exists($dir))
//			mkdir($dir, 0777, true);
    }

}

?>