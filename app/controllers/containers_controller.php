<?php
require_once '../auth_controller.php';
class ContainersController extends AuthController {

	var $name = 'Containers';

	function index() {
		$this->Container->recursive = 0;
		$this->set('containers', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid container', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('container', $this->Container->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Container->create();
			if ($this->Container->save($this->data)) {
				$this->Session->setFlash(__('The container has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The container could not be saved. Please, try again.', true));
			}
		}
		$orders = $this->Container->Order->find('list');
		$projects = $this->Container->Project->find('list');
		$products = $this->Container->Product->find('list');
		$this->set(compact('orders', 'projects', 'products'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid container', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Container->save($this->data)) {
				$this->Session->setFlash(__('The container has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The container could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Container->read(null, $id);
		}
		$orders = $this->Container->Order->find('list');
		$projects = $this->Container->Project->find('list');
		$products = $this->Container->Product->find('list');
		$this->set(compact('orders', 'projects', 'products'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for container', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Container->delete($id)) {
			$this->Session->setFlash(__('Container deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Container was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>