<? 
class postagem {
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
    public function cadastrar(Array $dados = null)
    {
        $sql = $this->pdo->prepare(
            "INSERT INTO postagens (id_usuario, descricao, dt)  VALUES (:id_usuario, :descricao, :dt)"
            );
        #OU TRATAR OS DADOS
        $id_usuario = $dados['id_usuario'];
        $descricao = $dados['descricao'];
        $dt = date('Y-m-d H:1');
        #MESCLAR OS DADOS
        $sql->bindParam(':id_usuario',$id_usuario);
        $sql->bindParam(':descricao',$descricao);
        $sql->bindParam(':dt',$dt);
            
        #EXECUTAR
        $sql->execute();

        return $this->pdo->lastInsertId();
    }

    public function atualizar(array $dados)
    {
        $sql = $this->pdo->prepare(
        "UPDATE postagens SET descricao = :descricao, dt = :dt, id_postagem = :id_postagem
         WHERE id_usuario = :id_usuario LIMIT 1"
                
        );


        #OU TRATAR OS DADOS
        $descricao = trim(strtoupper($dados['descricao']));
        $dt = date('Y-m-d-H:i');
        $id_postagem = md5($dados['id_postagem']);
        #MESCLAR OS DADOS
        $sql->bindParam(':descricao',$descricao);
        $sql->bindParam(':dt',$dt);
        $sql->bindParam('id_postagem', $dados[':id_postagem']);

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