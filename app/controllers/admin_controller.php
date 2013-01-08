<?php
require_once '../auth_controller.php';
class AdminController extends AuthController {	
	
	var $name = 'Admin';
	var $uses = array('User');

	function index(){
				
	}
	
	//login
	function login (){
		if($this->IsAuthentic()){
			$this->Session->setFlash(__('You are already logging in.', true));
			$this->redirect(array('controller' => 'admin', 'action' => 'index'),true);
		}
		if(!empty($this->data)){
			$user = $this->User->find('first', 
							  	   array('conditions' =>
								   	   array('username' => $this->data['User']['username'],
								   	 	     'password' =>  Security::hash($this->data['User']['password'], null, true))));									   	 
			if (!empty($user)){
				$this->Session->setFlash(__('Logged in successfuly.', true));
		    	//Set session with user, group and.
				$this->Session->write('userInfo', array_merge(array('User'=>$user['User']), array('Group'=>$user['Group'])));										  
		    	$this->redirect(array("controller" => "admin/index"),true);						   	 	   	
			}else{
				$this->Session->setFlash(__('Wrong username or password! Please, try again.', true));
			}
		}		
		$this->data = null;
	}
	
	//logout
	function logout()
	{
		$this->Session->destroy();
		$this->Session->setFlash(__('Logged out successfuly.', true));
		$this->redirect(array('controller'=>'admin/login'));
	}

}
?>