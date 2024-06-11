<?php
class indexController {
    public function __construct(
        private $conexao = null,
        //private $clientes = null,
        private $carros = null
    ) {
        $this->conexao = Conexao::getInstancia();
       // $clienteDAO = new ClienteDAO(db: $this->conexao);
       // $this->clientes = $clienteDAO->buscarTodosClientes();
        $carroDAO = new CarroDAO(db: $this->conexao);
        $this->carros = $carroDAO->buscarTodosCarros();
    }

    public function index() {
        //$clientes = $this->clientes;
        $carros = $this->carros;

        require_once "views/index.php";
    }
}
?>
