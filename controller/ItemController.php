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

    public static function editItem($id) {
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
        $data["id"] = $id;
        if (self::checkValues($data)) {
            $id = ItemDB::update($data);
            echo ViewHelper::redirect(BASE_URL . "seller");
        } else {
            echo ViewHelper::redirect(BASE_URL . "seller?item_missing_parameters=true");
        }
    }

    private static function checkValues($input) {
        if (empty($input)) {
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