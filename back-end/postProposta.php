<?php
    $data = [
        [
            "registro" => "reg1",
            "nome" => "Bitix Customer Plano 1",
            "codigo" => 1
        ],
    ];

    // Convertendo o array em uma string JSON
    $jsonString = json_encode($data, JSON_PRETTY_PRINT);

    $filename= 'dados.json';

    if (file_put_contents($filename, $jsonString) !== false) {
        echo "Arquivo JSON criado com sucesso!";
    } else {
        echo "Erro ao criar arquivo JSON";
    }
?>