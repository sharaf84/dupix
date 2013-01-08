<?php
class HomeController extends AppController {	
	
	public $name = 'Home';
	public $uses = array('Gal', 'Video');

	function index(){
		//Set home gallery.
		$this->Gal->recursive = 0;
		$this->set('gals', $this->Gal->find('all', array(
			'conditions' => array('Gal.position' => 2, 'Product.home' => 1),
			'order' => 'Product.home_position ASC',
			'limit' => 4
		)));
		//Set hot product.
		$this->set('hot', $this->Gal->find('first', array('conditions' => array('Gal.position' => 2, 'Product.hot' => 1))));
		//Set home video.
		$this->Video->recursive = -1;
		$this->set('video', $this->Video->find('first', array('conditions' => array('Video.home' => 1))));				
	}	

}
?>