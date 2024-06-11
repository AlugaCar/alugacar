<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/dda272e1ce.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="http://localhost/alugacar/views/css/styles.css">
    <script src="http://localhost/alugacar/views/index.js" defer></script>
    <title>Seja bem-vindo | AlugaCar</title>
</head>
<body>
    <?php
        require_once "header.php";
    ?>
     <div class="container py-2">
        <div class="row g-2 g-lg-4 row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-4 py-4">
            <?php
                if(is_array($carros)){
                    foreach ($carros as $carro) {
                        echo"
                            <div class='col'>
                                <div class='card p-4 w-100 h-100 justify-content-between bg-custom-beige'>
                                    <div class='titulo_produto py-1'>
                                        <h2 class='fs-4'>{$carro->descritivo}</h2>
                                    </div>

                                    <div class='imagem_produto py-2 d-flex justify-content-center align-items-center'>
                                        <img class='rounded img_produto' src='http://localhost/alugacar/site/img/{$carro->img}' alt='' srcset=''>
                                    </div>

                                    <div class='informacoes_produto'>
                                        <div class='descritivo mb-1'>{$carro->descritivo}</div>
                                        <div class='Marca mb-1'>{$carro->marca}</div>
                                        <div class='Modelo mb-1'>{$carro->modelo}</div>
                                        <div class='preco_dia mb-1'>Preço por dia: R$ ".number_format($carro->preco_dia, 2, ',', '.')."</div>
                                    </div>

                                    <div class='row gy-2 py-2'>
                                        <a class='btn btn-custom-blue btn-lg my-1' aria-current='' href='http://localhost/alugacar/alugar?idcarro={$carro->id_carro}'>Alugar Agora</a>
                                        
                                    </div>
                                </div>
                            </div>"
                        ;
                    }
                }
            ?>
        </div>
        <div class="row">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item mx-1">
                        <button class="btn btn-green page-link" type="button" onclick="PaginacaoProdutos(this);">Anterior</button>
                    </li>
                    <li class="page-item mx-1"><button class="btn btn-green page-link active" type="button" onclick="PaginacaoProdutos(this);">1</button></li>
                    <li class="page-item mx-1"><button class="btn btn-green page-link" type="button" onclick="PaginacaoProdutos(this);">2</button></li>
                    <li class="page-item mx-1"><button class="btn btn-green page-link" type="button" onclick="PaginacaoProdutos(this);">3</button></li>
                    <li class="page-item mx-1">
                        <button class="btn btn-green page-link" type="button" onclick="PaginacaoProdutos(this);">Próximo</button>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <?php require_once "footer.php"; ?>
    </body>
</html>
