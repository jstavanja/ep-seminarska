<?php

require_once 'model/AbstractDB.php';

class ItemDB extends AbstractDB {

    public static function insert(array $params) {
      return parent::modify("INSERT INTO item (name, description, price, tag) "
                      . " VALUES (:name, :description, :price, :tag)", $params);
    }

    public static function update(array $params) {
        return parent::modify("UPDATE user SET username = :username, email = :email, "
                        . "name = :name, password = :password, address = :address, postcode = :postcode"
                        . " WHERE id = :id", $params);
    }

    public static function delete(array $id) {
        return parent::modify("DELETE FROM item WHERE id = :id", $id);
    }

    public static function get(array $email) {
        $users = parent::query("SELECT id, username, email, password, name, address, postcode, role, status"
                        . " FROM user"
                        . " WHERE email = :email", $email);
        
        if (count($users) == 1) {
            return $users[0];
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
