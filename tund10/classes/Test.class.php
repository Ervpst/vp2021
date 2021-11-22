<?php
    class Test {
        //muutujad ehk properties
        private $secret_value = 7;
        public $non_secret_value = 9;
        private $received_secret;
        
        //funktsioonid ehk methods
        function __construct($received_value) {
            echo " Klass hakkas t��le! ";
            $this->received_secret = $this->secret_value * $received_value;
            echo " Saabunud v��rtuse korrutis salajase arvuga on: " . $this->received_secret;
            $this->multiply();
        }
        
        function __destruct() {
            echo " Klass l�petas! ";
        }
        
        private function multiply(){
            echo " Teine korrutis on: " .$this->secret_value * $this->non_secret_value;
        }
        
        public function reveal(){
            echo " Salajane muutuja v��rtus on: " .$this->secret_value;
        }
        
    }//klassi l�pp