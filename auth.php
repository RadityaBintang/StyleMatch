<?php
session_start();
require_once 'config/database.php';
require_once 'models/User.php';
require_once 'controllers/AuthController.php';

$action = $_GET['action'] ?? 'login';

$authController = new AuthController();

switch ($action) {
    case 'login':
        $authController->login();
        break;
    case 'authenticate':
        $authController->authenticate();
        break;
    case 'logout':
        $authController->logout();
        break;
    default:
        $authController->login();
        break;
}