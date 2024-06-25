<?php
class ClienteDAO {
    public function __construct(
        private $db = null
    ){}

    public function bucarEmailCliente($cliente, $args) {
        $erro = false;
        $sql = "SELECT email FROM cliente WHERE email = ?";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $cliente->getEmail());
            $stm->execute();
            $this->db = null;

            $email = $stm->fetch(PDO::FETCH_OBJ);
            
            if($args == 'login') {
                if(is_object($email)) {
                    return false;
                } else {
                    return array(
                        "erro" => true,
                        "msg" => "E-mail não encontrado."
                    );
                }
            }

            if($args == 'cadastro') {
                if(is_object($email)) {
                    return array(
                        "erro" => true,
                        "msg" => "E-mail já cadastrado, use outro email ou faça:<a class='nav-link text-dark' href='http://localhost/Trufarly.com.br/login'>Login</a>"
                    );
                } else {
                    return true;
                }
            }

        } catch (PDOException $e) {
            echo "Erro, Message: {$e->getMessage()}\n Code:{$e->getCode()}";
        }
    }

    public function buscarSenhaCliente($cliente) {
        $sql = "SELECT password FROM cliente WHERE email = ?";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $cliente->getEmail());
            $stm->execute();

            $password = $stm->fetch(PDO::FETCH_OBJ);
            $password = $password->password;

            $validacao = $cliente->passwordVerify($password);

            if($validacao) {
                $cliente = $this->buscarDadosCliente($cliente);
                $this->db = null;

                 if(is_object($cliente)) {
                    
                    $_SESSION["id_cliente"] = $cliente->id_cliente;
                    $_SESSION["nome"] = $cliente->nome;
                    $_SESSION["email"] = $cliente->email;
                    $_SESSION["logado"] = true;
                }

            } else {
                $this->db = null;
                return array(
                    "erro" => true,
                    "msg" => "Credenciais não são válidas."
                );
            }

        } catch (PDOException $e) {
            echo "Erro, Message: {$e->getMessage()}\n Code:{$e->getCode()}";
        }
    }

    public function buscarDadosCliente($cliente) {
        $sql = "
            SELECT id_cliente, nome, email 
            FROM cliente 
            WHERE email = ?
        ";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $cliente->getEmail());
            $stm->execute();
            $this->db = null;
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "Erro, Message: {$e->getMessage()}\n Code:{$e->getCode()}";
        }
    }

    public function bucarPerfilCliente($cliente){
        $sql = "
                SELECT nome, email, nome, sexo, datan, cpf_cnpj
                from cliente 
                where email = ?
            ";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $cliente->getEmail());
            $stm->execute();
            $this->db = null;
            return $stm->Fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "Erro, Message: {$e->getMessage()}\n Code:{$e->getCode()}";
        }
    }

    public function cadastrarClienteBasico($cliente) {
        $sql = "
            INSERT INTO cliente (nome, email, password) VALUES (?, ?, ?)
        ";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $cliente->getNome());
            $stm->bindValue(2, $cliente->getEmail());
            $stm->bindValue(3, $cliente->getpassword());
            $stm->execute();
            $this->db = null;
            return true;
        } catch (PDOException $e) {
            return "Erro, Message: {$e->getMessage()}\n Code:{$e->getCode()}";
        }
    }
    public function buscarTodosClientes() {
        $sql = "SELECT * FROM cliente";
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
