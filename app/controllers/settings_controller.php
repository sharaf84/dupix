<?php
require_once '../auth_controller.php';
class SettingsController extends AuthController {

	var $name = 'Settings';
	var $uses = array('Setting');
	
	function index() {
		$this->redirect(array('action' => 'edit'));

	}
	
	function edit() {
		if (!empty($this->data)) {
			if ($this->Setting->save($this->data)){
				//reset session settings
				$this->setSettings(); 
				$this->Session->setFlash(__('The setting has been saved', true));
				$this->redirect(array('action' => 'edit'));
			} else {
				$this->Session->setFlash(__('The setting could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Setting->read(null, 1);
		}
	}
	
/*
	function index() {
		$this->Setting->recursive = 0;
		$this->set('settings', $this->paginate());
	}
	
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid setting', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('setting', $this->Setting->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Setting->create();
			if ($this->Setting->save($this->data)) {
				$this->Session->setFlash(__('The setting has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The setting could not be saved. Please, try again.', true));
			}
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for setting', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Setting->delete($id)) {
			$this->Session->setFlash(__('Setting deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Setting was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}*/
}
?>