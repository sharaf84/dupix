<?php
/* Container Fixture generated on: 2013-01-22 22:01:55 : 1358887675 */
class ContainerFixture extends CakeTestFixture {
	var $name = 'Container';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'unit_price' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
		'quantity' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
		'status' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'order_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
		'project_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
		'prduct_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'unit_price' => 1,
			'quantity' => 1,
			'status' => 1,
			'order_id' => 1,
			'project_id' => 1,
			'prduct_id' => 1
		),
	);
}
?>