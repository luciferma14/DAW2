<?php
class Message {
    private $pdo;
    public function __construct($pdo) { $this->pdo = $pdo; }

    public function send($code, $content, $file=null) {
        $filename = null;
        if($file) {
            $filename = 'uploads/' . time() . '_' . $file['name'];
            move_uploaded_file($file['tmp_name'], '../../frontend/' . $filename);
        }
        $stmt = $this->pdo->prepare("INSERT INTO mensajes(conversation_code,content,file,created_at) VALUES (?,?,?,NOW())");
        $stmt->execute([$code,$content,$filename]);
    }
}
?>
