<?php
require_once '../auth_controller.php';
class ResponsesController extends AuthController {

	var $name = 'Responses';

	function index() {
		$this->Response->recursive = 0;
		$this->set('responses', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid response', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('response', $this->Response->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Response->create();
			if ($this->Response->save($this->data)) {
				$this->Session->setFlash(__('The response has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The response could not be saved. Please, try again.', true));
			}
		}
		$projects = $this->Response->Project->find('list');
		$this->set(compact('projects'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid response', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Response->save($this->data)) {
				$this->Session->setFlash(__('The response has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The response could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Response->read(null, $id);
		}
		$projects = $this->Response->Project->find('list');
		$this->set(compact('projects'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for response', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Response->delete($id)) {
			$this->Session->setFlash(__('Response deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Response was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>