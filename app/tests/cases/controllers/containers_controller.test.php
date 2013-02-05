<?php
/* Containers Test cases generated on: 2013-01-22 22:01:54 : 1358887794*/
App::import('Controller', 'Containers');

class TestContainersController extends ContainersController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class ContainersControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.container', 'app.order', 'app.member', 'app.album', 'app.gal', 'app.product', 'app.section', 'app.project', 'app.address', 'app.response');

	function startTest() {
		$this->Containers =& new TestContainersController();
		$this->Containers->constructClasses();
	}

	function endTest() {
		unset($this->Containers);
		ClassRegistry::flush();
	}

	function testIndex() {

	}

	function testView() {

	}

	function testAdd() {

	}

	function testEdit() {

	}

	function testDelete() {

	}

}
?>