<?php
require_once '../auth_controller.php';
class ContentsController extends AuthController {

	var $name = 'Contents';

	function index() {
		$this->Content->recursive = 0;
		$this->set('contents', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid content', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('content', $this->Content->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Content->create();
			if ($this->Content->save($this->data)) {
				$this->Session->setFlash(__('The content has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The content could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid content', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Content->save($this->data)) {
				$this->Session->setFlash(__('The content has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The content could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Content->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for content', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Content->delete($id)) {
			$this->Session->setFlash(__('Content deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Content was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>