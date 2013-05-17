<?php
class ProdutoDao {
// irá receber uma conexão
public $p = null;
// construtor
public function ProdutoDao(){
//retorna a conexão com o banco de dados Utilizando o PDO
include_once('Conexao.class.php');
$this->p = new Conexao();
}
// realiza o insert do produto
public function inserir($produto){
try{
$stmt = $this->p->prepare("INSERT INTO produtos (nome, valor, quantidade,categoria) VALUES (?, ?, ?, ?)");
$stmt->bindValue(1, $produto->getNome() );
$stmt->bindValue(2, $produto->getValor() );
$stmt->bindValue(3, $produto->getQuantidade() );
$stmt->bindValue(4, $produto->getCategoria() );
$stmt->execute();
// fecho a conexão
$this->p = null;
// caso ocorra um erro, retorna o erro;
}catch ( PDOException $ex ){  echo "Erro: ".$ex->getMessage(); }
}
//Lista todos os produtos da categoria escolhida
public function ListarProdutosPorCategoria($cat_id){
try{
 
$stmt = $this->p->query("select * from produtos as p, categorias as c where p.categoria = '$cat_id' and p.categoria = cat_id ");
 
$this->p = null;
return $stmt;
}catch ( PDOException $ex ){  echo "Erro: ".$ex->getMessage(); }
}
//Lista todos as categorias
public function ListaCategorias($query=null){
try{
if( $query == null ){
$stmt = $this->p->query("SELECT * FROM categorias");
}else{
$stmt = $this->p->query($query);
}
$this->p = null;
return $stmt;
}catch ( PDOException $ex ){  echo "Erro: ".$ex->getMessage(); }
}
 
}
?>