<?php
/* Address Test cases generated on: 2013-01-22 21:01:30 : 1358881830*/
App::import('Model', 'Address');

class AddressTestCase extends CakeTestCase {
	var $fixtures = array('app.address', 'app.member', 'app.album', 'app.gal', 'app.product', 'app.section', 'app.project', 'app.order');

	function startTest() {
		$this->Address =& ClassRegistry::init('Address');
	}

	function endTest() {
		unset($this->Address);
		ClassRegistry::flush();
	}

}
?>