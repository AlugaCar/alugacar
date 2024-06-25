<?php
class TelefoneDAO {
    public function __construct(
        private $db = null
    ){}

    public function buscarTelefonesPorCliente($id_cliente) {
        $sql = "SELECT * FROM telefone WHERE id_cliente = ?";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $id_cliente);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "Erro, Message: {$e->getMessage()}\n Code:{$e->getCode()}";
        }
    }

    public function cadastrarTelefone($telefone) {
        $sql = "
            INSERT INTO telefone (ddd, numero, id_cliente) VALUES (?, ?, ?)
        ";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $telefone->getDdd());
            $stm->bindValue(2, $telefone->getNumero());
            $stm->bindValue(3, $telefone->getIdCliente());
            $stm->execute();
            $this->db = null;
            return true;
        } catch (PDOException $e) {
            return "Erro, Message: {$e->getMessage()}\n Code:{$e->getCode()}";
        }
    }
}
?>
