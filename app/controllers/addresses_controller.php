<?php
require_once '../auth_controller.php';
class AddressesController extends AuthController {

	var $name = 'Addresses';

	function index() {
		$this->Address->recursive = 0;
		$this->set('addresses', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid address', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('address', $this->Address->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Address->create();
			if ($this->Address->save($this->data)) {
				$this->Session->setFlash(__('The address has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The address could not be saved. Please, try again.', true));
			}
		}
		$members = $this->Address->Member->find('list');
		$this->set(compact('members'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid address', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Address->save($this->data)) {
				$this->Session->setFlash(__('The address has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The address could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Address->read(null, $id);
		}
		$members = $this->Address->Member->find('list');
		$this->set(compact('members'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for address', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Address->delete($id)) {
			$this->Session->setFlash(__('Address deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Address was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>