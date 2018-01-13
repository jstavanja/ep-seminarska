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
        return parent::modify("UPDATE book SET author = :author, title = :title, "
                        . "description = :description, price = :price, year = :year"
                        . " WHERE id = :id", $params);
    }

    public static function delete(array $id) {
        return parent::modify("DELETE FROM book WHERE id = :id", $id);
    }

    public static function get(array $id) {
        $books = parent::query("SELECT id, author, title, description, price, year"
                        . " FROM book"
                        . " WHERE id = :id", $id);
        
        if (count($books) == 1) {
            return $books[0];
        } else {
            throw new InvalidArgumentException("No such book");
        }
    }

    public static function newOrder() {
      return self::insert(["user_id" => intval($_SESSION["userid"]), "status_id" => 0]);
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
