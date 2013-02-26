<?php
require_once '../auth_controller.php';
class DschoolsController extends AuthController {

	var $name = 'Members';

	function index() {
		$this->Dschool->recursive = 1;
		$this->set('dschools', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid School', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('member', $this->Dschool->read(null, $id));
	}

	function add() {
	    $memberList = array();	
            if (!empty($this->data)) {
			$this->data['Dschool']['confirm_code'] = String::uuid();
			$this->Dschool->create();
			if ($this->Dschool->save($this->data)) {
				$this->Session->setFlash(__('The school has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The school could not be saved. Please, try again.', true));
			}
		}
                $memberList = $this->Dschool->find('list');
                array_unshift($dschoolList, "Choose Parent");
                
                Configure::write('parentMems',$memberList); 
	}

	function edit($id = null) {
                $dschoolList = array();
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid dschool', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Member->save($this->data)) {
				$this->Session->setFlash(__('The school has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The school could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Dschool->read(null, $id);
		}
                $memberList = $this->Dschool->find('list');
                array_unshift($dschoolList, "Choose Parent");
                
                Configure::write('parentMems',$this->Dschool->find('list', array(
                                                                'conditions' => array('Dschool.id !=' => $id)
                                                            )));
                
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for school', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Member->delete($id)) {
			$this->Session->setFlash(__('school deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('school was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>