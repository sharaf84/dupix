<?php

require_once '../auth_controller.php';

class SectionsController extends AuthController {

    public $name = 'Sections';
    public $components = array('Upload');

    function index() {
        $this->savePositions();
        $this->Section->recursive = 0;
        $this->set('sections', $this->paginate());
    }

    //save positions.	
    private function savePositions() {
        if (!empty($this->data['Section']['ids'])) {
            //set the start positions order.
            $i = (($this->paginate['page'] - 1) * $this->paginate['limit']) + 1;
            //save positions  	
            foreach ($this->data['Section']['ids'] as $id) {
                $this->Section->id = $id;
                $this->Section->saveField('position', $i++);
            }
            $this->Session->setFlash(__('The positions have been saved', true));
        }
    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid section', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('section', $this->Section->read(null, $id));
    }

    function add() {
        if (!empty($this->data)) {
            $this->Upload->masterImageWidth = 220;
            $this->Upload->masterImageHeight = 210;
            $this->Upload->resize = 1;
            $this->data['Section']['image'] = $this->Upload->uploadImage($this->data['Section']['image']);
            $this->Section->create();
            if ($this->Section->save($this->data)) {
                $this->Session->setFlash(__('The section has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The section could not be saved. Please, try again.', true));
            }
        }
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid section', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            $this->Section->id = $id;
            //upload logo if exists
            if ($this->data['Section']['image']['name']) {
                $this->Upload->masterImageWidth = 220;
                $this->Upload->masterImageHeight = 210;
                $this->Upload->resize = 1;
                $this->Upload->filesToDelete = array($this->Section->field('image'));
                $this->data['Section']['image'] = $this->Upload->uploadImage($this->data['Section']['image']);
            }else
                unset($this->data['Section']['image']);
            if ($this->Section->save($this->data)) {
                $this->Upload->deleteFiles(); //delete old files
                $this->Session->setFlash(__('The section has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The section could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Section->read(null, $id);
        }
    }

    function delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for section', true));
            $this->redirect(array('action' => 'index'));
        }
        //to delete image
        $this->Section->id = $id;
        $this->Upload->filesToDelete = array($this->Section->field('image'));
        if ($this->Section->delete($id)) {
            $this->Upload->deleteFiles();
            $this->Session->setFlash(__('Section deleted', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Section was not deleted', true));
        $this->redirect(array('action' => 'index'));
    }

}

?>