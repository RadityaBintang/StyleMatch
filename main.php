<?php



session_start();


require_once __DIR__ . '/config/database.php';


define('BASE_PATH', __DIR__);
define('CONTROLLER_PATH', BASE_PATH . '/controllers');
define('MODEL_PATH', BASE_PATH . '/models');
define('VIEW_PATH', BASE_PATH . '/views');


spl_autoload_register(function ($className) {
    $classFile = '';
    
    
    if (strpos($className, 'Controller') !== false) {
        $classFile = CONTROLLER_PATH . '/' . $className . '.php';
    } 
    
    elseif (strpos($className, 'Model') !== false || $className === 'User' || $className === 'Outfit') {
        $classFile = MODEL_PATH . '/' . $className . '.php';
    }
    
    if (file_exists($classFile)) {
        require_once $classFile;
    }
});


$action = $_GET['action'] ?? 'login';


try {
    switch ($action) {
        case 'login':
            $controller = new AuthController();
            $controller->login();
            break;
            
        case 'authenticate':
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                throw new Exception('Method not allowed', 405);
            }
            $controller = new AuthController();
            $controller->authenticate();
            break;
            
        case 'logout':
            $controller = new AuthController();
            $controller->logout();
            break;
            
        case 'main':
            $controller = new MainController();
            $controller->index();
            break;
            
        case 'weight':
            $controller = new WeightController();
            $controller->index();
            break;
            
        case 'get_recommendations':
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                throw new Exception('Method not allowed', 405);
            }
            $controller = new RecommendationController();
            $controller->getRecommendations();
            break;
            
        case 'recommendations':
            $controller = new RecommendationController();
            $controller->index();
            break;
            
        case 'detail':
            $id = $_GET['id'] ?? 0;
            $controller = new RecommendationController();
            $controller->detail($id);
            break;
            
        default:
            header('HTTP/1.0 404 Not Found');
            include VIEW_PATH . '/errors/404.php';
            exit;
    }
} catch (Exception $e) {
    
    $errorCode = $e->getCode() ?: 500;
    $errorMessage = $e->getMessage();
    
    header("HTTP/1.0 {$errorCode}");
    
    
    $errorPage = VIEW_PATH . "/errors/{$errorCode}.php";
    if (file_exists($errorPage)) {
        include $errorPage;
    } else {

        include VIEW_PATH . '/errors/500.php';
    }
    

    error_log("Error: {$errorMessage} (Code: {$errorCode})");
    exit;
}