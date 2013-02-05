<?php
class CategoriesController extends AppController {	
	
	public $name = 'Categories';
	public $uses = array('Section', 'Product');

	function index(){
		$this->Section->recursive = -1;
		$this->set('sections', $this->Section->find('all'));			
	}
	
	function products($sectionId = null, $redirect = true){		
		$this->Product->recursive = 1;
		$products = $this->Product->find('all', array(
			'conditions'=> array('Product.section_id'=>$sectionId)
		));
		$this->set('products', $products);
		if($redirect && count($products)  == 1)
			$this->redirect(array('action'=>'product/'.$products[0]['Product']['id']));			
	}
	
	function product($id = null){		
		$this->Product->recursive = 1;
		$product = $this->Product->read(null, $id);
		$this->products($product['Product']['section_id'], false);
		$this->set(array(
			'currentProduct' => $product
		));			
	}	

}
?>