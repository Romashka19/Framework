<?php


namespace System;

use System\Database;



class Auth
{
//поытка войти в акк
    public function attempt($login, $password){
        $db = Database::getInstance();
        if($_SESSION['session_username'] == null) {
            if (!empty($login) && !empty($password)) {
                $sql = $db->select("SELECT * FROM `users` WHERE login='" . $login . "'");
                $row = current($sql);
                if (password_verify($password, $row['password']) && $sql != 0) {
                    return true;
                } else {
                    return false;
                }

            }
        }
    }
// проверка на сущчтв пользователя для регистации
    public function userCheck($login, $password){
        $db = Database::getInstance();
        if (!empty($login) && !empty($password)) {
            $sql = $db->select("SELECT COUNT(*) as count FROM `users` WHERE login='" . $login . "'");
            $num = current($sql);
            $num = current($num);
            if ($num == 0) {
                return true;
            } else {
                return false;
            }
        }
    }

}