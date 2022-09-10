<?php
    require_once('inc/classes.php');

    $Postagem = new Postagem();
    /*
    echo '<pre>';
    print_r($postagem->listar());
    echo '</pre>';
    */

    #CADASTRAR postagem
    $dados = [
        'nome' => 'JOSE DA ALVES',
        'email' => 'jos1e1@teste.teste',
        'senha' => '1234'
        ];
    //echo $postagem->cadastrar($dados);
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
            <h1 class="text-center">POSTAGENS
                -
                <a class="btn btn-dark" href="<?php echo URL;?>/postagem-cadastrar.php">
                <i class="bi bi-person-plus"></i>

                    Nova-Postagem
                </a>
            </h1>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Ações</th>
                        <th>ID</th>
                        <th>Usuário</th>
                        <th>Data</th>
                        <th>Descricao</th>
                        <th>Gostei</th>
                        <th>Não Gostei</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $postagens = $Postagem->listar();
                        foreach ($postagens as $postagem) 
                            {
                    ?>
                    <tr>
                        <td>
                            <a href="<?php echo URL?>/postagem_atualizar.php?id=<?php echo $postagem->id_postagem?>"
                            class="btn btn-dark"
                            ><i class="bi bi-pencil-square"></i>
                            Editar
                            
                            <a href="<?php echo URL?>/postagem_deletar.php?id=<?php echo $postagem->id_postagem?>"
                            class="btn btn-dark">
                            <i class="bi bi-trash3"></i>
                            Apagar
                            
                            
                        </a>
                        </td>
                        <td>
                            <?php echo $postagem->id_postagem; ?>
                        </td>
                        <td>
                            <?php echo $postagem->id_usuario; ?>
                        </td>
                        <td>
                            <?php echo $postagem->dt; ?>
                        </td>
                        <td>                        
                            <?php
                            if ($postagem->foto != '') {
                                echo '<img class="img-fluid img-thumbnail" src="'.URL.'img/'.$postagem->foto.'">';
                            }
                            
                            echo nl2br($postagem->descricao); ?>
                        </td>
                        <td>
                            <?php echo $postagem->gostei; ?>
                        </td>
                        <td>
                            <?php echo $postagem->naogostei; ?>
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