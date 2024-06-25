<?php
class indexController {
    public function __construct(
        private $conexao = null
    ) {
        $this->conexao = Conexao::getInstancia();
    }

    public function index() {
        $carroDAO = new CarroDAO(db: $this->conexao);
        $carros = $carroDAO->buscarTodosCarros();

        require_once "views/index.php";
    }
    
}
?>
