<?php
require_once '../auth_controller.php';
class SchoolController extends AuthController {

	var $name = 'School';
        public $uses = array('Member');
        public $components = array('Upload'); //use upload component.
        
	function index() {
		$this->Member->recursive = 1;
                
                $this->paginate = array(
                'conditions' => $this->arrKeyPrefix(array_merge(array('parent_id' => 0, 'type' => 1), (array)$this->Session->read('conditions')), 'Member'),
                'limit' => isset($this->params['named']['limit']) ? $this->params['named']['limit'] : $this->paginate['limit'],
                'page' => isset($this->params['named']['page']) ? $this->params['named']['page'] : $this->paginate['page'],
            );
                
		$this->set('members', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid member', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('member', $this->Member->read(null, $id));
	}

	function add($id = null) {
	    $memberList = array();	
            if (!empty($this->data)) {
                        
                        $this->Upload->masterImageWidth = 235;
                        $this->Upload->masterImageHeight = 235;
                        $this->Upload->resize = 1;
                        $this->data['Member']['logo']=$this->Upload->uploadImage($this->data['Member']['logo']);
            
                
			$this->data['Member']['confirm_code'] = String::uuid();
			$this->Member->create();
			if ($this->Member->save($this->data)) {
				$this->Session->setFlash(__('The school has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The school could not be saved. Please, try again.', true));
			}
		}
                $memberList = $this->Member->find('list', array('conditions' => 
                                                        array('Member.type =' => 1, 'Member.parent_id =' => 0)
                                                  ));
//                array_unshift($memberList, "Choose Parent");
                
                if($id){
                    $this->set('mainId', $id);
                }else{
                    $this->set('mainId', 0);
                    array_unshift($memberList, "Choose Parent");
                }
                
                $this->set('parentMems', $memberList);
	}

	function edit($id = null) {
                $memberList = array();
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid member', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
                        $this->Member->id = $id;
                        
                        if ($this->data['Member']['logo']['name']) {
                            $this->Upload->masterImageWidth = 235;
                            $this->Upload->masterImageHeight = 235;
                            $this->Upload->resize = 1;
                            $this->Upload->filesToDelete = array($this->Member->field('logo'));
                            $this->data['Member']['logo'] = $this->Upload->uploadImage($this->data['Member']['logo'] );
                        }else
                            unset($this->data['Member']['logo'] );
                        
			if ($this->Member->save($this->data)) {
                                $this->Upload->deleteFiles(); //delete old files
				$this->Session->setFlash(__('The school has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The school could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Member->read(null, $id);
		}
                $memberList = $this->Member->find('list', array('conditions' => 
                                                        array('Member.type =' => 1)
                                                  ));
                array_unshift($memberList, "Choose Parent");
                
                $parentMems = $this->Member->find('list', array('conditions' => 
                                                        array('Member.id !=' => $id, 'Member.type =' => 1, 'Member.parent_id =' => 0)
                                                  ));
                $this->set('parentMems', $parentMems);
                
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for member', true));
			$this->redirect(array('action'=>'index'));
		}
                $this->Member->id = $id;
                $this->Upload->filesToDelete = array(
                    $this->Member->field('logo')
                );
                
		if ($this->Member->delete($id)) {
                        $this->Upload->deleteFiles();
			$this->Session->setFlash(__('Member deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Member was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>