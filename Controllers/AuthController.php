<?php
require_once __DIR__ . '/../models/User.php';

class AuthController {
    public function login() {
        if (isset($_SESSION['user_id'])) {
            header('Location: index.php?action=main');
            exit;
        }
        
        $error = $_SESSION['error'] ?? null;
        unset($_SESSION['error']);
        
        require_once __DIR__ . '/../views/authentication/login.php';
    }

    public function authenticate() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: index.php?action=login');
            exit;
        }
        
        $username = trim($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';
        
        if (empty($username) || empty($password)) {
            $_SESSION['error'] = 'Username and password are required';
            header('Location: index.php?action=login');
            exit;
        }
        
        $userModel = new User();
        $user = $userModel->authenticate($username, $password);
        
        if ($user) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header('Location: index.php?action=main');
            exit;
        } else {
            $_SESSION['error'] = 'Invalid username or password';
            header('Location: index.php?action=login');
            exit;
        }
    }
    
    public function logout() {
        session_unset();
        session_destroy();
        header('Location: index.php?action=login');
        exit;
    }
}