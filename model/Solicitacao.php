<?php 

    class Solicitacao{
        
        private $codigo;
        private $datasolicitacao;
        private $latitude;
        private $longitude;
        private $tipo;
        private $comentario;
        private $foisolucionado;
        private $userid;
        private $imagem;


        public function __construct($data, $latitude, $longitude, $tipo, $comentario, $foisolucionado, $userid){
            $this->datasolicitacao = $data;
            $this->latitude = $latitude;
            $this->longitude = $longitude;
            $this->tipo = $tipo;
            $this->comentario = $comentario;
            $this->foisolucionado = $foisolucionado;
            $this->userid = $userid;
        }

        /**
         * @return mixed
         */
        public function getDatasolicitacao()
        {
            return $this->datasolicitacao;
        }

        /**
         * @param mixed $datasolicitacao
         */
        public function setDatasolicitacao($datasolicitacao)
        {
            $this->datasolicitacao = $datasolicitacao;
        }


        public function getCodigo(){
            return $this->codigo;
        }

        public function setCodigo($cod){
            $this->codigo = $cod;
        }

        public function getLatitude(){
            return $this->latitude;
        }

        public function setLatitude($lat){
            $this->latitude = $lat;
        }

        public function getLongitude(){
            return $this->longitude;
        }

        public function setLongitude($lon){
            $this->longitude = $lon;
        }

        public function getTipo(){
            return $this->tipo;
        }

        public function setTipo($tp){
            $this->tipo = $tp;
        }

        public function getComentario(){
            return $this->comentario;
        }

        public function setComentario($com){
            $this->comentario = $com;
        }

        public function getSolucionado(){
            return $this->foisolucionado;
        }

        public function setSolucionado($sol){
            $this->foisolucionado = $sol;
        }

        public function getUserId(){
            return $this->userid;
        }

        public function setUserId($userid){
            $this->userid = $userid;
        }

        /**
         * @return mixed
         */
        public function getFoisolucionado()
        {
            return $this->foisolucionado;
        }

        /**
         * @param mixed $foisolucionado
         */
        public function setFoisolucionado($foisolucionado)
        {
            $this->foisolucionado = $foisolucionado;
        }

        /**
         * @return mixed
         */
        public function getImagem()
        {
            return $this->imagem;
        }

        /**
         * @param mixed $imagem
         */
        public function setImagem($imagem)
        {
            $this->imagem = $imagem;
        }



    }
?>
