<?php
class Cliente {
    public function __construct(
        private int $id_cliente = 0,
        private string $nome = "",
        private string $sexo = "",
        private string $datan = "",
        private string $cpf_cnpj = "",
        private string $email = "",
        private string $password = "",
        private array $telefones = array(),
        private array $enderecos = array()
    ){}

    public function getid_cliente() {
        return $this->id_cliente;
    }

    public function setid_cliente($id_cliente) {
        $this->id_cliente = $id_cliente;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getSexo() {
        return $this->sexo;
    }

    public function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    public function getDatan() {
        return $this->datan;
    }

    public function setDatan($datan) {
        $this->datan = $datan;
    }

    public function getCpfCnpj() {
        return $this->cpf_cnpj;
    }

    public function setCpfCnpj($cpf_cnpj) {
        $this->cpf_cnpj = $cpf_cnpj;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getpassword() {
        return $this->password;
    }

    public function setpassword($password) {
        $this->password = $password;
    }

    public function getTelefones() {
        return $this->telefones;
    }

    public function setTelefones($telefone) {
        $this->telefones[] = $telefone;
    }

    public function getEnderecos() {
        return $this->enderecos;
    }

    public function setEnderecos($endereco) {
        $this->enderecos[] = $endereco;
    }

    public function passwordHash() {
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
    }

    public function passwordVerify($password) {
        return password_verify($this->password, $password);
        
    }
}
?>
