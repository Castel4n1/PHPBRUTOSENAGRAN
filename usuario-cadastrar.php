<?php
    require_once('inc/classes.php');

    if (isset($_POST['btnCadastrar'])) {
        $Usuario = new Usuario();
        // print_r($_POST);
        // die();
        $Usuario -> cadastrar($_POST);
        header('location:'.URL.'usuarios.php');
    }
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SENAGRAN</title>

    <!-- CSS -->
    <?php include('inc/css.php');
    ?>
    <!-- JS -->
    <?php require_once('inc/js.php'); //-----Utilizar quando o elemento É obrigatório
    ?>


</head>

<body>
    <div class="container">
        <!-- MENU -->
        <?php 
            require_once('inc/menu.php'); 
        ?>
        <!-- /MENU -->

        <!-- CONTEUDO -->
        <div>
            <h1> CADASTRAR USUARIO</h1>
            <form action="?" method="post">
                <div class="row">
                        <div class="form-group col-md-6">
                            <label class="form-label" for="nome">Nome*</label>
                            <input class="form-control" type="text" name="nome" id="nome" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="email" class="form-label">E-mail*</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="senha" class="form-label">Senha*</label>
                            <input type="password" name="senha" id="senha" class="form-control" required autocomplete="off">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="confirma_senha" class="form-label">ConfirmaSenha*</label>
                            <input type="password" name="confirma_senha" id="confirma_senha" class="form-control" required autocomplete="off">
                        </div>
                        
                        <div class="offset-11 col-md-1 mt-1">
                            <input class="btn btn-primary" type="submit" name="btnCadastrar" value="Cadastrar" required>
                        </div>
                    </div>
                </div>



            </form>
        </div>
        <!-- /CONTEUDO -->

        <!-- RODAPE -->
        <?php  
            include_once('inc/rodape.php'); //----------- Include_once quando quer mostrar apenas uma vez a informação
        ?>
        <!-- /RODAPE -->

    </div>
</body>

</html>