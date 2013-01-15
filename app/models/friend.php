<?php
class Friend extends AppModel {
	var $name = 'Friend';
	var $displayField = 'title';
	
	var $validate = array();
	
	//The Associations below have been created with all possible keys, those that are not needed can be removed
        var $belongsTo = array(
                        'Parentfrn' => array(
                                'className' => 'Friend',
                                'foreignKey' => 'parent_id',
                        )
                );
	var $hasMany = array(
               'Childmem' => array(
                            'className' => 'Friend',
                            'foreignKey' => 'parent_id',
                    ),
              
            
	);
//	
//	function afterSave($creat){
//		if($creat)
//			$this->createDir();
//	}
		

}
?>