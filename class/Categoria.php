<?php 

/**
 * Categoria de Perguntas
 */
class Categoria extends Conexao
{
    
    //ATRIBUTOS
	public $categoria;
	public $pdo; // guardar a conexão

    public function __construct()
    {
        $this->pdo = Conexao::conexao();
    }


    /**
     * listar - lista todas as categorias
     * @return array
     */
    public function listar(){

    	//montar o SELECT ou o SQL
    	$sql = $this->pdo->prepare('SELECT * FROM categorias ORDER BY categoria');

    	//executar a consulta
    	$sql->execute();

    	//pegar os dados retornados
    	$dados = $sql->fetchall(PDO::FETCH_OBJ);
    	return $dados;
    }

}

?>