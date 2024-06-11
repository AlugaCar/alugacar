<?php
class LocacaoDAO {
    public function __construct(
        private $db = null
    ){}

    public function buscarLocacaoPorCliente($id_cliente) {
        $sql = "SELECT * FROM locacao WHERE id_cliente = ?";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $id_cliente);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "Erro, Message: {$e->getMessage()}\n Code:{$e->getCode()}";
        }
    }

    public function cadastrarLocacao($locacao) {
        $sql = "
            INSERT INTO locacao (data_locacao, status_locacao, id_fp, id_cliente, quantidade, valor_locacao) VALUES (?, ?, ?, ?, ?, ?)
        ";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $locacao->getDataLocacao());
            $stm->bindValue(2, $locacao->getStatusLocacao());
            $stm->bindValue(3, $locacao->getIdFp());
            $stm->bindValue(4, $locacao->getIdCliente());
            $stm->bindValue(5, $locacao->getQuantidade());
            $stm->bindValue(6, $locacao->getValorLocacao());
            $stm->execute();
            $this->db = null;
            return true;
        } catch (PDOException $e) {
            return "Erro, Message: {$e->getMessage()}\n Code:{$e->getCode()}";
        }
    }
}
?>
