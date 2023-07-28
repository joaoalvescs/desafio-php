<?php
    require_once 'controller/PropostaController.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $planoEscolhido = isset($_POST['planoEscolhido']) ? $_POST['planoEscolhido'] : null;
        $nomes = $_POST['nome'] ?? [];
        $idades = $_POST['idade'] ?? [];

        if ($planoEscolhido === null || empty($nomes) || empty($idades)) {
            http_response_code(400);
            echo json_encode(array('error' => 'Todos os campos devem ser preenchidos.'));
            exit();
        }

        
        $beneficiarios = [];
        for ($i = 0; $i < count($nomes); $i++) {
            $nome = $nomes[$i];
            $idade = $idades[$i];
            $beneficiario = new Beneficiario($nome, $idade, $planoEscolhido);
            $beneficiarios[] = $beneficiario;
        }

        $propostaController = new PropostaController();
        $proposta = $propostaController->processarProposta($beneficiarios, $planoEscolhido);

        if ($proposta === null) {
            http_response_code(400);
            echo json_encode(array('error' => 'Plano ou idade inválida.'));
            exit();
        }

        $propostaJson = json_encode($proposta, JSON_PRETTY_PRINT);
        file_put_contents('proposta.json', $propostaJson);

        echo $propostaJson;
    } else {
        http_response_code(405);
        echo json_encode(array('error' => 'Método não permitido.'));
    }
?>