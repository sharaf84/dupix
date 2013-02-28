<?php
require_once '../auth_controller.php';
class GalsController extends AuthController {

	var $name = 'Gals';
        public $components = array('Upload'); //use upload component.

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
            $albumId = 0;
            $urlSegms = array();
            $urlSegms = explode('/', $_REQUEST['url']);
            if(sizeof($urlSegms) == 3){
                $albumId = $urlSegms[sizeof($urlSegms)-1];
            }
		if (!empty($this->data)) {
                        $this->Upload->masterImageWidth = 732;
                        $this->Upload->masterImageHeight = 345;
                        $this->Upload->resize = 1;
                        $this->data['Gal']['image']=$this->Upload->uploadImage($this->data['Gal']['image']);
            
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
		$members = $this->Gal->Member->find('list');
		$this->set(compact('products', 'albums', 'members'));
		$this->set('albumId', $albumId);
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid gal', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
                        $this->Gal->id = $id;
                        
                        if ($this->data['Gal']['image']['name']) {
                            $this->Upload->masterImageWidth = 732;
                            $this->Upload->masterImageHeight = 345;
                            
                            
                            $this->Upload->resize = 1;
                            $this->Upload->filesToDelete = array($this->Gal->field('image'));
                            $this->data['Gal']['image'] = $this->Upload->uploadImage($this->data['Gal']['image'] );
                        }else
                            unset($this->data['Gal']['image'] );
                        
			if ($this->Gal->save($this->data)) {
                                $this->Upload->deleteFiles(); //delete old files
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
		$members = $this->Gal->Member->find('list');
		$this->set(compact('products', 'albums', 'members'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for gal', true));
			$this->redirect(array('action'=>'index'));
		}
                $this->Gal->id = $id;
                $this->Upload->filesToDelete = array(
                    $this->Gal->field('image')
                );
                
		if ($this->Gal->delete($id)) {
                        $this->Upload->deleteFiles();
			$this->Session->setFlash(__('Gal deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Gal was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>