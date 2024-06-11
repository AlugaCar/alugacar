<?php
class FormaPagamento {
    public function __construct(
        private int $id_fp = 0,
        private string $descritivo = ""
    ){}

    public function getIdFp() {
        return $this->id_fp;
    }

    public function setIdFp($id_fp) {
        $this->id_fp = $id_fp;
    }

    public function getDescritivo() {
        return $this->descritivo;
    }

    public function setDescritivo($descritivo) {
        $this->descritivo = $descritivo;
    }
}
?>
