<?php

require_once "DB.php";

class UsersModel extends DB {
    function getAll($search = "", $start = 0, $limit = 50) {
        $sql = 'select * from users';
        $data = array();
        
        if ($search !== "") {
            $data = ['%' . $search . '%'];
            $sql .= ' where name like ?';
        }
        
        $sql .= ' limit ' . $start . ',' . $limit;
        
        return $this->selectAll($sql, $data);
    }
    
    function countUsers($search) {
        
        $sql = "select id from users";
        $data = [];
        
        if ($search !== "") {
            $data = ['%' . $search . '%'];
            $sql .= ' where name like ?';
        }
        
        $this->selectAll($sql, $data);
        return $this->countAll();
    }
    
        function addUser($item) {
        $data = [$item['username'],
                    $item['email'],
                    $item['password'],
                    $item['name'],
                    $item['age'],
                    $item['gender']];
        $sql = 'insert into users (username, email, password, name, age, gender) values (?, ?, ?, ?, ?)';
        return $this->insertItem($sql, $data);
    }
    
    function userExists($user_name) {
        $search = 'select count("id") from "users" where "username" = $user_name';
        return ($search = 1) ? true : false;
    }
    
    function userId($user_name){
        $user_name = 'select "id" from "users" where "username" = "$user_name"';
        return $user_name;
    }
    
    function login($user_name,$pass_word){
        $user_id = userId($user_name);
        $user_check = 'select count("id") from "users" where "username" = "$user_name" and "password" = "$pass_word"';
        return ($user_check) ? $user_check : false;
    }
    
    function adminLogin ($user_name){
        $user_id = userId($user_name);
        $admn = 'select "type" from "users" where $user_id = "id"';
        if ($admin = 1){
            //adminLogin;
        } else {
            echo "You do not have admin rights"; 
        }
    }
    
    
}

?>

