<?php
class TextsController extends AppController {
	var $name = 'Texts';
	var $uses = array('Content');
	
	function display($id = null, $title = null){
		if(!$id)
			$this->redirect($this->referer($this->Session->read('Setting.url')));
		$content = $this->Content->read(null, $id);
		$this->set('title_for_layout', $content['Content']['title']);
		$this->set('content', $content);
	}
}
?>