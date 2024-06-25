<?php
// Configuração da conexão com o banco de dados
class Database {
    private $host = "localhost";
    private $db_name = "alugacar";
    private $username = "root";
    private $password = "";
    public $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch(PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}

// Definição das classes

// Cliente
class Cliente {
    private $conn;
    private $table_name = "cliente";

    public $id_ussuario;
    public $nome;
    public $sexo;
    public $datan;
    public $cpf_cnpj;
    public $email;
    public $password;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Create
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET id_ussuario=:id_ussuario, nome=:nome, sexo=:sexo, datan=:datan, cpf_cnpj=:cpf_cnpj, email=:email, password=:password";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id_ussuario", $this->id_ussuario);
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":sexo", $this->sexo);
        $stmt->bindParam(":datan", $this->datan);
        $stmt->bindParam(":cpf_cnpj", $this->cpf_cnpj);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":password", $this->password);

        if($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Read
    public function read() {
        $query = "SELECT * FROM " . $this->table_name;

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    // Update
    public function update() {
        $query = "UPDATE " . $this->table_name . " SET nome=:nome, sexo=:sexo, datan=:datan, cpf_cnpj=:cpf_cnpj, email=:email, password=:password WHERE id_ussuario=:id_ussuario";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id_ussuario", $this->id_ussuario);
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":sexo", $this->sexo);
        $stmt->bindParam(":datan", $this->datan);
        $stmt->bindParam(":cpf_cnpj", $this->cpf_cnpj);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":password", $this->password);

        if($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Delete
    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id_ussuario=:id_ussuario";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id_ussuario", $this->id_ussuario);

        if($stmt->execute()) {
            return true;
        }

        return false;
    }
}

// Endereco
class Endereco {
    private $conn;
    private $table_name = "endereco";

