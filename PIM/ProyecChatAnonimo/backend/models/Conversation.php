<?php
class Conversation {
    private $pdo;
    public function __construct($pdo) { $this->pdo = $pdo; }

    public function create($password) {
        $code = uniqid();
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->pdo->prepare("INSERT INTO conversaciones(code,password_hash,estado,created_at) VALUES (?,?,?,NOW())");
        $stmt->execute([$code, $hash, 'abierta']);
        return $code;
    }

    public function verify($code, $password) {
        $stmt = $this->pdo->prepare("SELECT * FROM conversaciones WHERE code=?");
        $stmt->execute([$code]);
        $conv = $stmt->fetch(PDO::FETCH_ASSOC);
        if($conv && password_verify($password, $conv['password_hash'])) return $conv;
        return false;
    }

    public function getMessages($code) {
        $stmt = $this->pdo->prepare("SELECT * FROM mensajes WHERE conversation_code=? ORDER BY created_at ASC");
        $stmt->execute([$code]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
