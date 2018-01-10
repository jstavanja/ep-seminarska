<?php

require_once("model/UserDB.php");
require_once("model/SellerDB.php");
require_once("model/AdministratorDB.php");
require_once("ViewHelper.php");

class AdministratorController {
    
    public static function index() {
        
        if (isset($_SESSION['userid'])) {
            if (AdministratorDB::isAdmin(["id" => $_SESSION['userid']])) {
                $rules = [
                    "id" => [
                        'filter' => FILTER_VALIDATE_INT,
                        'options' => ['min_range' => 1]
                    ]
                ];
        
                $data = filter_input_array(INPUT_GET, $rules);
                
                echo ViewHelper::render("view/administrator.php", [
                    "title" => "Store :: Nadzorna plošča administratorja",
                    "sellers" => AdministratorDB::getSellers()
                ]);
            }
            else {
                throw new InvalidArgumentException("No bueno.");
            }
        } else {
            throw new InvalidArgumentException("No bueno.");
        }
    }

    public static function editSellerIndex($id) {

        if (isset($_SESSION['userid'])) {
            if (AdministratorDB::isAdmin(["id" => $_SESSION['userid']])) {
                echo ViewHelper::render("view/administrator/edit-seller.php", [
                    "title" => "Store :: Urejanje prodajalca " . $id,
                    "seller" => UserDB::getById(["id" => $id])
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

    public static function addSeller() {
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
        $data['role'] = "seller";
        $data['status'] = 1;

        if (self::checkValues($data)) {
            $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
            unset($data['password-repeat']);
            $id = UserDB::insert($data);
            $seller_data = ["user_id" => $id, "activated" => 1, "certifikat" => "NULL"];
            SellerDB::insert($seller_data);
            echo ViewHelper::redirect(BASE_URL . "administrator?registered=true");
        } else {
            echo ViewHelper::redirect(BASE_URL . "administrator?missing_parameters=true");
        }
    }

    public static function editSeller() {
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
            "id" => [
                'filter' => FILTER_SANITIZE_INT
            ]
        ];

        $data = filter_input_array(INPUT_POST, $rules);

        if (self::checkValues($data)) {
            unset($data["password-repeat"]);
            $id = UserDB::update($data);
            echo ViewHelper::redirect(BASE_URL . "administrator");
        } else {
            echo ViewHelper::redirect(BASE_URL . "administrator?item_missing_parameters=true");
        }
    }

    public static function activateSeller() {
        $rules = [
            "id" => [
                
            ]
        ];

        $data = filter_input_array(INPUT_POST, $rules);

        if (self::checkValues($data)) {
            $data["status"] = 1;
            UserDB::updateStatus($data);
            echo ViewHelper::redirect(BASE_URL . "administrator");
        } else {
            echo ViewHelper::redirect(BASE_URL . "administrator?item_missing_parameters=true");
        }
    }

    public static function deactivateSeller() {
        $rules = [
            "id" => [
                
            ]
        ];

        $data = filter_input_array(INPUT_POST, $rules);

        if (self::checkValues($data)) {
            $data["status"] = 0;
            UserDB::updateStatus($data);
            echo ViewHelper::redirect(BASE_URL . "administrator");
        } else {
            echo ViewHelper::redirect(BASE_URL . "administrator?item_missing_parameters=true");
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