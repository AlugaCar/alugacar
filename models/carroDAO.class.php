<?php
class CarroDAO {
    public function __construct(
        private $db = null
    ){}

    public function buscarCarroPorId($id_carro) {
        $sql = "SELECT * FROM carro WHERE id_carro = ?";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $id_carro);
            $stm->execute();
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "Erro, Message: {$e->getMessage()}\n Code:{$e->getCode()}";
        }
    }

    public function cadastrarCarro($carro) {
        $sql = "
            INSERT INTO carro (modelo, marca, cor, placa, valor_locacao) VALUES (?, ?, ?, ?, ?)
        ";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $carro->getModelo());
            $stm->bindValue(2, $carro->getMarca());
            $stm->bindValue(3, $carro->getCor());
            $stm->bindValue(4, $carro->getPlaca());
            $stm->bindValue(5, $carro->getValorLocacao());
            $stm->execute();
            $this->db = null;
            return true;
        } catch (PDOException $e) {
            return "Erro, Message: {$e->getMessage()}\n Code:{$e->getCode()}";
        }
    }
    public function buscarTodosCarros() {
        $sql = "SELECT * FROM carro";
        try {
            $stm = $this->db->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "Erro, Message: {$e->getMessage()}\n Code:{$e->getCode()}";
        }
    }
}
?>
