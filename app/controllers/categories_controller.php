<?php

class CategoriesController extends AppController {

    public $name = 'Categories';
    public $uses = array('Section', 'Product');

    function index() {
        $this->Section->recursive = -1;
        $this->set('sections', $this->Section->find('all'));
        $this->set('minPrices', $this->getMinPrices());
    }

    function products($sectionId = null, $redirect = true) {
        $this->Product->recursive = 0;
        $products = $this->Product->find('all', array(
            'conditions' => array(
                'Product.section_id' => $sectionId,
                'Product.parent_id' => 0
            )
        ));
        //Redirect to product details if there is just one product.
        if ($redirect && count($products) == 1)
            $this->redirect(array('action' => 'product/' . $products[0]['Product']['id']));
        
        $this->set('products', $products);
        //$this->set('minPrices', $this->getMinPrices());
    }

    function product($id = null) {
        $this->Product->recursive = 1;
        $this->set('product', $this->Product->read(null, $id));
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