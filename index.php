<?php
session_start();
require_once 'config/database.php'; 
$db = Database::getInstance();

$action = $_GET['action'] ?? null;

if ($action) {
    switch ($action) {
        case 'login':
            require 'controllers/AuthController.php';
            $controller = new AuthController();
            $controller->login();
            break;

        case 'authenticate':
            require 'controllers/AuthController.php';
            $controller = new AuthController();
            $controller->authenticate();
            break;

        case 'logout':
            require 'controllers/AuthController.php';
            $controller = new AuthController();
            $controller->logout();
            break;

        case 'main':
            require 'controllers/MainController.php';
            $controller = new MainController();
            $controller->index();
            break;

        case 'weight':
            require 'controllers/WeightController.php';
            $controller = new WeightController();
            $controller->index();
            break;

        case 'get_recommendations':
            require 'controllers/RecommendationController.php';
            $controller = new RecommendationController();
            $controller->getRecommendations();
            break;

        case 'recommendations':
            require 'controllers/RecommendationController.php';
            $controller = new RecommendationController();
            $controller->index();
            break;

        case 'detail':
            require 'controllers/RecommendationController.php';
            $controller = new RecommendationController();
            $id = $_GET['id'] ?? 0;
            $controller->detail($id);
            break;

        case 'reviews':
            require 'controllers/ReviewController.php';
            $controller = new ReviewController($db); 
            $id = $_GET['id'] ?? 0;
            $controller->reviews($id);
            break;

        case 'addReview':
            require 'controllers/ReviewController.php';
            $controller = new ReviewController($db); 
            $controller->addReview();
            break;

        default:
            header('Location: index.php?action=login');
            exit;
    }
} else {
    // ✅ Routing dinamis: ?c=Outfit&m=select
    $controllerName = $_GET['c'] ?? 'Main';
    $method = $_GET['m'] ?? 'index';
    $controllerClass = $controllerName . 'Controller';
    $controllerFile = "controllers/" . $controllerClass . ".php";

    if (file_exists($controllerFile)) {
        require_once $controllerFile;
        if (class_exists($controllerClass)) {
            $controller = new $controllerClass();
            if (method_exists($controller, $method)) {
                $controller->$method();
                exit;
            } else {
                echo "❌ Method <b>$method</b> tidak ditemukan di <b>$controllerClass</b>.";
            }
        } else {
            echo "❌ Class <b>$controllerClass</b> tidak ditemukan.";
        }
    } else {
        echo "❌ File controller <b>$controllerFile</b> tidak ditemukan.";
    }
}
