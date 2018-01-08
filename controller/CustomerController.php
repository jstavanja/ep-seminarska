<?php

require_once("model/StoreDB.php");
require_once("ViewHelper.php");

class CustomerController {
    
    public static function index() {
        $rules = [
            "id" => [
                'filter' => FILTER_VALIDATE_INT,
                'options' => ['min_range' => 1]
            ]
        ];

        $data = filter_input_array(INPUT_GET, $rules);
        
        echo ViewHelper::render("view/customer.php", [
            "title" => "Store :: Nadzorna plošča uporabnika"
        ]);
    }

    public static function editOwnData(){
        echo ViewHelper::render("view/customer.php", [
            "title" => "Store :: Nadzorna plošča uporabnika"
        ]);
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