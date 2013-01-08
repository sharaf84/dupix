<?php
/*
* Author "SHARAF" 
* Author Email "sharaf.developer@gmail.com"
* Copyright (c) 2012 Programming by "shift.com.eg"
*/
class AuthController extends AppController{
	
	//var $uses = null;	
	var $helpers = array('Html', 'Form', 'Javascript', 'Fck', 'Ajax', 'Session');
	
	function beforeFilter(){
		// Check Authentication 
		if(!$this->isAuthentic() && ($this->action != 'login')){
			$this->Session->setFlash(__('UnAuthorized access attempt! Please Login first.', true),true);
			$this->redirect(array('controller' => 'admin', 'action' => 'login'));
		}
		
		//Apply Access Control To All Users (Except Web Master).
		if($this->Session->read('userInfo.User.id') != 1){
			// Prevent all users from accessing users, groups pages or do any delete action. 
			if(($this->name == 'Users') || ($this->name == 'Groups') || ($this->action == 'delete')){
				$this->Session->setFlash(__("Sorry! only Web Master can access $this->name page.", true));
				$this->redirect(array('controller' => 'admin', 'action' => 'index'));
			}
		}
	}
	
	function beforeRender(){
		// To view the content in another layout instead of the default layout :
		if($this->layout != 'ajax')
			$this->layout = 'backend/main';
	}
	
	protected function isAuthentic(){
		if($this->Session->check('userInfo')){
			//check if data in session (userInfo) existing in database.
			if($this->inDataBase()){
				//write settings in session and return
				if(!$this->Session->check('Setting'))
					$this->setSettings();
				return true;
			}else{
				$this->Session->destroy();
				return false;
			}
		}else
			return false;
	}
		
	protected function inDataBase (){
		$this->loadModel('User');
		$this->User->recursive = -1;
		return $this->User->find('count', 
							  	  array('conditions' =>
								   	   array('username' => $this->Session->read('userInfo.User.username'),
								   	 	     'password' => $this->Session->read('userInfo.User.password'))));
	}
	
	function deleteFile ($model=null, $id=null, $field=null){
		if (!$model || !$id || !$field) {
			$this->Session->setFlash(__("Invalid $field", true));
			$this->redirect($this->referer(array('action' => 'index')));
		}
		$this->Session->setFlash(__("The $field could not be deleted. Please, try again.", true));
		//to delete file
		if($model == 'Gal') $this->loadModel('Gal'); 
		$this->$model->id = $id;
		$this->Upload->filesToDelete = array($this->$model->field($field));
		if($model == 'Gal'){
			if($this->$model->delete($id)){
				$this->Upload->deleteFiles();
				$this->Session->setFlash(__("The $field has been deleted", true));
			}
		}
		elseif($this->$model->saveField($field, '')) {
			$this->Upload->deleteFiles();
			$this->Session->setFlash(__("The $field has been deleted", true));
		} 
		$this->redirect($this->referer(array('controller'=>'admin', 'action' => 'index')));	
	}

}
?>