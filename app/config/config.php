<?php

Dotenv::load(__DIR__.'/../../');

return new \Phalcon\Config(array(
	'database' => array(
		'driver'    => 'mysql',
	    'host'      => getenv('DBHOST'),
	    'database'  => getenv('DB'),
	    'username'  => getenv('DBUSER'),
	    'password'  => getenv('DBPASS'),
	    'charset'   => 'utf8',
	    'collation' => 'utf8_unicode_ci',
	    'prefix'    => ''
	),
	'application' => array(
		'controllersDir' => __DIR__ . '/../../app/controllers/',
		'modelsDir'      => __DIR__ . '/../../app/models/',
		'viewsDir'       => __DIR__ . '/../../app/views/',
		'libraryDir'     => __DIR__ . '/../../app/library/',
		'baseUri'        => '/',
	)
));
