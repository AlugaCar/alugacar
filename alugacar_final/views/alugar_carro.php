<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/dda272e1ce.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="http://localhost/alugacar/views/css/styles.css">
    <script src="http://localhost/alugacar/views/index.js" defer></script>
    <link rel="shortcut icon" href="http://localhost/alugacar/site/img/<?php echo $_ENV['logo']; ?>" type="image/x-icon">
    <title>Alugar | AlugaCar</title>
</head>
<body>
    <?php
        require_once "header.php";
    ?>
    
    
     <div class="container py-2">
        <div class="row g-2 g-lg-4 py-4">
            <form action="" method="post">
                <?php
                    if(is_object($carro)){
                ?>
                    <div class='col'>
                        <div class='card p-4 w-100 h-100 justify-content-between bg-custom-beige'>
                            <div class='titulo_produto py-1'>
                                <h2 class='fs-4'><?php echo  $carro->descritivo ?></h2>
                            </div>

                            <div class='imagem_produto py-2 d-flex justify-content-center align-items-center'>
                                <img class='rounded img_produto' src='http://localhost/alugacar/site/img/<?php echo $carro->img ?>' alt='' srcset=''>
                            </div>

                            <div class='informacoes_produto'>
                                <div class='descritivo mb-1'><?php echo $carro->descritivo ?></div>
                                <div class='Marca mb-1'><?php echo $carro->marca ?></div>
                                <div class='Modelo mb-1'><?php echo $carro->modelo ?></div>
                                <div class='preco_dia mb-1'>Preço por dia: R$ <?php echo  number_format($carro->preco_dia, 2, ',', '.') ?></div>
                                            
                                <div class='mb-1'>
                                    <label for=''>
                                        Quantidade de dias:
                                    </label>
                                    <input type='number' name='qtd_dia' min='1' value="<?php echo isset($_POST['qtd_dia'])?$_POST['qtd_dia']:''?>">
                                
                                    <?php echo $erro_msg[0] ?>
                                </div>

                                <div class='mb-1'>
                                    <label for=''>
                                        Forma de pagamento
                                    </label>

                                    <select name="fp" id="">
                                        <option value="0">Selecione uma FP</option>
                                            <?php
                                                if(is_array($fps)){
                                                    foreach ($fps as $fp) {
                                                        if(isset($_POST['fp']) == $fp->id_fp){
                                                            echo "<option value='{$fp->id_fp}'>{$fp->descritivo}</option>";
                                                        } else {
                                                            echo "<option value='{$fp->id_fp}'>{$fp->descritivo}</option>";
                                                        }
                                                    }
                                                }
                                            ?>
                                    </select>
                                </div>

                            <div>
                                <?php echo $erro_msg[1] ?>
                            </div>
                        </div>
                    </div>
                
                            
                <?php
                    }
                ?>


                    <div class='row gy-2 py-2'>
                        <button type='submit' class='btn btn-custom-blue'>
                            Alugar Agora
                        </button>
                    </div>
            </form>
        </div>
    </div>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <?php //require_once "footer.php"; ?>
    </body>
</html>
