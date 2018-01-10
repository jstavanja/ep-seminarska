<?php

require_once 'model/AbstractDB.php';

class ItemDB extends AbstractDB {

    public static function insert(array $params) {
      return parent::modify("INSERT INTO item (name, description, price, tag) "
                      . " VALUES (:name, :description, :price, :tag)", $params);
    }

    public static function update(array $params) {
        return parent::modify("UPDATE item SET name = :name, description = :description, "
                        . "price = :price, tag = :tag"
                        . " WHERE id = :id", $params);
    }

    public static function delete(array $id) {
        return parent::modify("DELETE FROM item WHERE id = :id", $id);
    }

    public static function get(array $id) {
        $items = parent::query("SELECT *"
                        . " FROM item"
                        . " WHERE id = :id", $id);
        
        if (count($items) == 1) {
            return $items[0];
        } else {
            throw new InvalidArgumentException("No such user");
        }
    }

    public static function getCustomers() {
      // get and return full data
      return parent::query("SELECT * FROM user");
    }

    public static function getAll() {
        return parent::query("SELECT *"
                        . " FROM item");
    }

}
