<?php defined('SYSPATH') OR die('No direct access allowed.');

return array
(
	'default' => array
	(
		'type'       => 'MySQL',
		'connection' => array(
			'hostname'   => 'localhost',
			'database'   => 'hreed_fittrackr',
			'username'   => 'hreed_fittrackr',
			'password'   => 'Horsekickbattery12',
			'persistent' => FALSE,
		),
		'table_prefix' => '',
		'charset'      => 'utf8',
		'caching'      => FALSE,
	),
		
	'remote' => array
	(
			'type'       => 'MySQL',
			'connection' => array(
					'hostname'   => '12mod12.com',
					'database'   => 'hreed_fittrackr',
					'username'   => 'hreed_rfittrackr',
					'password'   => 'Horsekickbattery',
					'persistent' => FALSE,
			),
			'table_prefix' => '',
			'charset'      => 'utf8',
			'caching'      => FALSE,
	),
);
