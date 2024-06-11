<?php
class FormaPagamentoDAO {
    public function __construct(
        private $db = null
    ){}

    public function buscarFormaPagamento($id_fp) {
        $sql = "SELECT * FROM forma_pagamento WHERE id_fp = ?";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $id_fp);
            $stm->execute();
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "Erro, Message: {$e->getMessage()}\n Code:{$e->getCode()}";
        }
    }

    public function cadastrarFormaPagamento($forma_pagamento) {
        $sql = "
            INSERT INTO forma_pagamento (descritivo) VALUES (?)
        ";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $forma_pagamento->getDescritivo());
            $stm->execute();
            $this->db = null;
            return true;
        } catch (PDOException $e) {
            return "Erro, Message: {$e->getMessage()}\n Code:{$e->getCode()}";
        }
    }
}
?>
