<?php

require_once("model/StoreDB.php");
require_once("model/UserDB.php");
require_once("ViewHelper.php");

class CartController {
    
    public static function index() {
        $rules = [
            "id" => [
                'filter' => FILTER_VALIDATE_INT,
                'options' => ['min_range' => 1]
            ]
        ];

        $data = filter_input_array(INPUT_GET, $rules);
        
        echo ViewHelper::render("view/cart.php", [
            "title" => "Store :: Košarica",
            "items" => ItemDB::getCart()
        ]);
    }

    public static function updateCart() {
        $validationRules = [
            'do' => [
                'filter' => FILTER_VALIDATE_REGEXP,
                'options' => [
                    "regexp" => "/^(add_into_cart|update_cart|purge_cart)$/"
                ]
            ],
            'id' => [
                'filter' => FILTER_VALIDATE_INT,
                'options' => ['min_range' => 0]
            ],
            'amount' => [
                'filter' => FILTER_VALIDATE_INT,
                'options' => ['min_range' => 0]
            ]
        ];

        $data = filter_input_array(INPUT_POST, $validationRules);
        
        switch ($data["do"]) {
            case "add_into_cart":
                try {
                    $item = ItemDB::get(["id" => $data["id"]]);
                
                    if (isset($_SESSION["cart"][$item["id"]]) && $item["id"] != "") {
                        $_SESSION["cart"][$item["id"]] ++;
                    } else {
                        $_SESSION["cart"][$item["id"]] = 1;
                    }
                } catch (Exception $exc) {
                    throw new InvalidArgumentException("Something went wrong");
                }
                break;
            case "update_cart":
                if (isset($_SESSION["cart"][$data["id"]])) {
                    if ($data["amount"] > 0) {
                        $_SESSION["cart"][$data["id"]] = $data["amount"];
                    } else {
                        unset($_SESSION["cart"][$data["id"]]);
                    }
                }
                break;
            case "purge_cart":
                unset($_SESSION["cart"]);
                break;
            default:
                break;
        }
        ViewHelper::redirect(BASE_URL . "cart");
    }
}