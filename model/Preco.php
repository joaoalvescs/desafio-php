<?php 
    class Preco {
        private $codigo;
        private $minimoVidas;
        private $faixa1;
        private $faixa2;
        private $faixa3;
    
        public function __construct($codigo, $minimoVidas, $faixa1, $faixa2, $faixa3) {
            $this -> codigo = $codigo;
            $this -> minimoVidas = $minimoVidas;
            $this -> faixa1 = $faixa1;
            $this -> faixa2 = $faixa2;
            $this -> faixa3 = $faixa3;
        }

        public function getCodigo() {
            return $this -> codigo;
        }

        public function getMinimoVidas() {
            return $this -> minimoVidas;
        }

        public function getFaixa1() {
            return $this -> faixa1;
        }

        public function getFaixa2() {
            return $this -> faixa2;
        }

        public function getFaixa3() {
            return $this -> faixa3;
        }

        public function setCodigo() {
            return $this -> codigo;
        }

        public function setMinimoVidas($minimoVidas) {
            $this -> minimoVidas = $minimoVidas;
        }

        public function setFaixa1($faixa1) {
            $this -> faixa1 = $faixa1;
        }

        public function setFaixa2($faixa2) {
            $this -> faixa2 = $faixa2;
        }

        public function setFaixa3($faixa3) {
            $this -> faixa3 = $faixa3;
        }
    }