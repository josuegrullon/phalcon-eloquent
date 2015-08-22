<?php namespace App\Controllers;

use App\Models\Ciudad;

class IndexController extends ControllerBase
{

    public function indexAction()
    {	
    	//Example
		$ciudades = Ciudad::all();
		$this->view->ciudades = $ciudades->toArray();
    }

}