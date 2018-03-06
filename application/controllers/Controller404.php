<?php

namespace Controllers;

use Core\Controller;

class Controller404 extends Controller
{
	
	function actionIndex()
	{
		$this->view->generate('404View.php', 'templateView.php');
	}

}
