<?php
require_once __DIR__ . '/db/Database.php';
require_once __DIR__ . '/models/Word.php';

$db = new Database(__DIR__ . '/db/database.db');
$wordModel = new Word($db);

$action = $_GET['action'] ?? '';

if ($action === 'cadastrar' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $word = $_POST['word'];
    if ($wordModel->addWord($word)) {
        echo "Palavra cadastrada!";
    } else {
        echo "Erro para cadastrar";
    }
} elseif ($action === 'iniciar') {
    $word = $wordModel->getRandomWord();
    echo json_encode($word);
}
?>