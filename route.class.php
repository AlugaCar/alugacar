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

    
    
 
?>