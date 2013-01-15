<?php
class Member extends AppModel {
	var $name = 'Member';
	var $displayField = 'name';
	
	var $validate = array(
/*   commented by ahmed el gohary 
		'name' => array(
	        'rule' => 'notEmpty',
			'required' => true,
	        'allowEmpty' => false,
	        'message' => 'Please enter a name.'
	    ),*/

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
		if($data['password'] == $this->data['Member']['confirm_password'])
			return true;
		return false;
	}
	
	
	//The Associations below have been created with all possible keys, those that are not needed can be removed
//        var $belongsTo = array(
//                        'Parentmem' => array(
//                                'className' => 'Member',
//                                'foreignKey' => 'parent_id',
//                        )
//                );
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
            
//               'Childmem' => array(
//                            'className' => 'Member',
//                            'foreignKey' => 'parent_id',
//                    ),
            
	);
	
	function afterSave($creat){
		if($creat)
			$this->createDir();
	}
//	public function allMembers(){
//	
//            return $this->Member->find();
//            
//        }
	
	//create member default album and projects dir.
	function createDir(){
		$album = array('title'=>'Default', 'member_id'=>$this->id);
		$this->Album->create();
		$this->Album->save($album);
		
		$dir = IMAGES.'upload'.DS.$this->id.DS.'projects'.DS;
		if(!file_exists($dir))
			mkdir($dir, 0777, true);
	}	

}
?>