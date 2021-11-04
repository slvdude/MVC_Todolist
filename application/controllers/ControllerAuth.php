<?php

class ControllerAuth extends Controller
{
    public $login;
    public $password;
    
    function __construct() {
		$this->model = new ModelAuth();
		$this->view = new View();
	}

	function action_auth() {	
        if(isset($_POST['login']) && isset($_POST['password'])) {
            $login = $_POST['login'];
            $password = $_POST['password'];

            if($this->model->userExist($login, $password) == true) {
                $this->view->generate('todo_view.php', 'template_view.php');
            }
            elseif($this->model->setUser($login, $password) == true) {
                $this->view->generate('todo_view.php', 'template_view.php');
            }
        }
	}
}