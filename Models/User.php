<?php
class User {
    private $db;
    
    public function __construct() {
        $this->db = Database::getInstance();
    }
    
    public function authenticate($username, $password) {
        $stmt = $this->db->prepare("
            SELECT id, username, password 
            FROM users 
            WHERE username = :username
        ");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        
        return false;
    }
    
    public function create($username, $password) {
        
        if (strlen($username) < 4) {
            throw new Exception("Username must be at least 4 characters");
        }
        
        
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
       
        $stmt = $this->db->prepare("
            INSERT INTO users (username, password)
            VALUES (:username, :password)
        ");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $hashedPassword);
        
        return $stmt->execute();
    }
    
    public function usernameExists($username) {
        $stmt = $this->db->prepare("
            SELECT COUNT(*) 
            FROM users 
            WHERE username = :username
        ");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        
        return $stmt->fetchColumn() > 0;
    }
}