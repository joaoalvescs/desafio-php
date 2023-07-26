<?php
    class getPlanos {
        private $data;

        public function __construct() {
            $jsonData = file_get_contents(__DIR__ . '/../data/plans.json');
            $this -> data = json_decode($jsonData);
        }

        public function getAllData() {
            return $this -> data;
        }
    }
?>