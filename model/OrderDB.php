<?php

require_once 'model/AbstractDB.php';

class OrderDB extends AbstractDB {

    public static function insert(array $params) {
        return parent::modify("INSERT INTO `order`(`user_id`, `status_id`) VALUES (:user_id, :status_id)", $params);
    }

    public static function insertOrderedItem(array $params) {
      return parent::modify("INSERT INTO ordered_items (item_id, order_id) "
                            . " VALUES (:item_id, :order_id)", $params);
  }

    public static function update(array $params) {
        return parent::modify("UPDATE `order` SET status_id = :status_id WHERE id = :id", $params);
    }

    public static function delete(array $id) {
        return parent::modify("DELETE FROM order WHERE id = :id", $id);
    }

    public static function get(array $id) {
        $order = parent::query("SELECT * FROM `order` WHERE id = :order_id", $id);
        
        if (count($order) == 1) {
            return $order[0];
        } else {
            throw new InvalidArgumentException("No such book");
        }
    }

    public static function newOrder() {
      return self::insert(["user_id" => intval($_SESSION["userid"]), "status_id" => 2]);
    }

    public static function addOrderedItem($item_id, $order_id) {
      return self::insertOrderedItem(["item_id" => $item_id, "order_id" => $order_id]);
    }

    public static function getAll() {
        return parent::query("SELECT *"
                        . " FROM item"
                        . " ORDER BY id ASC");
    }
    
    public static function getFeatured() {
        return [];
    }

}
