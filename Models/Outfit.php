<?php
class Outfit {
    private $db;
    
    public function __construct() {
        $this->db = Database::getInstance();
    }
    
    public function getRecommendations($weight, $height) {
        
        $stmt = $this->db->prepare("
            SELECT o.*, 
                   (SELECT AVG(rating) FROM outfit_ratings WHERE outfit_id = o.id) as avg_rating,
                   (SELECT COUNT(*) FROM outfit_likes WHERE outfit_id = o.id) as likes_count
            FROM outfits o
            WHERE o.min_weight <= :weight AND o.max_weight >= :weight
            AND o.min_height <= :height AND o.max_height >= :height
            ORDER BY avg_rating DESC
            LIMIT 8
        ");
        
        $stmt->bindParam(':weight', $weight);
        $stmt->bindParam(':height', $height);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getById($id) {
        $stmt = $this->db->prepare("
            SELECT o.*, 
                   (SELECT AVG(rating) FROM outfit_ratings WHERE outfit_id = o.id) as avg_rating,
                   (SELECT COUNT(*) FROM outfit_likes WHERE outfit_id = o.id) as likes_count
            FROM outfits o
            WHERE o.id = :id
        ");
        
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function chooseOutfit() {
    // Ambil data outfit dari model (opsional)
    $tops = $this->outfitModel->getTops();
    $bottoms = $this->outfitModel->getBottoms();

    // Tampilkan view
    include 'views/outfit/choose.php';
}

}