<?php

class SchoolsController extends AppController {

    public $name = 'Schools';
    public $uses = array('Member', 'Gal', 'Album', 'Friend');

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
       $this->Friend->recursive = -1;        
//       $this->Album->recursive = 1;
//       $this->Friend->recursive = 1;
       
       $members = $this->Member->find('all', array(
            'conditions' => array(
                'Member.id' => $id,
                'Member.type' => 1,
                'Member.parent_id' => 0
            )
        ));
       
       $grades = $this->Member->Friend->find('all', array(
            'conditions' => array(
                'Friend.parent_id' => 0,
                'Friend.member_id' => $id
                ),
            'order' => array('Friend.id ASC'),
           
        ));
       
       $firstGrade = $this->Member->Friend->find('all', array(
            'conditions' => array(
                'Friend.parent_id' => 0,
                'Friend.member_id' => $id
                ),
            'order' => array('Friend.id ASC'),
            'limit' => 1,
           
        ));
       
       $firstGrade = $this->Member->Friend->find('all', array(
            'conditions' => array(
                'Friend.parent_id' => 0,
                'Friend.member_id' => $id
                ),
            'order' => array('Friend.id ASC'),
            'limit' => 1,
           
        ));
       
//       Albums for the first grade:
       $conditions = array('OR' => array(
                                array('Friend.id' => $firstGrade[0]['Friend']['id']),
                                array('Friend.parent_id' => $firstGrade[0]['Friend']['id'])
                            ));
       
       
       $albumsOfFirst = $this->Friend->Album->find('all', array(
            'conditions' => $conditions
        ));
       
       $this->set(compact('albumsOfFirst', 'members', 'grades'));
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
    
    function albums($gradeId) {
       $this->Friend->recursive = 1;
       $this->Album->recursive = 1;
       
       $conditions = array('OR' => array(
                                array('Friend.id' => $gradeId),
                                array('Friend.parent_id' => $gradeId)
                            ));
       
       
       $albums = $this->Friend->Album->find('all', array(
            'conditions' => $conditions
        ));
       
       $this->set('albums', $albums);
       $this->layout = 'ajax';
    }


}

?>