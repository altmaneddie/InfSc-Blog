<?php
    session_start();
    $routes["login/check-session"] = array(
                        "class"=>"Login",
                        "method"=>"checkSession");
    
    $routes["articles"] = array(
                        "class"=>"Articles",
                        "method"=>"getAll");
                        
    $routes["articles/item"] = array(
                    "class"=>"Articles",
                    "method"=>"getItem");
    
    $routes["articles/add"] = array(
                    "class"=>"Articles",
                    "method"=>"addItem");
    
    $routes["articles/edit"] = array(
                    "class"=>"Articles",
                    "method"=>"editItem");
                    
    $routes["articles/delete"] = array(
                    "class"=>"Articles",
                    "method"=>"deleteItem");
                        
   
    // echo "<pre>";
    // print_r($_SERVER);
    // exit;
    
    define("API_DIR", "blog/api/"); // current dir
    $redirectUrl = $_SERVER["REDIRECT_URL"];
    //exit;
    $page = str_replace(API_DIR, "", $redirectUrl);
    $page = rtrim($page, "/");
    
    
    if (array_key_exists($page, $routes)) {
        
        $method = $_SERVER['REQUEST_METHOD'];
        switch ($method) {
            case "POST":
                // POST - add data
                $content = file_get_contents("php://input");
                $data = json_decode($content, true);

                if ($data) {
                    $_POST = $data;
                }
                break; 
            case "PUT":
                // PUT - update data
                //var_dump($_PUT); // doesn't exist
                $content = file_get_contents("php://input");
                $PUT = json_decode($content, true);
                break;
            case "DELETE":
                // DELETE - delete data
                //var_dump($_DELETE); // doesn't exist
                $content = file_get_contents("php://input");
                $DELETE = json_decode($content, true);
                break;
        }

        
        require "controllers/" . $routes[$page]["class"] . ".php";
        $controller = new $routes[$page]["class"]; 
        $result = $controller->$routes[$page]["method"]();
    }
    else {
        $result = ["error"=>"Page not found"];
        //echo "CURRENT STATUS " . http_response_code();
        http_response_code(404);
    }
    
    header("Content-Type: application/json");
    echo json_encode($result);
    
   