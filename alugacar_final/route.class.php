<?php
    class rotas
    {
        private array $rotas = [];

        public function get(string $caminho, array $dados)
        {
            $this->rotas['GET'][$caminho] = $dados;
        }
        public function post(string $caminho, array $dados)
        {
            $this->rotas['POST'][$caminho] = $dados;
        }
        public function instancia_rota(string $metodo, string $url)
        {


            if(isset($this->rotas[$metodo][$url]))
            {
                $dados_rota = $this->rotas[$metodo][$url];
                $classe = new $dados_rota[0];
                $metodo = $dados_rota[1];
                return $classe->$metodo();
                
            }
            //print_r($_REQUEST);
            exit("Rota Inválida");
        }
    }//FIM DA CLASSE
    
    $router = new Rotas();
    //inicio da rota
    $router->get("/", [indexController::class, "index"]);

    $router->get("/alugar", [carroController::class, "alugar"]);
    $router->post("/alugar", [carroController::class, "alugar"]);

    $router->get("/login", [clienteController::class, "login"]);
    $router->get("/logoff", [clienteController::class, "logoff"]);
    $router->get("/minha_conta", [clienteController::class, "minha_conta"]);
    $router->get("/criar_conta", [clienteController::class, "criar_conta"]);
    $router->get("/alterar_perfil", [clienteController::class, "alterar_perfil"]);

    $router->post("/login", [clienteController::class, "login"]);
    $router->post("/criar_conta", [clienteController::class, "criar_conta"]);
    $router->get("/locacaorealizada",[clienteController::class, "locacaorealizada"])
#--------------------------------------------------------------------------------------------------------------#
    
#--------------------------------------------------------------------------------------------------------------#

    
    
 
?>