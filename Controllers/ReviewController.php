<?php
require_once 'Models/ReviewModel.php';

class ReviewController {
    private $model;

    public function __construct() {
        $this->model = new ReviewModel();
    }

    public function reviews($id) {
        $reviews = $this->model->getReviewsByOutfitsId($id);
        include 'views/reviews/index.php';
    }

    public function addReview() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $rating = $_POST['rating'];
            $comment = $_POST['comment'];
            $outfits_id = $_POST['outfits_id'];

            $this->model->addReview($username, $rating, $comment, $outfits_id);
            header("Location: index.php?action=reviews&id=" . $outfits_id);
            exit;
        }
    }
}
