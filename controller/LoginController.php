<?php

require_once("model/StoreDB.php");
require_once("ViewHelper.php");

class LoginController {
    
    public static function index() {

        $display = filter_input(INPUT_GET, 'error', FILTER_SANITIZE_URL);
        $register = filter_input(INPUT_GET, 'registered', FILTER_SANITIZE_URL);
        
        $displayError = false;
        if ($display == "true") {
            $displayError = true;
        }

        $registered = false;
        if ($register == "true") {
            $registered = true;
        }
        
        echo ViewHelper::render("view/login.php", [
            "title" => "Store :: Login",
            "displayError" => $displayError,
            "registered" => $registered
        ]);
    }

    public static function log_user_in() {
        $rules = [
            "email" => [
                'filter' => FILTER_VALIDATE_EMAIL
            ],
            "password" => [
                
            ]
        ];

        $data = filter_input_array(INPUT_POST, $rules);
        $user_data = UserDB::get(["email" => $data['email']]);
        if (password_verify($data['password'], $user_data['password'])) {
            $_SESSION["userid"] = $user_data['id'];
            $_SESSION["username"] = $user_data['username'];
            $_SESSION["user"] = $user_data['email'];
            $_SESSION["name"] = $user_data['name'];
            $_SESSION["address"] = $user_data['address'];
            $_SESSION["postcode"] = $user_data['postcode'];
            echo ViewHelper::redirect(BASE_URL . "store?logged_in=true");
        } else {
            echo ViewHelper::redirect(BASE_URL . "login?error=true");
        }
    
    }
}