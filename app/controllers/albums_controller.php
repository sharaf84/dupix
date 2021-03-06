<?php
require_once '../auth_controller.php';
class AlbumsController extends AuthController {

	var $name = 'Albums';

	function index() {
		$this->Album->recursive = 0;
		$this->set('albums', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid album', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('album', $this->Album->read(null, $id));
	}

	function add() {
            $urlSegms = array();
            $urlSegms = explode('/', $_REQUEST['url']);
            
            
            $refererController = '';
            $refererId = 1;
            if(strpos(Controller::referer(), 'members')){
                $refererController = 'members';
                $refererId = $urlSegms[sizeof($urlSegms)-1];
            }elseif (strpos(Controller::referer(), 'friends')){
                $refererController = 'friends';
                $refererId = $urlSegms[sizeof($urlSegms)-1];
            }

		if (!empty($this->data)) {
			$this->Album->create();
			if ($this->Album->save($this->data)) {
				$this->Session->setFlash(__('The album has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The album could not be saved. Please, try again.', true));
			}
		}
		$friends = $this->Album->Friend->find('list');
		$members = $this->Album->Member->find('list');
		$this->set(compact('friends', 'members'));
		$this->set('refererController', $refererController);
		$this->set('refererId', $refererId);
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid album', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Album->save($this->data)) {
				$this->Session->setFlash(__('The album has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The album could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Album->read(null, $id);
		}
		$members = $this->Album->Member->find('list');
		$friends = $this->Album->Friend->find('list');
		$members = $this->Album->Member->find('list');
		$this->set(compact('members', 'friends', 'members'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for album', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Album->delete($id)) {
			$this->Session->setFlash(__('Album deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Album was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>