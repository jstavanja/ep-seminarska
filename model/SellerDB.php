<?php

require_once 'model/AbstractDB.php';

class SellerDB extends AbstractDB {

    public static function insert(array $params) {
      return parent::modify("INSERT INTO seller (user_id, activated, certifikat) "
                      . " VALUES (:user_id, :activated, :certifikat)", $params);
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
        $users = parent::query("SELECT id, username, email, password, name, address, postcode, role, status"
                        . " FROM user"
                        . " WHERE email = :email", $email);
        
        if (count($users) == 1) {
            return $users[0];
        } else {
            throw new InvalidArgumentException("No such user");
        }
    }

    public static function isSeller(array $id) {
      $users = parent::query("SELECT *"
                      . " FROM seller"
                      . " WHERE user_id = :id", $id);
      
      if (count($users) == 1) {
          return true;
      } else {
          return false;
      }
    }

    public static function getCustomers() {
      // get and return full data
      return parent::query("SELECT * FROM user");
    }

    public static function getOrders() {

        $orders = parent::query('SELECT * FROM `order`');
        header('Content-type: application/json');
        $ordersWithItems = [];
        foreach($orders as $order) {
            array_push($ordersWithItems, $order["id"]);
            $items = self::getItemsFromOrder(["order_id" => $order["id"]]);
            $customer = UserDB::getById(["id" => $order["user_id"]]);
            $data_obj = ["order_id" => $order["id"], "items" => $items, "status" => $order["status_id"], "customer" => $customer["email"]];
            $ordersWithItems[$order["id"]] = $data_obj;
        }
        echo(json_encode($ordersWithItems)); exit();
    }

    public static function getItemsFromOrder($params) {
        $items = parent::query('SELECT * FROM `ordered_items` WHERE order_id = :order_id', $params);
        $item_data = [];
        foreach($items as $item) {
            $curr_item_data = parent::query('SELECT * FROM `item` WHERE id = :item_id', ["item_id" => $item["item_id"]]);
            array_push($item_data, $curr_item_data);
        }
        return $item_data;
    }

    public static function getAll() {
        return parent::query("SELECT id, author, title, price, year, description"
                        . " FROM book"
                        . " ORDER BY id ASC");
    }

}
