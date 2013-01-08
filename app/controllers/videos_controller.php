<?php
require_once '../auth_controller.php';
class VideosController extends AuthController {

	public $name = 'Videos';
	public $components = array('Upload');

	function index() {
		$this->Video->recursive = 0;
		$this->set('videos', $this->paginate());
	}
	
	function setHome($id = null){
		$this->Video->updateAll(array('Video.home'=>0));
		$this->Video->id = $id;
		$this->Video->saveField('home', 1);
		$this->redirect(array('action' => 'index'));
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid video', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('video', $this->Video->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->data['Video']['image'] = $this->Upload->uploadImage($this->data['Video']['image']);
			$this->Upload->fileTypes = 'flv';
			$this->data['Video']['file'] = $this->Upload->uploadFile($this->data['Video']['file']);
			$this->Video->create();
			if ($this->Video->save($this->data)) {
				$this->Session->setFlash(__('The video has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The video could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid video', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			$this->Video->id = $id;
			if ($this->data['Video']['image']['name']) {
                $this->Upload->filesToDelete = array($this->Video->field('image'));
                $this->data['Video']['image'] = $this->Upload->uploadImage($this->data['Video']['image']);
            }else
                unset($this->data['Video']['image']);
			if ($this->data['Video']['file']['name']) {				
                $this->Upload->filesToDelete = array_merge($this->Upload->filesToDelete, array($this->Video->field('file'))) ;
				$this->Upload->fileTypes = 'flv';
                $this->data['Video']['file'] = $this->Upload->uploadFile($this->data['Video']['file']);
            }else
                unset($this->data['Video']['file']);
			if ($this->Video->save($this->data)) {
				$this->Upload->deleteFiles();
				$this->Session->setFlash(__('The video has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The video could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Video->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for video', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Video->id = $id;
		$this->Upload->filesToDelete = array_merge(array($this->Video->field('image')), array($this->Video->field('file')));
		if ($this->Video->delete($id)) {
			$this->Upload->deleteFiles();
			$this->Session->setFlash(__('Video deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Video was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>