<?php

require_once("model/StoreDB.php");
require_once("ViewHelper.php");

class LoginController {
    
    public static function index() {

        $data = filter_input(INPUT_GET, 'error', FILTER_SANITIZE_URL);
        
        $displayError = false;
        if ($data == "true") {
            $displayError = true;
        }
        
        echo ViewHelper::render("view/login.php", [
            "title" => "Store :: Login",
            "displayError" => $displayError
        ]);
    }
}