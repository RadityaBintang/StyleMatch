<?php
class MainController {
    public function index() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?action=login');
            exit;
        }
        
        $username = $_SESSION['username'] ?? 'User';
        require_once __DIR__ . '/../views/main/index.php';
    }
}