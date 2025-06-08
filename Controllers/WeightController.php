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
    public function submitWeight() {
    // 1. Ambil dan simpan data dari form
    $weight = $_POST['weight'] ?? null;
    $height = $_POST['height'] ?? null;

    // Validasi dan simpan ke database atau session
    $_SESSION['weight'] = $weight;
    $_SESSION['height'] = $height;

    // 2. Redirect ke halaman outfit
    header('Location: index.php?action=recommendations');

    exit;
}

}