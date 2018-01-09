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
    "/^customer\/editOwnData$/" => function($method) {
        if ($method == "POST"){
            CustomerController::editOwnData();
        }
        else ViewHelper::error404();
    },
    "/^administrator$/" => function ($method) {
        AdministratorController::index();
    },
    "/^customer$/" => function ($method) {
        CustomerController::index();
    },
    "/^seller$/" => function ($method) {
        SellerController::index();
    },
    "/^item$/" => function ($method) {
        ViewHelper::redirect(BASE_URL . "store");
    },
    "/^item\/(\d+)$/" => function ($method, $id) {
        ItemController::index($id);
    },
    "/^cart$/" => function ($method) {
        CartController::index();
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

// če path ne fitta nobenmu pageu, serviraj asset quic hacc
readfile($path);
exit();

