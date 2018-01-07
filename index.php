<?php

session_start();
require_once("controller/StoreController.php");

define("BASE_URL", $_SERVER["SCRIPT_NAME"] . "/");
define("IMAGES_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php") . "static/images/");
define("CSS_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php") . "static/css/");

$path = isset($_SERVER["PATH_INFO"]) ? trim($_SERVER["PATH_INFO"], "/") : "";

// ROUTER: defines mapping between URLS and controllers
$urls = [
    "store" => function () {
        StoreController::index();
    },
    "login" => function () {
        LoginController::index();
    },
    "registration" => function () {
        RegistrationController::index();
    },
    "administrator" => function () {
        AdministratorController::index();
    },
    "customer" => function () {
        CustomerController::index();
    },
    "seller" => function () {
        SellerController::index();
    },
    "item" => function () {
        ItemController::index();
    },
    "" => function () {
        ViewHelper::redirect(BASE_URL . "store");
    },
];
    
try {
    if (isset($urls[$path])) {
        $urls[$path]();
    } else {
        echo "No controller for '$path'";
    }
} catch (InvalidArgumentException $e) {
    ViewHelper::error404();
} catch (Exception $e) {
    echo "An error occurred: <pre>$e</pre>";
} 

