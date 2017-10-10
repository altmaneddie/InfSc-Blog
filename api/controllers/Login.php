<?php

require "../../models/UsersModel.php";
$userModel = new UsersModel();


if (empty($_POST) === false) {
    $user_name = $_POST["user_name"];
    $user_password = $_POST["user_password"]
    
    
    if (empty($user_name) ===true || empty($user_password) === true) {
        
        $errors[] = 'Please enter a username and password';
    } else if ($userModel -> userExist($user_name) === false) {
        $errors[] = "Username does no exist";
        
    } else {
        $login = login($user_name,$user_password);
        if($login === false){
            $errors[] = 'That username, password combination is incorrect'
        } else{
            
        }
    }
    
    
    print_r($errors)   ;
}




?>











<!--class Login {-->
    
<!--    function loginUser() {-->
<!--        $_SESSION['isLogged'] = true;-->
<!--    }-->
    
<!--    function logout() {-->
<!--        unset($_SESSION['isLogged']);-->
<!--        session_destroy($_SESSION);-->
<!--    }-->
    
<!--    function checkSession() {-->
        //var_dump($_SESSION);
<!--        if ($_SESSION['isLogged'] ===  TRUE) {-->
<!--            return array('logged' => true);-->
<!--        } else  {-->
<!--            return array('logged' => false);-->
<!--        }-->
<!--    }-->
    
<!--}-->

<!--?>--