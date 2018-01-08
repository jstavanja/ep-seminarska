<?php

require_once("model/StoreDB.php");
require_once("ViewHelper.php");

class SellerController {
    
    public static function index() {
        $rules = [
            "id" => [
                'filter' => FILTER_VALIDATE_INT,
                'options' => ['min_range' => 1]
            ]
        ];

        $data = filter_input_array(INPUT_GET, $rules);
        
        echo ViewHelper::render("view/seller.php", [
            "title" => "Store :: Nadzorna plošča prodajalca"
        ]);
    }
}

    
