<?php
/* Order Fixture generated on: 2013-01-22 21:01:34 : 1358882194 */
class OrderFixture extends CakeTestFixture {
	var $name = 'Order';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'amount' => array('type' => 'integer', 'null' => false, 'default' => '0'),
		'payment_method' => array('type' => 'integer', 'null' => false, 'default' => '1', 'length' => 1),
		'shipping_method' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'pickup_location' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'suggested_pickup' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'notes' => array('type' => 'text', 'null' => false, 'default' => NULL),
		'status' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'closed' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'updated' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'member_id' => array('type' => 'integer', 'null' => false, 'default' => '0'),
		'address_id' => array('type' => 'integer', 'null' => false, 'default' => '0'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'amount' => 1,
			'payment_method' => 1,
			'shipping_method' => 1,
			'pickup_location' => 'Lorem ipsum dolor sit amet',
			'suggested_pickup' => '2013-01-22 21:16:34',
			'notes' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'status' => 1,
			'closed' => '2013-01-22 21:16:34',
			'created' => '2013-01-22 21:16:34',
			'updated' => '2013-01-22 21:16:34',
			'member_id' => 1,
			'address_id' => 1
		),
	);
}
?>