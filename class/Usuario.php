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
    public function cadastrar(Array $dados = null)
    {
        $sql = $this->pdo->prepare(
            "INSERT INTO usuarios (nome, email, senha)  VALUES (:nome, :email, :senha)"
            );
    #OU TRATAR OS DADOS
    $nome = trim(strtoupper($dados['nome']));
    $email = trim(strtolower($dados['email']));
    $senha = md5($dados['senha']);
    #MESCLAR OS DADOS
    $sql->bindParam(':nome',$nome['nome']);
    $sql->bindParam(':email',$email['email']);
    $sql->bindParam(':senha',$senha['senha']);
        
    #EXECUTAR
    $sql->execute();

    return $this->pdo->lastInsertId();
    }

    public function atualizar(array $dados)
    {
        $sql = $this->pdo->prepare(
        "UPDATE usuarios SET nome = :nome, email = :email, senha = :senha
         WHERE id_usuario = :id_usuario LIMIT 1"
                
        );


        #OU TRATAR OS DADOS
        $nome = trim(strtoupper($dados['nome']));
        $email = trim(strtolower($dados['email']));
        $senha = md5($dados['senha']);
        #MESCLAR OS DADOS
        $sql->bindParam(':nome',$nome);
        $sql->bindParam(':email',$email);
        $sql->bindParam(':senha',$senha);
        $sql->bindParam(':id_usuario', $dados['id_usuario']);

        #EXECUTAR
        $sql->execute();
    }
    public function apagar(int $id_usuario)
    {
        $sql = $this->pdo->prepare("DELETE FROM usuarios
        WHERE id_usuario = :id_usuario");

        $sql->bindParam(':id_usuario',$id_usuario);
        $sql->execute();
    }

    public function mostrar(int $id_usuario)
    {
        $sql = $this->pdo->prepare("SELECT * FROM usuarios
            WHERE id_usuario = :id_usuario");

        $sql->bindParam(':id_usuario',$id_usuario);
        $sql->execute();
        return $sql->fetch(PDO::FETCH_OBJ);
    }

}


?>