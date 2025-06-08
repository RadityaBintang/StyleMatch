<?php

require_once 'config/database.php';

class Save {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function getTops($category) {
        $stmt = $this->db->prepare("SELECT * FROM tops WHERE category = :category");
        $stmt->bindParam(':category', $category);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getBottoms($category) {
        $stmt = $this->db->prepare("SELECT * FROM bottoms WHERE category = :category");
        $stmt->bindParam(':category', $category);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTopById($id) {
        $stmt = $this->db->prepare("SELECT * FROM tops WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getBottomById($id) {
        $stmt = $this->db->prepare("SELECT * FROM bottoms WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function saveOutfit($name, $desc, $topId, $bottomId) {
        $stmt = $this->db->prepare("INSERT INTO saved_outfits (name, description, top_id, bottom_id) VALUES (:name, :desc, :topId, :bottomId)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':desc', $desc);
        $stmt->bindParam(':topId', $topId);
        $stmt->bindParam(':bottomId', $bottomId);
        return $stmt->execute();
    }

    public function getSavedOutfitsByCategory() {
        $stmt = $this->db->prepare("
            SELECT s.id, s.name, s.description, s.top_id, s.bottom_id
            FROM saved_outfits s
            WHERE s.top_id IS NOT NULL AND s.bottom_id IS NOT NULL
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteOutfit($id) {
        $stmt = $this->db->prepare("DELETE FROM saved_outfits WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
