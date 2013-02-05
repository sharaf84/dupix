<?php
/* Addresses Test cases generated on: 2013-01-22 21:01:55 : 1358881975*/
App::import('Controller', 'Addresses');

class TestAddressesController extends AddressesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class AddressesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.address', 'app.member', 'app.album', 'app.gal', 'app.product', 'app.section', 'app.project', 'app.order');

	function startTest() {
		$this->Addresses =& new TestAddressesController();
		$this->Addresses->constructClasses();
	}

	function endTest() {
		unset($this->Addresses);
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