    public $id_endereco;
    public $numero;
    public $cep;
    public $complemento;
    public $id_ussuario;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Create
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET id_endereco=:id_endereco, numero=:numero, cep=:cep, complemento=:complemento, id_ussuario=:id_ussuario";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id_endereco", $this->id_endereco);
        $stmt->bindParam(":numero", $this->numero);
        $stmt->bindParam(":cep", $this->cep);
        $stmt->bindParam(":complemento", $this->complemento);
        $stmt->bindParam(":id_ussuario", $this->id_ussuario);

        if($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Read
    public function read() {
        $query = "SELECT * FROM " . $this->table_name;

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    // Update
    public function update() {
        $query = "UPDATE " . $this->table_name . " SET numero=:numero, cep=:cep, complemento=:complemento WHERE id_endereco=:id_endereco";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id_endereco", $this->id_endereco);
        $stmt->bindParam(":numero", $this->numero);
        $stmt->bindParam(":cep", $this->cep);
        $stmt->bindParam(":complemento", $this->complemento);

        if($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Delete
    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id_endereco=:id_endereco";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id_endereco", $this->id_endereco);

        if($stmt->execute()) {
            return true;
        }

        return false;
    }
}

// Telefone
class Telefone {
    private $conn;
    private $table_name = "telefone";

    public $id_telefone;
    public $numero;
    public $dd;
    public $id_ussuario;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Create
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET id_telefone=:id_telefone, numero=:numero, dd=:dd, id_ussuario=:id_ussuario";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id_telefone", $this->id_telefone);
        $stmt->bindParam(":numero", $this->numero);
        $stmt->bindParam(":dd", $this->dd);
        $stmt->bindParam(":id_ussuario", $this->id_ussuario);

        if($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Read
    public function read() {
        $query = "SELECT * FROM " . $this->table_name;

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    // Update
    public function update() {
        $query = "UPDATE " . $this->table_name . " SET numero=:numero, dd=:dd WHERE id_telefone=:id_telefone";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id_telefone", $this->id_telefone);
        $stmt->bindParam(":numero", $this->numero);
        $stmt->bindParam(":dd", $this->dd);

        if($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Delete
    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id_telefone=:id_telefone";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id_telefone", $this->id_telefone);

        if($stmt->execute()) {
            return true;
        }

        return false;
    }
}

// Carro
class Carro {
    private $conn;
    private $table_name = "carro";

    public $id_carros;
    public $descritivo;
    public $marca;
    public $preco_dia;
    public $img;
    public $modelo;
    public $id_locacao;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Create
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET id_carros=:id_carros, descritivo=:descritivo, marca=:marca, preco_dia=:preco_dia, img=:img, modelo=:modelo, id_locacao=:id_locacao";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id_carros", $this->id_carros);
        $stmt->bindParam(":descritivo", $this->descritivo);
        $stmt->bindParam(":marca", $this->marca);
        $stmt->bindParam(":preco_dia", $this->preco_dia);
        $stmt->bindParam(":img", $this->img);
        $stmt->bindParam(":modelo", $this->modelo);
        $stmt->bindParam(":id_locacao", $this->id_locacao);

        if($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Read
    public function read() {
        $query = "SELECT * FROM " . $this->table_name;

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    // Update
    public function update() {
        $query = "UPDATE " . $this->table_name . " SET descritivo=:descritivo, marca=:marca, preco_dia=:preco_dia, img=:img, modelo=:modelo, id_locacao=:id_locacao WHERE id_carros=:id_carros";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id_carros", $this->id_carros);
        $stmt->bindParam(":descritivo", $this->descritivo);
        $stmt->bindParam(":marca", $this->marca);
        $stmt->bindParam(":preco_dia", $this->preco_dia);
        $stmt->bindParam(":img", $this->img);
        $stmt->bindParam(":modelo", $this->modelo);
        $stmt->bindParam(":id_locacao", $this->id_locacao);

        if($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Delete
    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id_carros=:id_carros";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id_carros", $this->id_carros);

        if($stmt->execute()) {
            return true;
        }

        return false;
    }
}

// FormaPagamento
class FormaPagamento {
    private $conn;
    private $table_name = "forma_pagamento";

    public $id_fp;
    public $descritivo;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Create
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET id_fp=:id_fp, descritivo=:descritivo";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id_fp", $this->id_fp);
        $stmt->bindParam(":descritivo", $this->descritivo);

        if($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Read
    public function read() {
        $query = "SELECT * FROM " . $this->table_name;

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    // Update
    public function update() {
        $query = "UPDATE " . $this->table_name . " SET descritivo=:descritivo WHERE id_fp=:id_fp";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id_fp", $this->id_fp);
        $stmt->bindParam(":descritivo", $this->descritivo);

        if($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Delete
    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id_fp=:id_fp";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id_fp", $this->id_fp);

        if($stmt->execute()) {
            return true;
        }

        return false;
    }
}

// Locacao
class Locacao {
    private $conn;
    private $table_name = "locacao";

    public $id_locacao;
    public $data_locacao;
    public $status_locacao;
    public $id_fp;
    public $id_ussuario;
    public $qtd;
    public $valor_locacao;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Create
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET id_locacao=:id_locacao, data_locacao=:data_locacao, status_locacao=:status_locacao, id_fp=:id_fp, id_ussuario=:id_ussuario, qtd=:qtd, valor_locacao=:valor_locacao";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id_locacao", $this->id_locacao);
        $stmt->bindParam(":data_locacao", $this->data_locacao);
        $stmt->bindParam(":status_locacao", $this->status_locacao);
        $stmt->bindParam(":id_fp", $this->id_fp);
        $stmt->bindParam(":id_ussuario", $this->id_ussuario);
        $stmt->bindParam(":qtd", $this->qtd);
        $stmt->bindParam(":valor_locacao", $this->valor_locacao);

        if($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Read
    public function read() {
        $query = "SELECT * FROM " . $this->table_name;

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    // Update
    public function update() {
        $query = "UPDATE " . $this->table_name . " SET data_locacao=:data_locacao, status_locacao=:status_locacao, id_fp=:id_fp, id_ussuario=:id_ussuario, qtd=:qtd, valor_locacao=:valor_locacao WHERE id_locacao=:id_locacao";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id_locacao", $this->id_locacao);
        $stmt->bindParam(":data_locacao", $this->data_locacao);
        $stmt->bindParam(":status_locacao", $this->status_locacao);
        $stmt->bindParam(":id_fp", $this->id_fp);
        $stmt->bindParam(":id_ussuario", $this->id_ussuario);
        $stmt->bindParam(":qtd", $this->qtd);
        $stmt->bindParam(":valor_locacao", $this->valor_locacao);

        if($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Delete
    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id_locacao=:id_locacao";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id_locacao", $this->id_locacao);

        if($stmt->execute()) {
            return true;
        }

        return false;
    }
}

// Configuração do banco de dados e exemplos de uso
$database = new Database();
$db = $database->getConnection();

// Exemplo para Cliente
/*
$cliente = new Cliente($db);
$cliente->id_ussuario = '1';
$cliente->nome = 'John Doe';
$cliente->sexo = 'M';
$cliente->datan = '1980-01-01';
$cliente->cpf_cnpj = '12345678901';
$cliente->email = 'john@example.com';
$cliente->password = 'password123'; */

// Criar novo cliente
if($cliente->create()) {
    echo "Cliente criado com sucesso.<br>";
} else {
    echo "Não foi possível criar o cliente.<br>";
}

// Ler clientes
$stmt = $cliente->read();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    extract($row);
    echo "ID: {$id_ussuario} - Nome: {$nome} - Email: {$email}<br>";
}

// Exemplo para Endereco
/*
$endereco = new Endereco($db);
$endereco->id_endereco = '1';
$endereco->numero = '123';
$endereco->cep = '12345678';
$endereco->complemento = 'Apt 4';
$endereco->id_ussuario = '1'; */

// Criar novo endereço
if($endereco->create()) {
    echo "Endereço criado com sucesso.<br>";
} else {
    echo "Não foi possível criar o endereço.<br>";
}

// Ler endereços
$stmt = $endereco->read();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    extract($row);
    echo "ID: {$id_endereco} - CEP: {$cep} - Número: {$numero}<br>";
}

// Exemplo para Telefone
/*
$telefone = new Telefone($db);
$telefone->id_telefone = '1';
$telefone->numero = '987654321';
$telefone->dd = '11';
$telefone->id_ussuario = '1'; */

// Criar novo telefone
if($telefone->create()) {
    echo "Telefone criado com sucesso.<br>";
} else {
    echo "Não foi possível criar o telefone.<br>";
}

// Ler telefones
$stmt = $telefone->read();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    extract($row);
    echo "ID: {$id_telefone} - Número: {$numero}<br>";
}

// Exemplo para Carro
/*
$carro = new Carro($db);
$carro->id_carros = '1';
$carro->descritivo = 'Carro esportivo';
$carro->marca = 'Ferrari';
$carro->preco_dia = '1000';
$carro->img = 'ferrari.jpg';
$carro->modelo = 'F8';
$carro->id_locacao = '1'; */

// Criar novo carro
if($carro->create()) {
    echo "Carro criado com sucesso.<br>";
} else {
    echo "Não foi possível criar o carro.<br>";
}

// Ler carros
$stmt = $carro->read();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    extract($row);
    echo "ID: {$id_carros} - Descritivo: {$descritivo} - Marca: {$marca}<br>";
}

// Exemplo para FormaPagamento
/*
$forma_pagamento = new FormaPagamento($db);
$forma_pagamento->id_fp = '1';
$forma_pagamento->descritivo = 'Cartão de crédito'; */

// Criar nova forma de pagamento
if($forma_pagamento->create()) {
    echo "Forma de pagamento criada com sucesso.<br>";
} else {
    echo "Não foi possível criar a forma de pagamento.<br>";
}

// Ler formas de pagamento
$stmt = $forma_pagamento->read();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    extract($row);
    echo "ID: {$id_fp} - Descritivo: {$descritivo}<br>";
}

// Exemplo para Locacao
/*
$locacao = new Locacao($db);
$locacao->id_locacao = '1';
$locacao->data_locacao = '2024-06-01';
$locacao->status_locacao = 'Ativa';
$locacao->id_fp = '1';
$locacao->id_ussuario = '1';
$locacao->qtd = '3';
$locacao->valor_locacao = '3000'; */

// Criar nova locação
if($locacao->create()) {
    echo "Locação criada com sucesso.<br>";
} else {
    echo "Não foi possível criar a locação.<br>";
}

// Ler locações
$stmt = $locacao->read();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    extract($row);
    echo "ID: {$id_locacao} - Data: {$data_locacao} - Valor: {$valor_locacao}<br>";
}
?>
