<?php

require_once("model/StoreDB.php");
require_once("model/ItemDB.php");
require_once("ViewHelper.php");

class ItemController {
    
    public static function index($method, $id) {
        $rules = [
            "id" => [
                'filter' => FILTER_VALIDATE_INT,
                'options' => ['min_range' => 1]
            ]
        ];

        $data = filter_input_array(INPUT_GET, $rules);
        
        echo ViewHelper::render("view/item.php", [
            "title" => "Store :: Artikel" . $id
        ]);
    }

    public static function deleteItem($id) {

        ItemDB::delete(["id" => $id]);
        
        ViewHelper::redirect(BASE_URL . "seller?deleted=true");
    }
}