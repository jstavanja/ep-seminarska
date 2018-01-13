<?php
session_start();
require_once("controller/StoreController.php");
require_once("controller/LoginController.php");
require_once("controller/RegistrationController.php");
require_once("controller/SellerController.php");
require_once("controller/CustomerController.php");
require_once("controller/AdministratorController.php");
require_once("controller/CartController.php");
require_once("controller/ItemController.php");

define("BASE_URL", $_SERVER["SCRIPT_NAME"] . "/");
define("IMAGES_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php") . "static/images/");
define("CSS_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php") . "static/css/");

$path = isset($_SERVER["PATH_INFO"]) ? trim($_SERVER["PATH_INFO"], "/") : "";

// ROUTER: defines mapping between URLS and controllers
$urls = [
    "/^store$/" => function ($method) {
        StoreController::index();
    },
    "/^store\/(.*?)$/" => function ($method, $tag) {
        StoreController::indexByTag($tag);
    },
    "/^login$/" => function ($method) {
        LoginController::index();
    },
    "/^registration$/" => function ($method) {
        RegistrationController::index();
    },
    "/^registration\/registerUser$/" => function ($method) {
        if ($method == "POST") {
            RegistrationController::registerUser();
        }
        else ViewHelper::error404();
    },
    "/^login\/logUserIn$/" => function ($method) {
        if ($method == "POST") {
            LoginController::logUserIn();
        }
        else ViewHelper::error404();
    },
    "/^administrator$/" => function ($method) {
        AdministratorController::index();
    },
    "/^administrator\/addSeller$/" => function ($method) {
        if ($method == "POST") {
            AdministratorController::addSeller();
        }
        else ViewHelper::error404();
    },
    "/^administrator\/editSeller\/(\d+)$/" => function ($method, $id) {
        if ($method == "POST") {
            AdministratorController::editSeller($id);
        }
        AdministratorController::editSellerIndex($id);
    },
    "/^administrator\/activateSeller$/" => function ($method) {
        if ($method == "POST") {
            AdministratorController::activateSeller();
        }
        else ViewHelper::error404();
    },
    "/^administrator\/deactivateSeller$/" => function ($method) {
        if ($method == "POST") {
            AdministratorController::deactivateSeller();
        }
        else ViewHelper::error404();
    },
    "/^customer$/" => function ($method) {
        CustomerController::index();
    },
    "/^customer\/editOwnData$/" => function($method) {
        if ($method == "POST"){
            CustomerController::editOwnData();
        }
        else ViewHelper::error404();
    },
    "/^customer\/getOrders$/" => function($method) {
        if ($method == "POST"){
            CustomerController::getOrders();
        }
        else ViewHelper::error404();
    },
    "/^customer\/order\/(\d+)$/" => function($method, $id) {
        if ($method == "POST"){
            CustomerController::editOrder($id);
        }
        CustomerController::editOrderIndex($id);
    },
    "/^customer\/order\/cancel\/(\d+)$/" => function($method, $id) {
        if ($method == "POST"){
            CustomerController::cancelOrder($id);
        }
        else ViewHelper::error404();
    },
    "/^seller$/" => function ($method) {
        SellerController::index();
    },
    "/^seller\/addCustomer$/" => function ($method) {
        if ($method == "POST") {
            SellerController::addCustomer();
        }
        else ViewHelper::error404();
    },
    "/^seller\/editCustomer\/(\d+)$/" => function ($method, $id) {
        if ($method == "POST") {
            SellerController::editCustomer($id);
        }
        SellerController::editCustomerIndex($id);
    },
    "/^seller\/activateCustomer$/" => function ($method) {
        if ($method == "POST") {
            SellerController::activateCustomer();
        }
        else ViewHelper::error404();
    },
    "/^seller\/deactivateCustomer$/" => function ($method) {
        if ($method == "POST") {
            SellerController::deactivateCustomer();
        }
        else ViewHelper::error404();
    },
    "/^seller\/deleteItem\/(\d+)$/" => function ($method, $id) {
        if ($method == "POST") {
            ItemController::deleteItem($id);
        }
        else SellerController::index();
    },
    "/^seller\/editItem\/(\d+)$/" => function ($method, $id) {
        if ($method == "POST") {
            ItemController::editItem($id);
        }
        SellerController::editItemIndex($id);
    },
    "/^seller\/addItem$/" => function ($method) {
        if ($method == "POST") {
            SellerController::addItem();
        }
        else ViewHelper::error404();
    },
    "/^item$/" => function ($method) {
        ViewHelper::redirect(BASE_URL . "store");
    },
    "/^item\/getAllItemsJSON$/" => function ($method) {
        ItemController::getAllItemsJSON();
    },
    "/^item\/(\d+)$/" => function ($method, $id) {
        ItemController::index($method, $id);
    },
    "/^cart$/" => function ($method) {
        CartController::index();
    },
    "/^cart\/completeOrder$/" => function ($method) {
        if ($method == "POST") {
            CartController::completeOrder();
        }
        else ViewHelper::error404();
    },
    "/^cart\/addToCart$/" => function ($method) {
        if ($method == "POST") {
            CartController::updateCart();
        }
        else ViewHelper::error404();
    },
    "/^cart\/emptyCart$/" => function ($method) {
        if ($method == "POST") {
            CartController::updateCart();
        }
        else ViewHelper::error404();
    },
    "/^cart\/updateCart$/" => function ($method) {
        if ($method == "POST") {
            CartController::updateCart();
        }
        else ViewHelper::error404();
    },
    "/^static\/images\/.*?$/" => function ($method) {
        $path = isset($_SERVER["PATH_INFO"]) ? trim($_SERVER["PATH_INFO"], "/") : "";
        readfile($path);
    },
    "/^static\/css\/.*?$/" => function ($method) {
        $path = isset($_SERVER["PATH_INFO"]) ? trim($_SERVER["PATH_INFO"], "/") : "";
        readfile($path);
    },
    "/^static\/js\/.*?$/" => function ($method) {
        $path = isset($_SERVER["PATH_INFO"]) ? trim($_SERVER["PATH_INFO"], "/") : "";
        readfile($path);
    },
    "/^$/" => function ($method) {
        ViewHelper::redirect(BASE_URL . "store");
    },
];
   
foreach ($urls as $pattern => $controller) {
    if (preg_match($pattern, $path, $params)) {
        try {
            $params[0] = $_SERVER["REQUEST_METHOD"];
            $controller(...$params);
        } catch (InvalidArgumentException $e) {
            ViewHelper::error404();
        } catch (Exception $e) {
            ViewHelper::displayError($e, true);
        }
        exit();
    }
}

