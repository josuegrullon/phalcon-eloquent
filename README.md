# Phalcon single-module skeleton with eloquent integration.

##Installation

Begin by installing this package through Composer. Edit your project's `composer.json` file to require `illuminate/database` and `vlucas/phpdotenv` for environment variables.

```json
 "require": { 
    	"illuminate/database": "*",
    	"vlucas/phpdotenv": "1.1.*@dev"
  }
```

**Run `composer update`**

```sh
$ composer update
$ composer dump-autoload

```

Once  `illuminate/database` and `vlucas/phpdotenv` are successfuly installed we have to set up some stuff.

**Edit your `loader.php`,** here is where you set your namespaces of the application. We need to set up namespaces for better sharing eloquent models with our phalcon application.

```php
<?php

$loader = new \Phalcon\Loader();

/**
 * Registering namespaces from the config directory specifications.
 */
$loader->registerNamespaces(
	array(
		'App\Controllers' => $config->application->controllersDir,
		'App\Models' => $config->application->modelsDir
	));

$loader->register();

```
**Edit your `services.php`,** we're going to register the dispatcher configuring the default namespace of our phalcon application.

```php
use Phalcon\Mvc\Dispatcher;

...

  // Registering a dispatcher
$di->set('dispatcher', function () {
    $dispatcher = new Dispatcher();
    $dispatcher->setDefaultNamespace("App\Controllers");
    return $dispatcher;
});

...
```
**Add `eloquent.php`**, this is the `eloquent` database configuration file. Here we initiallize `Dotenv::load(__DIR__.'/../../');` for accessing to our environment variables.

```php

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

```

**Create `.env` configuration file in `app/`**, here we're going to set our environment variables.

```sh
DBHOST=
DBUSER=
DBPASS=
DB=
DOMAIN=
```
**Now we need to create our model (example model)**. Every eloquent model extends from  `Illuminate\Database\Eloquent\Model`.

```php
<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Capsule;

class Ciudad extends Capsule
{

   protected $table = 'ciudad';

}
```

**Add the corresponding namespaces to the `Controllers` And `Models`**, here i used an example model called Ciudad.

Add the namespace to all controllers
```php
<?php namespace App\Controllers;

class ControllerBase extends \Phalcon\Mvc\Controller
{

}
```
Here we use the corresponding model's namespace.
```php
<?php namespace App\Controllers;

use App\Models\Ciudad;

class IndexController extends ControllerBase
{

    public function indexAction()
    {	
    	  //Example running eloquent
    		$ciudades = Ciudad::all();
    		$this->view->ciudades = $ciudades->toArray();
    }

}
```

**Finally we need to set up `Eloquent` as global in order to use it in all our phalcon application**. This is what you need to ad to your `index.php`.

First, use `use Illuminate\Database\Capsule\Manager`
```php

use Illuminate\Database\Capsule\Manager as Capsule;

...
```
We need to instantiate eloquent
```php
...

/**
	 * Read the configuration
	 */
	require_once __DIR__ . '/../vendor/autoload.php';

	$config = require __DIR__ . "/../app/config/config.php";

    //ELOQUENT CONF
	$capsule = new Capsule; 
    
	$capsule->addConnection(
		include_once __DIR__.'/../app/config/eloquent.php'
	);

	$capsule->bootEloquent();
	//END ELOQUENT CONF
'''
```
Now we can fly with phalcon and eloquent orm!
#THE END!


