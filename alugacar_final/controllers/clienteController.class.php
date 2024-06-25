<?php
    class clienteController{
        public function __construct(
            private $conexao = null
        ){
            $this->conexao = Conexao::getInstancia();
        }

        public function login(){
            $msg_erro = array("","");
            $erro = false;

            if($_SESSION['logado'] != 0){
                header("Location: http://localhost/alugacar/minha_conta");
                die();
            }

            if($_POST){

                if(empty($_POST['email'])){

                    $erro = true;
                    $msg_erro[0] = "Preencha o email!";

                } else {

                    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){

                        $erro = true;
                        $msg_erro[0] = "Preencha com email um email valido!";

                    } else {

                        $cliente = new Cliente(email:$_POST['email']);
                        $clienteDAO = new ClienteDAO($this->conexao);
                        $validacao = $clienteDAO->bucarEmailCliente($cliente, args:'login');

                        if(isset($validacao['erro']) && isset($validacao['msg'])){
                            $erro = $validacao['erro'];
                            $msg_erro[0] = $validacao['msg'];
                        }
                    }

                }

                if(empty($_POST['password'])){
                    $erro = true;
                    $msg_erro[1] = "Preencha o senha!";
                }

                if(!$erro){
                    $cliente = new cliente(email:$_POST['email'], password:$_POST['password']);
                    $clienteDAO = new clienteDAO($this->conexao);
                    $validacao = $clienteDAO->buscarSenhacliente($cliente);
                             
                    if(isset($validacao['erro']) && isset($validacao['msg'])){
                        $erro = $validacao['erro'];
                        $msg_erro[0] = $validacao['msg'];
                    } else {
                        header("Location:http://localhost/alugacar/minha_conta");
                        
                    }
                }

            }

            require_once "views/login.php";
        }

        public function criar_conta(){
            $msg_erro = array("","", "", "");
            $erro = false;

            if($_SESSION['logado'] != 0){
                header("Location: http://localhost/alugacar/minha_conta");
                die();
            }

            if($_POST){

                if(empty($_POST['nome'])){
                    $erro = true;
                    $msg_erro[0] = "Preencha o campo nome.";
                }

                if(empty($_POST['email'])){
                    $erro = true;
                    $msg_erro[1] = "Preencha o email.";
                } else {

                    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){

                        $erro = true;
                        $msg_erro[1] = "Preencha com email um email valido!";

                    } else {
                        
                        $cliente = new cliente(email:$_POST['email']);
                        $clienteDAO = new clienteDAO($this->conexao);
                        $validacao = $clienteDAO->bucarEmailcliente($cliente, args:'cadastro');

                        if(isset($validacao['erro']) && isset($validacao['msg'])){
                            $erro = $validacao['erro'];
                            $msg_erro[1] = $validacao['msg'];
                        }
                    }
                }

                if(empty($_POST['confirme_email'])){
                    $erro = true;
                    $msg_erro[2] = "Preencha o campo confirmar email.";
                } else {
                    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                        $erro = true;
                        $msg_erro[2] = "Preencha com email um email valido!";
                    } 
                    
                    if($_POST['email'] != $_POST['confirme_email']){
                        $erro = true;
                        $msg_erro[2] = "E-mail(s) não conferem";
                    }
                }

                if(empty($_POST['password'])){
                    $erro = true;
                    $msg_erro[3] = "Preencha o campo senha.";
                }

                if(!$erro){
                    $cliente = new cliente(nome:$_POST['nome'], email:$_POST['email'], password:$_POST['password']);
                    $cliente->passwordHash();
                    $clienteDAO = new clienteDAO($this->conexao);
                    $validacao = $clienteDAO->cadastrarclienteBasico($cliente);

                    if($validacao){
                        header("Location: http://localhost/alugacar/login");
                        die();
                    } else {
                        $msg_erro[0] = "{$validacao}";
                    }
                }
            }
            require_once "views/criar_conta.php";
        }

        public function minha_conta(){
           
            if($_SESSION['logado'] == 0){
                
                header("Location: http://localhost/alugacar/login");
                die();
            }

            if($_SESSION['email'] != null){
                $cliente = new cliente(id_cliente:$_SESSION['id_cliente'], email:$_SESSION['email']);

                $clienteDAO = new clienteDAO($this->conexao);
                $perfilcliente = $clienteDAO->bucarPerfilcliente($cliente);
                if($_SESSION['email'] != $perfilcliente->email){
                                     
                    $this->logoff();
                    header("Location: http://localhost/alugacar/login");
                    die();
                }
            }

            require_once "views/minha_conta.php";
        }

        public function logoff(){
            session_unset();
            session_destroy();
            header("Location: http://localhost/alugacar/");
            die();
        }

        public function alterar_perfil(){
            
            require_once "views/editar_perfil.php";
        }
        public function locacaorealizada(){
            $LocacaoDAO = new LocacaoDAO($this->conexao);
            $minhas_locacoes = $LocacaoDAO->buscarLocacaoPorCliente(id_cliente:$_SESSION["id_cliente"]);
            require_once "views/minhas_locacoes.php";
        }
    }
?>