<?php

class ControllerAuth extends Controller {
    public $login;
    public $password;
    
    function __construct() {
		$this->model = new ModelAuth();
		$this->view = new View();
	}

	public function action_auth() {	
        $login = $_POST['login'];
        $password = $_POST['password'];
        if(!empty($_POST['login']) && !empty($_POST['password'])) {
            if($this->model->userExist($login, $password) == true) {
                $this->view->generate('todo_view.php', 'template_view.php');
            }
            elseif($this->model->setUser($login, $password) == true) {
                $this->view->generate('todo_view.php', 'template_view.php');
            }
        }
        else {
            echo '<p style="color: red;">Input cannot be empty</p>';
        }
	}

    private function inputNotEmpty() {
        $isEmpty = true;
        if(empty($login) || empty($password)) {
            $isEmpty = false;
        }
        return $isEmpty;
    }
}