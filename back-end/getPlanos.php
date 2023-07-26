<?php
    header('Content-Type: application/json');
    
    require_once 'models/planos.php';

    $data = new getPlanos();

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $jsonData = $data -> getAllData();
        echo json_encode($jsonData);
    } else {
        http_response_code(405);
        echo json_encode(['message' => 'Método não permitido']);
    }
?>