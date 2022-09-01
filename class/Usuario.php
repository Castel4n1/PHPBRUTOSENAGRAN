<?php

class Usuario extends Conexao
{
    public $pdo;

    public function __construct()
    {
        $this->pdo = Conexao::conexao();
    }
    /*
        Listar Usuários
    */
    public function Listar()
    {
        #Abrir Conexão com Banco
        $sql = $this->pdo->prepare('SELECT * FROM usuarios');

        #Executar
        $sql->execute();

        #Retornar os dados
        return $sql->fetchAll(PDO::FETCH_OBJ);
    }
    public function Cadastrar(Array $dados = null)
    {
        $sql = $this->pdo->prepare(
            "INSERT INTO usuarios 
            (nome, email, senha)
            VALUES
            (:nome, :email, :senha)
            "
            );
    #MESCLAR OS DADOS
    #OU TRATAR OS DADOS

    $sql->bindParam(':nome',$dados['nome']);
    $sql->bindParam(':email',$dados['email']);
    $sql->bindParam(':senha',$dados['senha']);
        
    #EXECUTAR
    $sql->execute();

    return $this->pdo->lastInsertId();

    }
}


?>