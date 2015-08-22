<?php

Dotenv::load(__DIR__.'/../../');

return new \Phalcon\Config(array(
	'database' => array(
		'adapter'     => 'Mysql',   
        'host'        => '',
        'username'    => '',
        'password'    => '',
        'dbname'      => ''
	),
	'application' => array(
		'controllersDir' => __DIR__ . '/../../app/controllers/',
		'modelsDir'      => __DIR__ . '/../../app/models/',
		'viewsDir'       => __DIR__ . '/../../app/views/',
		'libraryDir'     => __DIR__ . '/../../app/library/',
		'baseUri'        => '/',
	)
));