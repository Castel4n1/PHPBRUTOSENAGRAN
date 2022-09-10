<?php
class Postagem {
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
        $sql = $this->pdo->prepare('SELECT * FROM postagens');

        #Executar
        $sql->execute();

        #Retornar os dados
        return $sql->fetchAll(PDO::FETCH_OBJ);
    }
    public function cadastrar(Array $dados = null, $foto)
    {

        echo '<pre>';
            // print_r($dados);
            // var_dump($dados);
            $partes = explode('.', $foto['name']);
            $extensao = end($partes);
            $novoNome = rand(1,10000).date('dmYHis').'.'.$extensao;
            $ok = move_uploaded_file($foto['tmp_name'],'./img/'.$novoNome);
            if($ok){
                $imagem = $novoNome;
            }else {
                $imagem = null;
            }
        $sql = $this->pdo->prepare(
            "INSERT INTO postagens (id_usuario, descricao, dt, foto)  VALUES (:id_usuario, :descricao, :dt, :foto)"
            );
        #OU TRATAR OS DADOS
        $id_usuario = $dados['id_usuario'];
        $descricao = $dados['descricao'];
        $dt = date('Y-m-d H:1');
        #MESCLAR OS DADOS
        $sql->bindParam(':id_usuario',$id_usuario);
        $sql->bindParam(':descricao',$descricao);
        $sql->bindParam(':dt',$dt);
        $sql->bindParam(':foto',$imagem);
            
        #EXECUTAR
        $sql->execute();

        return $this->pdo->lastInsertId();
    }

    public function atualizar(array $dados, $foto)
    {
        
        
        if($foto['name']!='')
        {
        $partes = explode('.', $foto['name']);
        $extensao = end($partes);
        $novoNome = date('dmYHis').'.'.$extensao;

        $ok = move_uploaded_file($foto['tmp_name'],'./img/'.$novoNome);
        if($ok)
        {
            $imagem = $novoNome;      
        }else 
        {
            $imagem = $dados['foto_atual'];
        }
    }else{
        $imagem = $dados['foto_atual'];
    }

        $sql = $this->pdo->prepare(
        "UPDATE postagens SET 
        descricao = :descricao, 
        dt = :dt, 
        foto = :foto
         WHERE 
         id_postagem = :id_postagem LIMIT 1"                
        );


        #OU TRATAR OS DADOS
        $descricao = trim($dados['descricao']);
        $dt = date('Y-m-d-H:i');
        
        #MESCLAR OS DADOS
        $sql->bindParam(':descricao',$descricao);
        $sql->bindParam(':dt',$dt);
        $sql->bindParam(':foto', $imagem);
        $sql->bindParam(':id_postagem', $dados['id_postagem']);       
        #EXECUTAR
        $sql->execute();

  

    }

    public function apagar(int $id_postagem)
    {
        $sql = $this->pdo->prepare("DELETE FROM postagens
        WHERE id_postagem = :id_postagem");

        $sql->bindParam(':id_postagem',$id_postagem);
        $sql->execute();
    }

    public function mostrar(int $id_postagem)
    {
        $sql = $this->pdo->prepare("SELECT * FROM postagens
            WHERE id_postagem = :id_postagem");

        $sql->bindParam(':id_postagem',$id_postagem);
        $sql->execute();
        return $sql->fetch(PDO::FETCH_OBJ);
    }

    public function gostei(int $id_postagem)
    {
        $sql = $this->pdo->prepare('UPDATE postagens SET gostei = gostei++
                WHERE id_postagem = :id_postagem');

        $sql-> bindParam(':id_postagem', $id_postagem);
        $sql->execute();
    }

    public function naogostei(int $id_postagem)
    {
        $sql = $this->pdo->prepare('UPDATE postagens SET naogostei = naogostei++
                WHERE id_postagem = :id_postagem');

        $sql-> bindParam(':id_postagem', $id_postagem);
        $sql->execute();
    }
}
?>