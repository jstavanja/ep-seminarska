<?php

require_once 'model/AbstractDB.php';

class UserDB extends AbstractDB {

    public static function insert(array $params) {
      return parent::modify("INSERT INTO user (username, email, name, password, address, postcode) "
                      . " VALUES (:username, :email, :name, :password, :address, :postcode)", $params);
    }

    public static function update(array $params) {
        return parent::modify("UPDATE user SET username = :username, email = :email, "
                        . "name = :name, password = :password, address = :address, postcode = :postcode"
                        . " WHERE id = :id", $params);
    }

    public static function delete(array $id) {
        return parent::modify("DELETE FROM book WHERE id = :id", $id);
    }

    public static function get(array $email) {
        $users = parent::query("SELECT id, username, email, password, name, address, postcode"
                        . " FROM user"
                        . " WHERE email = :email", $email);
        
        if (count($users) == 1) {
            return $users[0];
        } else {
            throw new InvalidArgumentException("No such user");
        }
    }

    public static function getAll() {
        return parent::query("SELECT id, author, title, price, year, description"
                        . " FROM book"
                        . " ORDER BY id ASC");
    }

}
