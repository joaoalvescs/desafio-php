<?php
    class Proposta {
        private $beneficiarios;
        private $planoEscolhido;

        public function __construct($beneficiarios, $planoEscolhido) {
            $this -> beneficiarios = $beneficiarios;
            $this -> planoEscolhido = $planoEscolhido;
        }

        public function getBeneficiarios() {
            return $this -> beneficiarios;
        }

        public function getPlanoEscolhido() {
            return $this -> planoEscolhido;
        }

        public function setBeneficiarios($beneficiarios) {
            $this -> beneficiarios = $beneficiarios;
        }

        public function setPlanoEscolhido($planoEscolhido) {
            $this -> planoEscolhido = $planoEscolhido;
        }
    }
