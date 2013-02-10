<?php

class SchoolsController extends AppController {

    public $name = 'Schools';
    public $uses = array('Section', 'Product');

    function index($sectionId = null, $redirect = true) {
        $this->Section->recursive = -1;
        $this->set('sections', $this->Section->find('all'));
        $this->set('minPrices', $this->getMinPrices());
    }
    
    protected function getMinPrices(){
        $results = $this->Product->find('all', array(
            'fields' => array('Product.section_id', 'MIN(Product.price) AS min_price'),
            'conditions' => array('Product.section_id !=' => 0),
            'group' => 'Product.section_id',
            'recursive' => -1
        ));
        $minPricesList = array();
        foreach($results as $result){
            $minPricesList[$result['Product']['section_id']] = $result[0]['min_price'];
        }
        return $minPricesList;
    }


}

?>