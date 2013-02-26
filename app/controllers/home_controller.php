<?php
class HomeController extends AppController {	
	
	public $name = 'Home';
	public $uses = null;
        
        function index (){
            
        }
        
	function blank(){
            $this->layout = 'ajax';
	}

}
?>