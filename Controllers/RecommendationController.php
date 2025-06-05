<?php
require_once __DIR__ . '/../models/Outfit.php';

class RecommendationController {
    public function getRecommendations() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?action=login');
            exit;
        }
        
        $weight = filter_input(INPUT_POST, 'weight', FILTER_VALIDATE_FLOAT);
        $height = filter_input(INPUT_POST, 'height', FILTER_VALIDATE_FLOAT);
        
        if ($weight === false || $height === false || $weight <= 0 || $height <= 0) {
            $_SESSION['error'] = 'Please enter valid weight (kg) and height (cm)';
            header('Location: index.php?action=weight');
            exit;
        }
        
       

        
        $outfitModel = new Outfit();
        $recommendations = $outfitModel->getRecommendations($weight, $height);
        
        if (empty($recommendations)) {
            $_SESSION['error'] = 'No outfits found for your body type. Try different measurements.';
            header('Location: index.php?action=weight');
            exit;
        }
        
        $_SESSION['recommendations'] = $recommendations;
        header('Location: index.php?action=recommendations');
        exit;
    }

    public function index() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?action=login');
            exit;
        }
        
        if (!isset($_SESSION['recommendations'])) {
            header('Location: index.php?action=weight');
            exit;
        }
        
        $recommendations = $_SESSION['recommendations'];
        require_once __DIR__ . '/../views/recommendation/index.php';
    }

    public function detail($id) {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?action=login');
            exit;
        }
        
        $id = filter_var($id, FILTER_VALIDATE_INT);
        if ($id === false || $id <= 0) {
            header('Location: index.php?action=recommendations');
            exit;
        }
        
        $outfitModel = new Outfit();
        $outfit = $outfitModel->getById($id);
        
        if (!$outfit) {
            header('Location: index.php?action=recommendations');
            exit;
        }
        
        require_once __DIR__ . '/../views/recommendation/detail.php';
    }
     
}
