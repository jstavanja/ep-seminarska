<?php

require_once("model/UserDB.php");
require_once("model/SellerDB.php");
require_once("model/AdministratorDB.php");
require_once("ViewHelper.php");

class AdministratorController {
    
    public static function index() {

        $authorized_users = ["administrator", "master"];
        $client_cert = filter_input(INPUT_SERVER, "SSL_CLIENT_S_DN_CN");

        if ($client_cert == null) {
            throw new InvalidArgumentException("Not authorized with SSL certificate");
        }

        if (!(in_array($client_cert, $authorized_users))) {
            throw new InvalidArgumentException("You are not authorized to see this content.");
        }
        
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

        $authorized_users = ["administrator", "master"];
        $client_cert = filter_input(INPUT_SERVER, "SSL_CLIENT_S_DN_CN");

        if ($client_cert == null) {
            throw new InvalidArgumentException("Not authorized with SSL certificate");
        }

        if (!(in_array($client_cert, $authorized_users))) {
            throw new InvalidArgumentException("You are not authorized to see this content.");
        }

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
            "surname" => [
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
            "phone" => [
                'filter' => FILTER_SANITIZE_NUMBER_INT
            ]
        ];

        $data = filter_input_array(INPUT_POST, $rules);
        $data['role'] = "seller";
        $data['status'] = 1;

        if (self::checkValues($data)) {
            $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
            unset($data['password-repeat']);
            $id = UserDB::insert($data);
            $seller_data = ["user_id" => $id, "activated" => 1, "certifikat" => rand(1, 1000)];
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
            "surname" => [
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
            "phone" => [
                'filter' => FILTER_SANITIZE_NUMBER_INT
            ],
            "id" => [
                'filter' => FILTER_SANITIZE_INT
            ]
        ];

        $data = filter_input_array(INPUT_POST, $rules);

        if (self::checkValues($data)) {
            $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
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