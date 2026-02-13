<?php
require_once '../config/database.php';
require_once '../models/Conversation.php';
require_once '../models/Message.php';

$input = json_decode(file_get_contents('php://input'), true);
$action = $_POST['action'] ?? $input['action'] ?? null;

$conversation = new Conversation($pdo);
$message = new Message($pdo);

switch($action) {
    case 'create':
        $password = $input['password'];
        $code = $conversation->create($password);
        echo json_encode(['code'=>$code]);
        break;

    case 'access':
        $conv = $conversation->verify($input['code'],$input['password']);
        echo json_encode(['success'=>!!$conv]);
        break;

    case 'get':
        $msgs = $conversation->getMessages($input['code']);
        echo json_encode(['messages'=>$msgs]);
        break;

    case 'send':
        $file = $_FILES['file'] ?? null;
        $message->send($_POST['code'], $_POST['message'], $file);
        echo json_encode(['success'=>true]);
        break;

    default:
        echo json_encode(['error'=>'Acción no válida']);
        break;
}
?>
