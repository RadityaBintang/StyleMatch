<?php
class ReviewModel {
    private $db;

    public function __construct() {
        $this->db = new PDO("mysql:host=localhost;dbname=stylematch_db", "root", "");
    }

    public function getReviewsByOutfitsId($outfits_id) {
        $stmt = $this->db->prepare("SELECT * FROM reviews WHERE outfits_id = ? ORDER BY created_at DESC");
        $stmt->execute([$outfits_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addReview($username, $rating, $comment, $outfits_id) {
        $stmt = $this->db->prepare("INSERT INTO reviews (username, rating, comment, outfits_id, created_at) VALUES (?, ?, ?, ?, NOW())");
        return $stmt->execute([$username, $rating, $comment, $outfits_id]);
    }
}
