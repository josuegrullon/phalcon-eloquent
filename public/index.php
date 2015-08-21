<?php
use Illuminate\Database\Capsule\Manager as Capsule;

error_reporting(E_ALL);

try {

	/**
	 * Read the configuration
	 */
	require_once __DIR__ . '/../vendor/autoload.php';

	$config = require __DIR__ . "/../app/config/config.php";

	//ELOQUENT CONF
	$capsule = new Capsule; 

	$capsule->addConnection(
		include_once __DIR__.'/../app/config/database.php'
	);

	$capsule->bootEloquent();
	//END ELOQUENT CONF

	/**
	 * Include loader
	 */
	require __DIR__ . '/../app/config/loader.php';

	/**
	 * Include services
	 */
	require __DIR__ . '/../app/config/services.php';

	/**
	 * Handle the request
	 */
	$application = new \Phalcon\Mvc\Application();
	$application->setDI($di);
	echo $application->handle()->getContent();

} catch (Phalcon\Exception $e) {
	echo $e->getMessage();
} catch (PDOException $e){
	echo $e->getMessage();
}