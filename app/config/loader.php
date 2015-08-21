<?php

$loader = new \Phalcon\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerNamespaces(
	array(
		'App\Controllers' => $config->application->controllersDir,
		'App\Models' => $config->application->modelsDir
	));

$loader->register();
