<?php
    require_once('inc/classes.php');

    $Usuario = new Usuario();
    /*
    echo '<pre>';
    print_r($Usuario->listar());
    echo '</pre>';
    */

    #CADASTRAR USUARIO
    $dados = [
        'nome' => 'JOSE DA ALVES',
        'email' => 'jose1@teste.teste',
        'senha' => '1234'
        ];
    echo $Usuario->cadastrar($dados);
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
            <h1>usuarios</h1>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Ações</th>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>EMAIL</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $usuarios = $Usuario->listar();
                        foreach ($usuarios as $usuario) 
                            {
                            # code...
                        
                    ?>
                    <tr>
                        <td></td>
                        <td>
                            <?php echo $usuario ->id_usuario; ?>
                        </td>
                        <td>
                            <?php echo $usuario ->nome; ?>
                        </td>
                        <td>
                            <?php echo $usuario ->email; ?>
                        </td>
                    </tr>
                    <?php
                            }#FECHA FOREACH
                    ?>
                </tbody>
            </table>
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