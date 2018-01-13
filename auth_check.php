<?php

$current_page = $_SERVER['REQUEST_URI'];

if (!isset($_SESSION["user"])) {
  switch ($current_page) {
    case '/index.php/administrator':
      ViewHelper::redirect(BASE_URL . "store");
      break;
    case '/index.php/customer':
      ViewHelper::redirect(BASE_URL . "store");
      break;
    case '/index.php/seller':
      ViewHelper::redirect(BASE_URL . "store");
      break;
    default:
      # code...
      break;
  }
}

if (isset($_SESSION["user"])) {
  switch ($current_page) {
    case '/index.php/administrator':
      if (!(AdministratorDB::isAdmin(["id" => $_SESSION['userid']]))) {
        ViewHelper::redirect(BASE_URL . "store");
      }
      break;
    case '/index.php/seller':
      if (!(SellerDB::isSeller(["id" => $_SESSION['userid']]))) {
        ViewHelper::redirect(BASE_URL . "store");
      }
      break;
    default:
      # code...
      break;
  }
}