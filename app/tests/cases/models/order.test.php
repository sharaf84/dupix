<?php
/* Order Test cases generated on: 2013-01-22 21:01:34 : 1358882194*/
App::import('Model', 'Order');

class OrderTestCase extends CakeTestCase {
	var $fixtures = array('app.order', 'app.member', 'app.album', 'app.gal', 'app.product', 'app.section', 'app.project', 'app.address', 'app.container', 'app.response');

	function startTest() {
		$this->Order =& ClassRegistry::init('Order');
	}

	function endTest() {
		unset($this->Order);
		ClassRegistry::flush();
	}

}
?>