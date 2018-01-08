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
}