<?php
    class ModelAuth extends Model {
        protected function userExist($login, $password) {
            $stmt = $this->connect()->prepare('SELECT * FROM users WHERE login = ? and password = ?;');
            $stmt->execute(array($login, $password));
            $returned_row = $stmt->fetch(PDO::FETCH_ASSOC);
            $result = false;
            if($stmt->rowCount() > 0) {
                $_SESSION['user_id'] = $returned_row['id'];
                $result = true;
            }
            return $result;
        }

        protected function checkLogin($login) {
            $stmt = $this->connect()->prepare('SELECT `login` FROM users WHERE login = ?;');
            $stmt->execute(array($login));
            $result = true;
            if($stmt->rowCount() > 0) {
                $result = false;
            }
            return $result;
        }

        protected function setUser($login, $password) {
            $isUserSet = false;
            if($this->checkLogin($login) == true) {
                $stmt = $this->connect()->prepare('INSERT INTO users (`login`, `password`) VALUES (?, ?);');
                $stmt->execute(array($login, $password));
                $isUserSet = true;
            }
            return $isUserSet;
        }
    }