<?php
class EnderecoDAO {
    public function __construct(
        private $db = null
    ){}

    public function buscarEnderecosPorCliente($id_cliente) {
        $sql = "SELECT * FROM endereco WHERE id_cliente = ?";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $id_cliente);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "Erro, Message: {$e->getMessage()}\n Code:{$e->getCode()}";
        }
    }

    public function cadastrarEndereco($endereco) {
        $sql = "
            INSERT INTO endereco (cep, numero, complemento, id_cliente) VALUES (?, ?, ?, ?)
        ";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $endereco->getCep());
            $stm->bindValue(2, $endereco->getNumero());
            $stm->bindValue(3, $endereco->getComplemento());
            $stm->bindValue(4, $endereco->getIdCliente());
            $stm->execute();
            $this->db = null;
            return true;
        } catch (PDOException $e) {
            return "Erro, Message: {$e->getMessage()}\n Code:{$e->getCode()}";
        }
    }
}
?>
