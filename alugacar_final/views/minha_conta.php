<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/dda272e1ce.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="http://localhost/alugacar/views/css/styles.css">
    <link rel="stylesheet" href="http://localhost/alugacar/views/css/perfil.css">
    <script src="http://localhost/alugacar/views/js/index.js" defer></script>

    <link rel="shortcut icon" href="http://localhost/alugacar/site/img/<?php echo $_ENV['logo']; ?>" type="image/x-icon">
    <title>Minha Conta | <?php echo $_ENV['nome_site']; ?></title>
</head>
<body>
    <?php require_once "header.php"; ?>
    <div id="container" class="container py-1">
        <div class="row row-sm-reverse">
            <div class="col-lg-4">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                <i class="fa-solid fa-user pe-4 icon_menu_minha_conta"></i> Minha Conta
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <ul class="navbar-nav col col-sm-12 col-lg-8 col-xl-6 mb-lg-0 justify-content-end">

                                    <li class="nav-item px-sm-0 py-md-1 w-100 d-md-flex justify-content-lg-start align-items-md-center w-100">
                                        <button class="btn btn-md" type="button"><i class="fa-solid fa-user-gear pe-3 icon_menu_minha_conta"></i>Meus Dados</button>
                                    </li>

                                    <li class="nav-item px-sm-0 py-md-1 w-100 d-md-flex justify-content-lg-start align-items-md-center w-100">
                                        <button class="btn btn-md" type="button"><i class="fa-solid fa-location-dot pe-3 icon_menu_minha_conta"></i>Meus Endereços</button>
                                    </li>
                                    
                                    <li class="nav-item px-sm-0 py-md-1 w-100 d-md-flex justify-content-lg-start align-items-md-center w-100">
                                        <button class="btn btn-md" type="button"><i class="fa-solid fa-phone pe-3 icon_menu_minha_conta"></i>Meus Telefones</button>
                                    </li>


                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                <i class="fa-solid fa-truck-fast pe-4 icon_menu_minha_conta"></i> Minha locação
                            </button>
                        </h2>

                        <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <ul class="navbar-nav col col-sm-12 col-lg-8 col-xl-6 mb-lg-0 justify-content-end">

                                    <li class="nav-item px-sm-0 py-md-1 w-100 d-md-flex justify-content-lg-start align-items-md-center">
                                        <a class="nav-link" aria-current="" href="http://localhost/alugacar/locacaorealizada">
                                            <i class="fa-solid fa-check pe-3 icon_menu_minha_conta"></i>Locação Realizada
                                        </a>
                                    </li>

                                    <li class="nav-item px-sm-0 py-md-1 w-100 d-md-flex justify-content-lg-start align-items-md-center">
                                        <a class="nav-link" aria-current="" href="">
                                            <i class="fa-solid fa-clock pe-3 icon_menu_minha_conta"></i>Locação Pendente
                                        </a>
                                    </li>

                                    <li class="nav-item px-sm-0 py-md-1 w-100 d-md-flex justify-content-lg-start align-items-md-center">
                                        <a class="nav-link" aria-current="" href="">
                                            <i class="fa-solid fa-xmark pe-3 icon_menu_minha_conta"></i>Locação Cancelada
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            
            <div class="col-lg-8">
                <div class="card">
                    <div class="d-flex justify-content-end align-itens-center">
                        <a href="http://localhost/alugacar/alterar_perfil">
                            <i class="fa-solid fa-user-pen icon_alterar_dados_perfil"></i>
                        </a>
                    </div>
                    <div class="d-flex justify-content-center align-itens-center">
                        <img class="img-thumbnail mx-auto img-perfil" src="http://localhost/alugacar/storage/usuario/<?php echo $perfilcliente->img_perfil ?>" alt="" srcset="">
                    </div>

                    <div id="dados_usuario">
                        <div id="nome">
                            <?php echo $perfilcliente->nome ?>
                        </div>
                        <div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require_once "footer.php"; ?>
</body>
</html>