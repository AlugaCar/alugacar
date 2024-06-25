<?php
    class carroController{
        public function __construct(
            private $conexao = null
        ){
            $this->conexao = Conexao::getInstancia();
        }

        public function alugar(){

            if($_SESSION['logado'] == false){
                header('Location: http://localhost/alugacar/login');
                die();
            }

            $erro_msg = array("", "");
            $erro = false;

            
            if($_GET){
                if($_GET['idcarro']){
                    $carroDAO = new CarroDAO($this->conexao);
                    $carro = new Carro(id_carro:$_GET['idcarro']);
                    $carro = $carroDAO->buscarCarroPorId($carro);
                }
            }

            if($_POST){

                if($_POST['qtd_dia'] <= 0){
                    $erro = true;
                    $erro_msg[0] = "Selecione a quantidade de dias!!!";
                }
    
                if($_POST['fp'] <= 0){
                    if($_POST['fp'] == 0){
                        $erro = true;
                        $erro_msg[1] = "Selecione a forma de pagamento";
                    }
                }
    
                if(!$erro){
                    $locacao = new Locacao(data_locacao:date("Y-m-d"), status_locacao:"indisponivel", id_fp:$_POST['fp'], id_cliente:$_SESSION['id_cliente'], id_carro:$_GET['idcarro'], quantidade:$_POST['qtd_dia'], valor_locacao:$_POST['qtd_dia']*$carro->preco_dia);
                    $locacaoDAO = new LocacaoDAO($this->conexao);
                    $ret = $locacaoDAO->cadastrarLocacao($locacao);
                    
                    if($ret){
                        header('Location: http://localhost/alugacar/locacaorealizada');
                        die();
                    }
    
                }
            }

            $fpDAO = new FormaPagamentoDAO($this->conexao);
            $fps = $fpDAO->buscarTodasFormaPagamento();

            require_once "views/alugar_carro.php";
        }
    }
?>