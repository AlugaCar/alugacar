<header id="header" class="py-2 py-md-0 sticky-top z-2 d-flex align-content-center flex-wrap">
    <div class="container px-0">
        <nav id="navbar" class="navbar navbar-expand-lg">
            <div class="container-fluid">
    <a class="navbar-brand" href="http://localhost/alugacar/"><img class="logo" src="http://localhost/alugacar/site/img/logooo.jpg" alt="logo"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <form action="http://localhost/alugacar/buscar" method="POST" class="d-flex w-100 py-4" role="search">
        <input name="search" class="form-control me-2" type="search" placeholder="Pesquisar" aria-label="Search" onsubmit="search(event, this)">
          <button class="btn btn-outline-light" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
          </form>
      <ul class="navbar-nav col col-sm-12 col-lg-8 col-xl-6 mb-lg-0 justify-content-end">
          <li class="nav-item px-0 px-sm-0 w-100 d-md-flex justify-content-lg-center align-items-md-center">
            <a class="nav-link text-light" aria-current="" href="http://localhost/alugacar/">Inicio</a>
          </li>
          <li class="dropdown nav-item px-0 px-sm-0 w-100 d-md-flex justify-content-lg-center align-items-md-center">
          <a class="dropdown-toggle nav-link text-light" data-bs-toggle="dropdown" aria-expanded="false" href="#">
              Carros
          </a>
             <ul class="dropdown-menu bg-custom-beige px-4">
              <?php
                if(isset($carros)){
                if(is_array($carros)){
                  foreach ($carros as $carro) {
                      echo    "<li class='nav-item px-0 px-sm-0 w-100 d-md-flex justify-content-lg-center align-items-md-center'>";
                      echo    "<a class='nav-link text-dark dropdown-item' href='http://localhost/alugacar/index.php?'>{$carro->descritivo}</a>";
                      echo    "</li>";
                  }
                }
                  } else {
                      echo    "<li class='nav-item px-0 px-sm-0 w-100 d-md-flex justify-content-lg-center align-items-md-center'>";
                      echo    "<a class='nav-link text-dark dropdown-item disabled' href=''>Não foi encontrado carros</a>";
                      echo    "</li>";
                  }
              ?>
            </ul>
          </li>
              <?php
                if($_SESSION["id_cliente"] == 0){
                  echo "<li class='nav-item px-0 px-sm-0 w-100 d-md-flex justify-content-lg-center align-items-md-center'><a class='nav-link text-light' aria-current='' href='http://localhost/alugacar/login'>Entrar <i class='fa-solid fa-user'></i></a></li>";
                }

                if ($_SESSION["id_cliente"] != 0) {
                  echo "
                        <li class='nav-item px-0 px-sm-0 w-100 d-md-flex justify-content-lg-center align-items-md-center'>
                        <a class='nav-link text-light' aria-current='' href='http://localhost/alugacar/minha_conta'> Perfil <i class='fa-solid fa-user'></i></a>
                        </li>

                        <li class='nav-item px-0 px-sm-0 w-100 d-md-flex justify-content-lg-center align-items-md-center'>
                        <a class='nav-link text-danger' aria-current='' href='http://localhost/alugacar/logoff'> Sair <i class='fa-solid fa-right-from-bracket'></i></a>
                        </li>
                        ";
                  }
              ?>
            </ul>
        </div>
  </div>
</nav>

    </div>
</header>