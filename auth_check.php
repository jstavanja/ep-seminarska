<?php

$current_page = $_SERVER['REQUEST_URI'];

if (!isset($_SESSION["user"])) {
  switch ($current_page) {
    case '/administrator':
      ViewHelper::redirect(BASE_URL . "store");
      break;
    case '/customer':
      ViewHelper::redirect(BASE_URL . "store");
      break;
    case '/seller':
      ViewHelper::redirect(BASE_URL . "store");
      break;
    default:
      # code...
      break;
  }
}

if (isset($_SESSION["user"])) {
  switch ($current_page) {
    case '/administrator':
      if (!(AdministratorDB::isAdmin(["id" => $_SESSION['userid']]))) {
        ViewHelper::redirect(BASE_URL . "store");
      }
      break;
    case '/seller':
      if (!(SellerDB::isSeller(["id" => $_SESSION['userid']]))) {
        ViewHelper::redirect(BASE_URL . "store");
      }
      break;
    default:
      # code...
      break;
  }
}