<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/dda272e1ce.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="http://localhost/alugacar/views/css/styles.css">
    <script src="http://localhost/alugacar/views/js/index.js" defer></script>

    <link rel="shortcut icon" href="http://localhost/alugacar/site/img/<?php echo $_ENV['logo']; ?>" type="image/x-icon">
    <title> Minhas Locações | <?php echo $_ENV['nome_site']; ?></title>
</head>
<body>
    <?php require_once "header.php"; ?>

    <div class="container py-2">
            <div class="row g-2 row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-4 py-4">
            <h1 class="w-100"> Minhas Locações </h1>
           <table class="table table-striped table-bordered">
                <tr>
                    <th>Modelo</th>
                    <th>Data da Locação</th>
                    <th>Valor total R$</th>
                    <th>Dias de locação</th>
                    
                </tr>
            <?php
            if(is_array($minhas_locacoes)){
                foreach($minhas_locacoes as $locacoes){
                    echo "<tr>
                            <td>{$locacoes->modelo}</td>
                            <td>{$locacoes->data_locacao}</td>
                            <td>" . number_format($locacoes->valor_locacao,2, ",",".") . "</td>

                            <td>{$locacoes->quantidade}</td>
                        
                        </tr>";
                
                }
            }
            ?>
            </table>
        </div>
        </div>
    <?php require_once "footer.php"; ?>
</body>
</html>