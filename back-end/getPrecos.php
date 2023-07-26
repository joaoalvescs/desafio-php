<?php
    header('Content-Type: application/json');
    
    require_once 'models/precos.php';

    $data = new getPrecos();

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $jsonData = $data -> getAllData();
        echo json_encode($jsonData);
    } else {
        http_response_code(405);
        echo json_encode(['message' => 'Método não permitido']);
    }
?>