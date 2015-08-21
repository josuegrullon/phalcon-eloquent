<?php 
Dotenv::load(__DIR__.'/../../');

#Eloquent database conection
return [
		
		'driver'    => 'mysql',
	    'host'      => getenv('DBHOST'),
	    'database'  => getenv('DB'),
	    'username'  => getenv('DBUSER'),
	    'password'  => getenv('DBPASS'),
	    'charset'   => 'utf8',
	    'collation' => 'utf8_unicode_ci',
	    'prefix'    => ''
	
];




 ?>