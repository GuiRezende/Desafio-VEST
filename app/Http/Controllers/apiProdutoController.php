<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelsProduto;

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
//chamada da conexao ao banco
$dsn    = "mysql:dbname=DesafioVesti; host=localhost"; // a database com o nome do banco
$dbuser = "root";	//usuario do banco
$dbpass = "";		//senha do banco
try{
    global $pdo; //variavel global para executar conexoes ao banco
    $pdo = new PDO($dsn, $dbuser, $dbpass);   //pegando os params e conectando

}catch(PDOException $e){
    echo "Falhou: ".$e->getMessage();
}

class apiProdutoController extends Controller
{

    public function index()
    {
        return ModelsProduto::all();
    }

    public function store(Request $request, $codigo, $nome, $preco, $composicao, $dataCadastro, $tamanho, $quantidade, $imagem)
    {        
        //verificando alguns dados que vem de um formulario de INSERÇÃO DE PRODUTO
        if(!empty($_POST['codigo']) && !empty($_POST['nome']) && !empty($_POST['preco'])&& !empty($_POST['composicao'])&& !empty($_POST['dataCadastro']) && !empty($_POST['tamanho'])&& !empty($_POST['quantidade'])){
            
            //faz a contagem da quantidade de imagens upadas
            if(count($_FILES['arquivo']['nome'][2])){
                    
                $imagem       = basename($_FILES['arquivo']['nome']);
                $codigo       = addslashes($_POST['codigo']); //tratando a chegada das info pegada pelo POST
                $nome         = addslashes($_POST['nome']);
                $preco        = addslashes($_POST['preco']);
                $composicao   = addslashes($_POST['composicao']);
                $dataCadastro = date('Y-m-d H:i');
                $tamanho      = addslashes($_POST['tamanho']);
                $quantidade   = addslashes($_POST['quantidade']);
                
                //fazendo uma chamada ao insert e atribuido valores
                $produto = $pdo->prepare("INSERT INTO models_produtos (codigo, nome, preco, composicao, 
                            dataCadastro, tamanho, quantidade, imagem) VALUES (:codigo, :nome, :preco, :composicao, :dataCadastro, :tamanho, :quantidade, :imagem)");
            
                $produto->bindValue(":codigo", $codigo); //passando os valores para as variaveis da chamada acima
                $produto->bindValue(":nome", $nome);
                $produto->bindValue(":preco", $preco);
                $produto->bindValue(":composicao", $composicao);
                $produto->bindValue(":dataCadastro", $dataCadastro);
                $produto->bindValue(":tamanho", $tamanho);
                $produto->bindValue(":quantidade", $quantidade);
                $produto->bindValue(":imagem", $imagem);
                $produto->execute(); //executa a linha de comando do insert into
            }
        }
    }

    public function show($id)
    {
        $produto=  "SELECT *FROM models_produtos ORDER BY id ASC";
        $produto= $pdo->prepare($produto);
        $produto->execute(); 
    }

    public function update(Request $request, $codigo, $nome, $preco, $composicao, $dataCadastro, $tamanho, $quantidade, $imagem)
    {
        //verificando alguns dados que vem de um formulario de INSERÇÃO DE PRODUTO
        if(!empty($_POST['codigo']) && !empty($_POST['nome']) && !empty($_POST['preco'])&& !empty($_POST['composicao'])&& !empty($_POST['dataCadastro']) && !empty($_POST['tamanho'])&& !empty($_POST['quantidade'])){
        
            //faz a contagem da quantidade de imagens upadas
            if(count($_FILES['arquivo']['nome'][2])){

                $imagem       = basename($_FILES['arquivo']['nome']);
                $codigo       = addslashes($_POST['codigo']); //tratando a chegada das info pegada pelo POST
                $nome         = addslashes($_POST['nome']);
                $preco        = addslashes($_POST['preco']);
                $composicao   = addslashes($_POST['composicao']);
                $dataCadastro = date('Y-m-d H:i');
                $tamanho      = addslashes($_POST['tamanho']);
                $quantidade   = addslashes($_POST['quantidade']);
                
                //fazendo uma chamada ao insert e atribuido valores
                $produto = $pdo->prepare("UPDATE models_produtos (codigo, nome, preco, composicao, dataCadastro, tamanho, quantidade) SET (:codigo, :nome, :preco, :composicao, :dataCadastro, :tamanho, :quantidade)");
            
                $produto->bindParam(":codigo", $codigo); //passando os valores para as variaveis da chamada acima
                $produto->bindParam(":nome", $nome);
                $produto->bindParam(":preco", $preco);
                $produto->bindParam(":composicao", $composicao);
                $produto->bindParam(":dataCadastro", $dataCadastro);
                $produto->bindParam(":tamanho", $tamanho);
                $produto->bindParam(":quantidade", $quantidade);
                $produto->bindValue(":imagem", $imagem);
                $produto->execute(); //executa a linha de comando do insert into
            }
        }
    }
    
    public function destroy($codigo)
    {
        $produto = $pdo->prepare("DELETE FROM models_produtos WHERE codigo = '$codigo'");
    }
}
