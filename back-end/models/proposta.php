<?php
    class postProposta {
        private $data;
        private $filePath;

        public function __construct($filePath) {
            $this -> filePath = $filePath;
            $jsonData = file_get_contents($this -> filePath);
            $this -> data = json_decode($jsonData);
        }

        public function getAllData() {
            return $this -> data;
        }

        public function addData($newData) {
            $this -> data[] = $newData;
            $jsonData = json_encode($this -> data, JSON_PRETTY_PRINT);
            file_put_contents($this -> filePath, $jsonData);
            return true;
        }
    }
?>