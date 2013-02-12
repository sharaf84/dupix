<?php
require_once '../auth_controller.php';
class MembersController extends AuthController {

	var $name = 'Members';

	function index() {
		$this->Member->recursive = 1;
		$this->set('members', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid member', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('member', $this->Member->read(null, $id));
	}

	function add() {
	    $memberList = array();	
            if (!empty($this->data)) {
			$this->data['Member']['confirm_code'] = String::uuid();
			$this->Member->create();
			if ($this->Member->save($this->data)) {
				$this->Session->setFlash(__('The member has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The member could not be saved. Please, try again.', true));
			}
		}
                $memberList = $this->Member->find('list');
                array_unshift($memberList, "Choose Parent");
                
                Configure::write('parentMems',$memberList); 
	}

	function edit($id = null) {
                $memberList = array();
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid member', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Member->save($this->data)) {
				$this->Session->setFlash(__('The member has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The member could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Member->read(null, $id);
		}
                $memberList = $this->Member->find('list');
                array_unshift($memberList, "Choose Parent");
                
                Configure::write('parentMems',$this->Member->find('list', array(
                                                                'conditions' => array('Member.id !=' => $id)
                                                            )));
                
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for member', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Member->delete($id)) {
			$this->Session->setFlash(__('Member deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Member was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>