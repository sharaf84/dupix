<?php
require_once '../auth_controller.php';
class FriendsController extends AuthController {

	var $name = 'Friends';

	function index() {
		$this->Friend->recursive = 0;
		$this->set('friends', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid friend', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('friend', $this->Friend->read(null, $id));
	}

	function add() {
                $friendList = array();
		if (!empty($this->data)) {
			$this->Friend->create();
			if ($this->Friend->save($this->data)) {
				$this->Session->setFlash(__('The friend has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The friend could not be saved. Please, try again.', true));
			}
		}
                
                $friendList = $this->Friend->find('list');
                array_unshift($friendList, "Choose Parent");
                
                Configure::write('parentFrns',$friendList); 

	}

	function edit($id = null) {
                $friendList = array();
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid friend', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Friend->save($this->data)) {
				$this->Session->setFlash(__('The friend has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The friend could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Friend->read(null, $id);
		}
                 $friendList = $this->Friend->find('list');
                 array_unshift($friendList, "Choose Parent");
                
                Configure::write('parentFrns', $this->Friend->find('list', array(
                                                                'conditions' => array('Friend.id !=' => $id)
                                                            )));
	}
        
        function addclass($id = null) {
		if (!empty($this->data)) {
			$this->Friend->create();
			if ($this->Friend->save($this->data)) {
				$this->Session->setFlash(__('The friend has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The friend could not be saved. Please, try again.', true));
			}
		}
                Configure::write('parentFrns',$this->Friend->find('list')); 
                Configure::write('parent',$id); 

	}
        function addfriend($id = null) {
                
		$friendList = array();
                
//                $db =& ConnectionManager::getDataSource($this->useDbConfig);
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid friend', true));
			$this->redirect(array('action' => 'index'));
		}
                
		if (!empty($this->data)) {//var_dump($this->data['Friend']['id']);die();
                        $deleteAll = "delete from friends_members where member_id=".$this->data['Friend']['id'];
                        $this->Friend->query($deleteAll);
                        if(isset ($this->data["Friend"]["friends"]) && $this->data["Friend"]["friends"]){
                            for($i = 0 ; $i < sizeof($this->data["Friend"]["friends"]) ; $i++ ){
                                $insertQuery = "INSERT INTO friends_members (member_id, friend_id) VALUES (".$this->data['Friend']['id'].", ".$this->data['Friend']['friends'][$i].")";
                                $this->Friend->query($insertQuery);
                            }
                        
                        }
			if ($this->Friend->save($this->data)) {
				$this->Session->setFlash(__('The friend has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The friend could not be saved. Please, try again.', true));
			}
		}
                
		if (empty($this->data)) {
                        $selectCurrentFriends = "select friend_id from friends_members where member_id=".$id;
                        $rows = $this->Friend->query($selectCurrentFriends);
                        $ids = array();
                        for($i = 0 ; $i < sizeof($rows) ; $i++){
                            array_unshift($ids, $rows[$i]["friends_members"] ["friend_id"]);
                        }
                        //var_dump($ids);
                        
//                        $members = new Member;
                        
			$this->data = $this->Friend->read(null, $id);
		}
                
                App::import('model', 'Member');
                $members = new Member;
                Configure::write('currentFriends', $members->find('list', array('conditions'=>array('id'=>$ids))));
                Configure::write('allMembers',$members->find('list')); 

	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for friend', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Friend->delete($id)) {
			$this->Session->setFlash(__('Friend deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Friend was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>