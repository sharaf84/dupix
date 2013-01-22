<?php
/* Container Test cases generated on: 2013-01-22 22:01:30 : 1358887770*/
App::import('Model', 'Container');

class ContainerTestCase extends CakeTestCase {
	var $fixtures = array('app.container', 'app.order', 'app.member', 'app.album', 'app.gal', 'app.product', 'app.section', 'app.project', 'app.address', 'app.response');

	function startTest() {
		$this->Container =& ClassRegistry::init('Container');
	}

	function endTest() {
		unset($this->Container);
		ClassRegistry::flush();
	}

}
?>