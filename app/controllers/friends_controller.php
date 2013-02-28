<?php

require_once '../auth_controller.php';

class FriendsController extends AuthController {

    public $name = 'Friends';
    

      function index($parentId = null) {
          
            $this->paginate = array(
            'conditions' => $this->arrKeyPrefix(array_merge(array('parent_id' => 0), (array)$this->Session->read('conditions')), 'Friend'),
            'limit' => isset($this->params['named']['limit']) ? $this->params['named']['limit'] : $this->paginate['limit'],
            'page' => isset($this->params['named']['page']) ? $this->params['named']['page'] : $this->paginate['page'],
        );

        //set products to view
        $this->Friend->recursive = 1;
        $this->set('friends', $this->paginate());
        //get sections and set $this->data to use in filtering form.
        if ($this->Session->check('conditions') && is_array($this->Session->read('conditions')))
            $this->data['Friend'] = $this->Session->read('conditions');
    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid item', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('friend', $this->Friend->read(null, $id));
    }

    function add($parentId = null) {
       
        if (!empty($this->data)) {
            $i = 0;
            $this->Friend->create();
            if ($this->Friend->saveAll($this->data, array('validate' => 'first'))) {
                $this->Session->setFlash(__('The friend has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The friend could not be saved. Please, try again.', true));
            }
        }
        $parents = $this->Friend->find('list', array('conditions'=>array('Friend.parent_id' => 0)));
        
        if($parentId)
            $this->data['Friend']['parent_id'] = $parentId;
        $members = $this->Friend->Member->find('list', array('conditions'=>array('Member.parent_id' => 0, 'Member.type' => 1)));
        $this->set(compact('parents', 'members'));
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            //upload images and then add it to Gal.
            $i = 0;
           
            if ($this->Friend->saveAll($this->data, array('validate' => 'first'))) {
                $this->Session->setFlash(__('The item has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The item could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Friend->read(null, $id);
        }
        $parents = $this->Friend->find('list', array('conditions'=>array('Friend.parent_id' => 0)));
        $members = $this->Friend->Member->find('list', array('conditions'=>array('Member.parent_id' => 0, 'Member.type' => 1)));
        $this->set(compact('parents', 'members'));
    }

    function delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for item', true));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Friend->delete($id)) {
            $this->Session->setFlash(__('item deleted', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Item was not deleted', true));
        $this->redirect(array('action' => 'index'));
    }
    function test() {
        var_dump($this->Friend);die();
    }

}

?>