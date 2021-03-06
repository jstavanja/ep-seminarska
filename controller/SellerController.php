<?php

require_once("ViewHelper.php");
require_once("model/SellerDB.php");
require_once("model/ItemDB.php");
require_once("model/OrderDB.php");

class SellerController {
    
    public static function index() {

        $authorized_users = ["seller", "master"];
        $client_cert = filter_input(INPUT_SERVER, "SSL_CLIENT_S_DN_CN");

        if ($client_cert == null) {
            throw new InvalidArgumentException("Not authorized with SSL certificate");
        }

        if (!(in_array($client_cert, $authorized_users))) {
            throw new InvalidArgumentException("You are not authorized to see this content.");
        }

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
                    "customers" => SellerDB::getCustomers(),
                    "ordernum" => OrderDB::getNumUnprocessed(),
                    "items" => ItemDB::getAll()
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

    public static function editItemIndex($id) {

        $authorized_users = ["seller", "master"];
        $client_cert = filter_input(INPUT_SERVER, "SSL_CLIENT_S_DN_CN");

        if ($client_cert == null) {
            throw new InvalidArgumentException("Not authorized with SSL certificate");
        }

        if (!(in_array($client_cert, $authorized_users))) {
            throw new InvalidArgumentException("You are not authorized to see this content.");
        }

        if (isset($_SESSION['userid'])) {
            if (SellerDB::isSeller(["id" => $_SESSION['userid']])) {
                echo ViewHelper::render("view/seller/edit-item.php", [
                    "title" => "Store :: Urejanje artikla " . $id,
                    "item" => ItemDB::get(["id" => $id])
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

    public static function editCustomerIndex($id) {

        $authorized_users = ["seller", "master"];
        $client_cert = filter_input(INPUT_SERVER, "SSL_CLIENT_S_DN_CN");

        if ($client_cert == null) {
            throw new InvalidArgumentException("Not authorized with SSL certificate");
        }

        if (!(in_array($client_cert, $authorized_users))) {
            throw new InvalidArgumentException("You are not authorized to see this content.");
        }

        if (isset($_SESSION['userid'])) {
            if (SellerDB::isSeller(["id" => $_SESSION['userid']])) {
                echo ViewHelper::render("view/seller/edit-customer.php", [
                    "title" => "Store :: Urejanje stranke " . $id,
                    "customer" => UserDB::getById(["id" => $id])
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

    public static function editOrderIndex($id) {

        $authorized_users = ["seller", "master"];
        $client_cert = filter_input(INPUT_SERVER, "SSL_CLIENT_S_DN_CN");

        if ($client_cert == null) {
            throw new InvalidArgumentException("Not authorized with SSL certificate");
        }

        if (!(in_array($client_cert, $authorized_users))) {
            throw new InvalidArgumentException("You are not authorized to see this content.");
        }
        
        if (isset($_SESSION['userid'])) {
            if (SellerDB::isSeller(["id" => $_SESSION['userid']])) {
                $order = OrderDB::get(["order_id" => $id]);
                echo ViewHelper::render("view/seller/edit-order.php", [
                    "title" => "Store :: Urejanje naročila " . $id,
                    "order" => $order,
                    "customer" => UserDB::getById(["id" => $order["user_id"]]),
                    "items" => UserDB::getItemsFromOrder(["order_id" => $id])
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

    public static function addItem() {
        $rules = [
            "name" => [
                'filter' => FILTER_SANITIZE_STRING
            ],
            "description" => [
                'filter' => FILTER_SANITIZE_STRING
            ],
            "price" => [
                'filter' => FILTER_SANITIZE_INT
            ],
            "tag" => [
                'filter' => FILTER_SANITIZE_STRING
            ]
        ];

        $data = filter_input_array(INPUT_POST, $rules);

        if (self::checkValues($data)) {
            $id = ItemDB::insert($data);
            echo ViewHelper::redirect(BASE_URL . "seller?itemAdded=true");
        } else {
            echo ViewHelper::redirect(BASE_URL . "seller?item_missing_parameters=true");
        }
    }

    public static function editCustomer() {
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
            unset($data["password-repeat"]);
            $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
            $id = UserDB::update($data);
            echo ViewHelper::redirect(BASE_URL . "seller");
        } else {
            echo ViewHelper::redirect(BASE_URL . "seller?item_missing_parameters=true");
        }
    }

    public static function activateCustomer() {
        $rules = [
            "id" => [
                
            ]
        ];

        $data = filter_input_array(INPUT_POST, $rules);

        if (self::checkValues($data)) {
            $data["status"] = 1;
            UserDB::updateStatus($data);
            echo ViewHelper::redirect(BASE_URL . "seller");
        } else {
            echo ViewHelper::redirect(BASE_URL . "seller?item_missing_parameters=true");
        }
    }

    public static function deactivateCustomer() {
        $rules = [
            "id" => [
                
            ]
        ];

        $data = filter_input_array(INPUT_POST, $rules);

        if (self::checkValues($data)) {
            $data["status"] = 0;
            UserDB::updateStatus($data);
            echo ViewHelper::redirect(BASE_URL . "seller");
        } else {
            echo ViewHelper::redirect(BASE_URL . "seller?item_missing_parameters=true");
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

    public static function cancelOrder($id) {
        OrderDB::update(["status_id" => 0, "id" => $id]);
        ViewHelper::redirect(BASE_URL . "seller?orderCanceled=" . $id);
    }

    public static function approveOrder($id) {
        OrderDB::update(["status_id" => 1, "id" => $id]);
        ViewHelper::redirect(BASE_URL . "seller?orderCanceled=" . $id);
    }

    public static function getOrders() {
        $order_obj = SellerDB::getOrders();
        echo json_encode($order_obj);
    }
}

    
