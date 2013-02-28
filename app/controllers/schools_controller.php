<?php

class SchoolsController extends AppController {

    public $name = 'Schools';
    public $uses = array('Member', 'Gal');

    function index($id = null) {
        $this->Member->recursive = 2;
       $members = $this->Member->find('all', array(
            'conditions' => array(
                'Member.id' => $id,
                'Member.type' => 1,
                'Member.parent_id' => 0
            )
        ));
//pr($members[0]['ChildMember']);
//pr($members[0]['Gal']);
       $this->set('members', $members);
    }
    
    function details($id = null) {
        $this->Member->recursive = 2;
       $members = $this->Member->find('all', array(
            'conditions' => array(
                'Member.id' => $id,
                'Member.type' => 1,
                'Member.parent_id' => 0
            )
        ));
       $this->set('members', $members);
    }
    
    function gallaries($albumId) {
       $gals = $this->Gal->find('all', array(
            'conditions' => array(
                'Gal.album_id' => $albumId,
            )
        ));
       $this->set('gals', $gals);
       $this->layout = 'ajax';
    }


}

?>