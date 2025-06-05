<?php
session_start();
require_once 'config/database.php';

// Handle actions
$action = $_GET['action'] ?? 'login';

// Simple routing
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
        
    default:
        header('Location: index.php?action=login');
        exit;
}