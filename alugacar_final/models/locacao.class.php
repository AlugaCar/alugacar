<?php
class Locacao {
    public function __construct(
        private int $id_locacao = 0,
        private string $data_locacao = "",
        private string $status_locacao = "",
        private int $id_fp = 0, 
        private int $id_cliente = 0, 
        private int $id_carro = 0,
        private int $quantidade = 0,
        private float $valor_locacao = 0.0
    ){}

    public function getIdLocacao() {
        return $this->id_locacao;
    }

    public function setIdLocacao($id_locacao) {
        $this->id_locacao = $id_locacao;
    }

    public function getDataLocacao() {
        return $this->data_locacao;
    }

    public function setDataLocacao($data_locacao) {
        $this->data_locacao = $data_locacao;
    }

    public function getStatusLocacao() {
        return $this->status_locacao;
    }

    public function setStatusLocacao($status_locacao) {
        $this->status_locacao = $status_locacao;
    }

    public function getIdFp() {
        return $this->id_fp;
    }

    public function setIdFp($id_fp) {
        $this->id_fp = $id_fp;
    }

    public function getIdCliente() {
        return $this->id_cliente;
    }

    public function setIdcliente($id_cliente) {
        $this->id_cliente = $id_cliente;
    }
    public function getIdCarro() {
        return $this->id_carro;
    }

    public function setIdcarro($id_carro) {
        $this->id_carro = $id_carro;
    }

    public function getQuantidade() {
        return $this->quantidade;
    }

    public function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }

    public function getValorLocacao() {
        return $this->valor_locacao;
    }

    public function setValorLocacao($valor_locacao) {
        $this->valor_locacao = $valor_locacao;
    }
    
}
?>
