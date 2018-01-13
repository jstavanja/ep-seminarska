<?php

require_once("model/StoreDB.php");
require_once("model/OrderDB.php");
require_once("model/UserDB.php");
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

    public static function editOrderIndex($id) {
        
        echo ViewHelper::render("view/customer/edit-order.php", [
            "title" => "Store :: Urejanje naročila",
            "order" => OrderDB::get(["order_id" => $id]),
            "items" => UserDB::getItemsFromOrder(["order_id" => $id])
        ]);
    }

    public static function editOwnData(){
        $userId = $_SESSION["userid"];

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
        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        $data["id"] = $userId;
        UserDB::update($data);
        echo ViewHelper::redirect(BASE_URL . "customer");
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

    public static function cancelOrder($id) {
        OrderDB::update(["status_id" => 0, "id" => $id]);
        echo ViewHelper::redirect(BASE_URL . "customer?orderCanceled=" . $id);
    }

    public static function getOrders() {
        $order_obj = UserDB::getOrders(["user_id" => $_SESSION["userid"]]);
        echo json_encode($order_obj);
    }
}