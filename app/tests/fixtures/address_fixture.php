<?php
/* Address Fixture generated on: 2013-01-22 21:01:29 : 1358881829 */
class AddressFixture extends CakeTestFixture {
	var $name = 'Address';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'cuntry' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'city' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'area' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'address' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'phone' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'member_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'cuntry' => 'Lorem ipsum dolor sit amet',
			'city' => 'Lorem ipsum dolor sit amet',
			'area' => 'Lorem ipsum dolor sit amet',
			'address' => 'Lorem ipsum dolor sit amet',
			'phone' => 'Lorem ipsum dolor sit amet',
			'member_id' => 1
		),
	);
}
?>