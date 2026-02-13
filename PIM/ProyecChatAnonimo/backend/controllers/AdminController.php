<?php
require_once '../config/database.php';
require_once '../models/Conversation.php';

class AdminController {
    private $pdo;
    public function __construct($pdo) { $this->pdo = $pdo; }

    public function listConversations() {
        $stmt = $this->pdo->query("SELECT * FROM conversaciones ORDER BY created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function changeStatus($code, $status) {
        $stmt = $this->pdo->prepare("UPDATE conversaciones SET estado=? WHERE code=?");
        $stmt->execute([$status, $code]);
    }
}
?>
