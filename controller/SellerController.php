<?php

require_once("ViewHelper.php");
require_once("model/SellerDB.php");

class SellerController {
    
    public static function index() {

        if (isset($_SESSION['userid'])) {
            if (SellerDB::isSeller(["id" => $_SESSION['userid']])) {
                $rules = [
                    "id" => [
                        'filter' => FILTER_VALIDATE_INT,
                        'options' => ['min_range' => 1]
                    ]
                ];
        
                $data = filter_input_array(INPUT_GET, $rules);
                
                echo ViewHelper::render("view/seller.php", [
                    "title" => "Store :: Nadzorna plošča prodajalca",
                    "customers" => SellerDB::getCustomers()
                ]);
            }
            else {
                throw new InvalidArgumentException("No bueno.");
            }
        }
        else {
            throw new InvalidArgumentException("No bueno.");
        }
    }

    public static function addCustomer() {
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
        $data['role'] = "user";
        $data['status'] = 1;

        if (self::checkValues($data)) {
            $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
            unset($data['password-repeat']);
            $id = UserDB::insert($data);
            echo ViewHelper::redirect(BASE_URL . "seller?registered=true");
        } else {
            echo ViewHelper::redirect(BASE_URL . "seller?missing_parameters=true");
        }
    }

    private static function checkValues($input) {
        if (empty($input)) {
            return FALSE;
        }

        // TODO: Check if passwords are the same

        $result = TRUE;
        foreach ($input as $value) {
            var_dump($value);
            $result = $result && $value != false;
        }

        return $result;
    }
}

    
