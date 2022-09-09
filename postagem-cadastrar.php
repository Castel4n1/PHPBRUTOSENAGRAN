<?php
    require_once('inc/classes.php');

    if (isset($_POST['btnCadastrar'])) {
        $Postagem = new Postagem();
        // print_r($_POST);
        // die();
        $Postagem -> cadastrar($_POST, $_FILES['foto']);
        header('location:'.URL.'postagem.php');
        $teste = move_uploaded_file($foto['name'],'../teste.jpg');
        print $teste;
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
            <h1> CADASTRO DE POSTAGEM</h1>
            <form action="?" method="post" enctype="multipart/form-data">
                <!-- CAMPO OCULTO -->
                <input type="hidden" name="id_usuario" value="31">
                <div class="row">
                        <div class="form-group col-md-12">
                            <label class="form-label" for="descricao">Descricao*</label>
                            <textarea class="form-control"name="descricao" id="descricao" rows="10"></textarea>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="foto" class="form-label">Foto*</label>
                            <input type="file" name="foto" id="foto" class="form-control" required>
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