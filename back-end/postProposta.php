<?php
    header('Content-Type: application/json');

    require_once 'models/proposta.php';

    $data = new postProposta(__DIR__ .  '/data/proposta.json');

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        
        $jsonData = $data -> getAllData();
        
        echo json_encode($jsonData);

    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        $postData = json_decode(file_get_contents('php://input'), true);

        if ($data -> addData($postData)) {
            http_response_code(201);
            echo json_encode(['message' => 'Dados adicionados com sucesso.']);
        } else {
            http_response_code(500);
            echo json_encode(['message' => 'Erro ao adicionar dados.']);
        }
    } else {
        http_response_code(405);
        echo json_encode(['message' => 'Método não permitido.']);
    }
?>
