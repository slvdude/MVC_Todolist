<?php

class Model
{
	protected function connect() {
		try {
			$host = '127.0.0.1:3306';
			$user = 'root';
			$pass = 'root';
			$name = 'todolist';
			$db = new PDO("mysql:host=$host;dbname=$name", $user, $pass);
			return $db;
		}
		catch (PDOException $e){
			echo "Connection failed: " . $e->getMessage();
			die('Connection failed');
		}
	}
}