<?php
require_once '../auth_controller.php';
class AlbumsMembersController extends AuthController {

	var $name = 'AlbumsMembers';

	function index() {
		$this->AlbumsMember->recursive = 0;
		$this->set('albumsMembers', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid albums member', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('albumsMember', $this->AlbumsMember->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->AlbumsMember->create();
			if ($this->AlbumsMember->save($this->data)) {
				$this->Session->setFlash(__('The albums member has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The albums member could not be saved. Please, try again.', true));
			}
		}
		$albums = $this->AlbumsMember->Album->find('list');
		$members = $this->AlbumsMember->Member->find('list');
		$this->set(compact('albums', 'members'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid albums member', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->AlbumsMember->save($this->data)) {
				$this->Session->setFlash(__('The albums member has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The albums member could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->AlbumsMember->read(null, $id);
		}
		$albums = $this->AlbumsMember->Album->find('list');
		$members = $this->AlbumsMember->Member->find('list');
		$this->set(compact('albums', 'members'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for albums member', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->AlbumsMember->delete($id)) {
			$this->Session->setFlash(__('Albums member deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Albums member was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>
