<?php
    class Plano {
        private $registro;
        private $nome;
        private $codigo;

        public function __construction($registro, $nome, $codigo) {
            $this -> registro = $registro;
            $this -> nome = $nome;
            $this -> codigo = $codigo;
        }

        public function getRegistro() {
            return $this -> registro;
        }

        public function getNome() {
            return $this -> nome;
        }

        public function getCodigo() {
            return $this -> codigo;
        }

        public function setRegistro($registro) {
            $this -> registro = $registro;
        }

        public function setNome($nome) {
            $this -> nome = $nome;
        }

        public function setCodigo($codigo) {
            $this -> codigo = $codigo;
        }
    }