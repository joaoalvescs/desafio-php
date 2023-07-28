<?php
    class Beneficiario {
        private $nome;
        private $idade;
        private $plano;

        public function __construct($nome, $idade, $plano) {
            $this -> nome = $nome;
            $this -> idade = $idade;
            $this -> plano = $plano;
        }

        public function getNome() {
            return $this -> nome;
        }

        public function getIdade() {
            return $this -> idade;
        }

        public function getPlano() {
            return $this -> plano;
        }

        public function setNome($nome) {
            $this -> nome = $nome;
        }

        public function setIdade($idade) {
            $this -> idade = $idade;
        }

        public function setPlano($plano) {
            $this -> plano = $plano;
        }
    }