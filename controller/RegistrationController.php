<?php

require_once("model/UserDB.php");
require_once("ViewHelper.php");

class RegistrationController {
    
    public static function index() {

        $missing = filter_input(INPUT_GET, 'missing_parameters', FILTER_SANITIZE_URL);

        $missing_parameters = false;
        if ($missing == "true") {
            $missing_parameters = true;
        }
        
        echo ViewHelper::render("view/registration.php", [
            "title" => "Store :: Register",
            "missing_parameters" => $missing_parameters
        ]);
    }

    public static function registerUser() {
        $rules = [
            "username" => [
                'filter' => FILTER_SANITIZE_STRING
            ],
            "email" => [
                'filter' => FILTER_VALIDATE_EMAIL
            ],
            "name" => [
                'filter' => FILTER_SANITIZE_STRING
            ],
            "password" => [

            ],
            "password-repeat" => [

            ],
            "address" => [
                'filter' => FILTER_SANITIZE_STRING
            ],
            "postcode" => [
                'filter' => FILTER_SANITIZE_STRING
            ],
        ];


        $data = filter_input_array(INPUT_POST, $rules);


        if (self::checkValues($data)) {
            $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
            unset($data['password-repeat']);
            $id = UserDB::insert($data);
            echo ViewHelper::redirect(BASE_URL . "login?registered=true");
        } else {
            echo ViewHelper::redirect(BASE_URL . "registration?missing_parameters=true");
        }
    
    }

    private static function checkValues($input) {
        if (empty($input)) {
            return FALSE;
        }

        if ($input['password'] != $input['password-repeat']) {
            return FALSE;
        }

        $result = TRUE;
        foreach ($input as $value) {
            var_dump($value);
            $result = $result && $value != false;
        }

        return $result;
    }
}