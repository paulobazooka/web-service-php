<?php 

    class Solicitacao{
        
        private $codigo;
        private $data;
        private $latitude;
        private $longitude;
        private $tipo;
        private $comentario;
        private $foisolucionado;


        public function __construct($data, $latitude, $longitude, $tipo, $comentario, $foisolucionado){
            $this->data = $data;
            $this->latitude = $latitude;
            $this->longitude = $longitude;
            $this->tipo = $tipo;
            $this->comentario = $comentario;        
        }

        public function getCodigo(){
            return $this->$codigo;
        }

        public function setCodigo($cod){
            $this->$codigo = $cod;
        }

        public function getData(){
            return $this->$data;
        }

        public function setData($dt){
            $this->$data = $dt;
        }

        public function getLatitude(){
            return $this->$latitude;
        }

        public function setLatitude($lat){
            $this->$latitude = $lat;
        }

        public function getLongitude(){
            return $this->$longitude;
        }

        public function setLongitude($lon){
            $this->$longitude = $lon;
        }

        public function getTipo(){
            return $this->$tipo;
        }

        public function setTipo($tp){
            $this->$tipo = $tp;
        }

        public function getComentario(){
            return $this->$comentario;
        }

        public function setComentario($com){
            $this->$comentario = $com;
        }

        public function getSolucionado(){
            return $this->$foisolucionado;
        }

        public function setSolucionado($sol){
            $this->$foisolucionado = $sol;
        }

    }
?>