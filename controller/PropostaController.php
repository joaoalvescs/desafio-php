<?php
require_once 'model/Plano.php';
require_once 'model/Preco.php';
require_once 'model/Beneficiario.php';
require_once 'model/Proposta.php';

class PropostaController {
    private $planos;
    private $precos;

    public function __construct() {
        $this -> planos = $this->loadData('/../data/plans.json', 'Plano');
        $this -> precos = $this->loadData('/../data/price.json', 'Preco');
    }

    private function loadData($file, $className) {
        $data = file_get_contents($file);
        $data = json_decode($data, true);
        $objects = [];
        foreach ($data as $item) {
            $objects[] = new $className(...array_values($item));
        }
        return $objects;
    }

    public function processarProposta($beneficiarios, $planoEscolhido) {
        $proposta = new Proposta([], null);

        foreach ($beneficiarios as $beneficiario) {
            $precoBeneficiario = $this -> calcularPrecoBeneficiario($beneficiario -> getIdade(), $planoEscolhido);
            if ($precoBeneficiario === null) {
                return null; // Erro: Plano ou idade inválida
            }
            $beneficiario -> setPreco($precoBeneficiario);
            $proposta -> getBeneficiarios[] = $beneficiario;
        }

        $proposta -> setPlanoEscolhido($planoEscolhido);
        return $proposta;
    }

    private function calcularPrecoBeneficiario($idade, $planoEscolhido) {
        foreach ($this -> precos as $preco) {
            if ($preco -> getCodigo() === $planoEscolhido && $idade >= $preco -> getMinimoVidas()) {
                if ($idade <= 17) {
                    return $preco -> getFaixa1();
                } elseif ($idade <= 40) {
                    return $preco -> getFaixa2();
                } else {
                    return $preco -> getFaixa3();
                }
            }
        }
        return null; // Erro: Plano ou idade não encontrada nos preços
    }
}
?>
