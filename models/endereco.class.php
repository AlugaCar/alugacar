<?php
class Endereco {
    public function __construct(
        private int $id_endereco = 0,
        private string $cep = "",
        private string $numero = "",
        private string $complemento = "",
        private int $id_cliente = 0
    ){}

    public function getIdEndereco() {
        return $this->id_endereco;
    }

    public function setIdEndereco($id_endereco) {
        $this->id_endereco = $id_endereco;
    }

    public function getCep() {
        return $this->cep;
    }

    public function setCep($cep) {
        $this->cep = $cep;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }

    public function getComplemento() {
        return $this->complemento;
    }

    public function setComplemento($complemento) {
        $this->complemento = $complemento;
    }

    public function getIdCliente() {
        return $this->id_cliente;
    }

    public function setIdCliente($id_cliente) {
        $this->id_cliente = $id_cliente;
    }
}
?>
