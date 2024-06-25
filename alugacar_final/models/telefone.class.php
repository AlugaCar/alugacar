<?php
class Telefone {
    public function __construct(
        private int $id_telefone = 0,
        private int $ddd = 0,
        private string $numero = "",
        private int $id_cliente = 0,
        
    ){}

    public function getIdTelefone() {
        return $this->id_telefone;
    }

    public function setIdTelefone($id_telefone) {
        $this->id_telefone = $id_telefone;
    }

    public function getDdd() {
        return $this->ddd;
    }

    public function setDdd($ddd) {
        $this->ddd = $ddd;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }

    public function getIdCliente() {
        return $this->id_cliente;
    }

    public function setIdCliente($id_cliente) {
        $this->id_cliente = $id_cliente;
    }
}
?>
