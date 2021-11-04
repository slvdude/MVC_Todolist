<?php

class ControllerMain extends Controller
{
	function action_index()
	{	
		$this->view->generate('auth_view.php', 'template_view.php');
	}
}