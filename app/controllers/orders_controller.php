<?php
require_once '../auth_controller.php';
class OrdersController extends AuthController {

	var $name = 'Orders';
	
	function export($keyword=null) {
		$file ='img/projects/'.$keyword.'.zip';
		 if(!file)
		 {
			 // File doesn't exist, output error
			 die('file not found');
		 }
		 else
		 {	
			$this->layout = 'empty.ctp';
			header("Cache-Control: public");
			header("Content-Description: File Transfer");
			header("Content-Disposition: attachment; filename=$file");
			header("Content-Type: application/zip");
			header("Content-Transfer-Encoding: binary");
			 // Read the file from disk
			 readfile($file);
		 }
		//$this->redirect($this->Session->read('Setting.url'));	
		$this->redirect(array('action' => 'detail',$keyword));


	}
	
	function detail($keyword=null) {
		$this->Order->updateAll(
		array('Order.checked' => 1),
		array('Order.keyword' => $keyword));
		$this->set('keyword', $keyword);
		$this->Order->recursive = 0;
		$this->set('orders', $this->paginate('Order', array('Order.keyword' => $keyword)));
	}
	
	function index() {
		 $this->paginate = array(
			'Order' => array('limit' => 20,
			'order' => array('checked' => 'asc'),
			'group' => array('keyword'))
			);
		$this->Order->recursive = 0;
		
		//$this->set('orders', $this->paginate());
		$this->set('orders', $this->paginate());

	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid order', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('order', $this->Order->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Order->create();
			if ($this->Order->save($this->data)) {
				$this->Session->setFlash(__('The order has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The order could not be saved. Please, try again.', true));
			}
		}
		$projects = $this->Order->Project->find('list');
		$this->set(compact('projects'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid order', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Order->save($this->data)) {
				$this->Session->setFlash(__('The order has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The order could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Order->read(null, $id);
		}
		$projects = $this->Order->Project->find('list');
		$this->set(compact('projects'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for order', true));
			$this->redirect(array('action'=>'index'));
		}
		 $conditions = array ( "Order.keyword" => $id);
		if ($this->Order->deleteAll($conditions)) {
			$this->Session->setFlash(__('Order deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Order was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>