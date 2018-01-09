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
}

    
