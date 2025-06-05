<?php
class WeightController {
    public function index() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?action=login');
            exit;
        }
        
        $error = $_SESSION['error'] ?? null;
        unset($_SESSION['error']);
        
        require_once __DIR__ . '/../views/weight/index.php';
    }
}