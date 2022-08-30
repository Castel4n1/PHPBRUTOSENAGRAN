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
            <h1>usuarios</h1>
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