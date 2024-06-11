<?php
class Carro {
    public function __construct(
        private int $id_carro = 0,
        private string $descritivo = "",
        private string $marca = "",
        private string $modelo = "",
        private string $img = "",
        private float $preco_dia = 0.0,
        private int $id_locacao = 0
    ){}

    public function getIdCarro() {
        return $this->id_carro;
    }

    public function setIdCarro($id_carro) {
        $this->id_carro = $id_carro;
    }

    public function getDescritivo() {
        return $this->descritivo;
    }

    public function setDescritivo($descritivo) {
        $this->descritivo = $descritivo;
    }

    public function getMarca() {
        return $this->marca;
    }

    public function setMarca($marca) {
        $this->marca = $marca;
    }

    public function getModelo() {
        return $this->modelo;
    }

    public function setModelo($modelo) {
        $this->modelo = $modelo;
    }

    public function getImg() {
        return $this->img;
    }

    public function setImg($img) {
        $this->img = $img;
    }

    public function getPrecoDia() {
        return $this->preco_dia;
    }

    public function setPrecoDia($preco_dia) {
        $this->preco_dia = $preco_dia;
    }

    public function getIdLocacao() {
        return $this->id_locacao;
    }

    public function setIdLocacao($id_locacao) {
        $this->id_locacao = $id_locacao;
    }
}
?>
