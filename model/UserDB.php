<?php

require_once 'model/AbstractDB.php';

class UserDB extends AbstractDB {

    public static function insert(array $params) {
      return parent::modify("INSERT INTO user (username, email, name, surname, password, address, postcode, phone, role, status) "
                      . " VALUES (:username, :email, :name, :surname, :password, :address, :postcode, :phone, :role, :status)", $params);
    }

    public static function update(array $params) {
        return parent::modify("UPDATE user SET username = :username, email = :email, "
                        . "name = :name, surname = :surname, password = :password, address = :address, postcode = :postcode, phone = :phone"
                        . " WHERE id = :id", $params);
    }

    public static function updateStatus(array $params) {
        return parent::modify("UPDATE user SET status = :status"
                        . " WHERE id = :id", $params);
    }

    public static function delete(array $id) {
        return parent::modify("DELETE FROM book WHERE id = :id", $id);
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

    public static function getById(array $email) {
        $users = parent::query("SELECT *"
                        . " FROM user"
                        . " WHERE id = :id", $email);
        
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

    public static function getOrders($params) {

        $orders = parent::query('SELECT * FROM `order` WHERE user_id = :user_id', $params);
        header('Content-type: application/json');
        $ordersWithItems = [];
        foreach($orders as $order) {
            array_push($ordersWithItems, $order["id"]);
            $items = self::getItemsFromOrder(["order_id" => $order["id"]]);
            $data_obj = ["order_id" => $order["id"], "items" => $items, "status" => $order["status_id"]];
            $ordersWithItems[$order["id"]] = $data_obj;
        }
        echo(json_encode($ordersWithItems)); exit();
    }

    public static function getItemsFromOrder($params) {
        $items = parent::query('SELECT * FROM `ordered_items` WHERE order_id = :order_id', $params);
        $item_data = [];
        foreach($items as $item) {
            $curr_item_data = parent::query('SELECT * FROM `item` WHERE id = :item_id', ["item_id" => $item["item_id"]]);
            $curr_item_data["amount"] = $item["amount"];
            array_push($item_data, $curr_item_data);
        }
        return $item_data;
    }

}
