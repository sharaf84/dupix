<?php
class GalsController extends AppController {

	var $name = 'Gals';

	function index() {
		$this->Gal->recursive = 0;
		$this->set('gals', $this->paginate());
	}
	
	//save positions (call bu AJAX).	
    function savePositions() {
    	//pr($this->params);
        if (!empty($this->params['form']['galIds'])) {
            //set the start positions order.
            $i = 1;
            //save positions  	
            foreach ($this->params['form']['galIds'] as $id) {
                $this->Gal->id = $id;
                $this->Gal->saveField('position', $i++);
            }
        }
		$this->autoRender = FALSE;
    }

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid gal', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('gal', $this->Gal->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Gal->create();
			if ($this->Gal->save($this->data)) {
				$this->Session->setFlash(__('The gal has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The gal could not be saved. Please, try again.', true));
			}
		}
		$products = $this->Gal->Product->find('list');
		$albums = $this->Gal->Album->find('list');
		$this->set(compact('products', 'albums'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid gal', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Gal->save($this->data)) {
				$this->Session->setFlash(__('The gal has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The gal could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Gal->read(null, $id);
		}
		$products = $this->Gal->Product->find('list');
		$albums = $this->Gal->Album->find('list');
		$this->set(compact('products', 'albums'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for gal', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Gal->delete($id)) {
			$this->Session->setFlash(__('Gal deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Gal was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>