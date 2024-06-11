<?php
    class headerController{
        public function __construct(
            private $conexao = null
        ){
            $this->conexao = Conexao::getInstancia();
        }

       //public function getMarca()
        //{
          //  $carroDAO = new carroDAO(db: $this->conexao);
            //return $carros = $carroDAO->buscarTodosCarros();
       // }
    }
?>