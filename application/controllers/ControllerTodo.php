<?php

class ControllerTodo extends Controller {
    
    public $userId;
    
    function __construct($userId) {
        $this->model = new ModelTodo();
        $this->userId = $userId;
    }

    public function getAllTodos() {
        return $this->model->getTodosByUserId($this->userId);
    }
}