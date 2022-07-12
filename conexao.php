<?php
//Neste arquivo iremos realizar todas as consultas e alterações no banco de dados e atualizamos a página inicial.

// Verifica se o POST existe antes de inserir uma nova pessoa
if(isset($_POST["acao"])){
    if ($_POST["acao"]=="inserir"){
        inserirProduto();
    }
    if ($_POST["acao"]=="alterar"){
        editaProduto();
    }
    if($_POST["acao"]=="excluir"){
        excluiProduto();
    }
}
//Voltar para tela inicial
function voltarParaInicio(){
    header("Location:inicio.php");
}

// Responsável por conectar o projeto ao banco
function conectarAoBanco() {
    $conexao = new mysqli("localhost", "root", "", "teste_titan");
    return $conexao;
}

// Consultando todos os produtos já cadastrados e retornando em array.
function selectProdutos(){
    $conexao = conectarAoBanco();
    $query = "SELECT *, IF(pro.cor = 4, 'Sem cor vinculada', pro.cor) FROM produtos pro
              LEFT JOIN preco pre ON pro.idprod = pre.idpreco
              LEFT JOIN cor c ON pro.cor = c.idcor";
    $retorno = $conexao->query($query);
    $conexao->close();
    while($linha_retorno = mysqli_fetch_array($retorno)){
        $array[] = $linha_retorno;
    }
    return $array;
}
//Cadastrando um novo produto
function inserirProduto(){
    $conexao = conectarAoBanco();
    $query = "INSERT INTO produtos (nome, cor) VALUES ('{$_POST["nome"]}','{$_POST["cor"]}')";
    $conexao->query($query);
  
    $query = "INSERT INTO preco (preco) VALUES ('{$_POST["preco"]}')";
    $conexao->query($query);

    $conexao->close();
    voltarParaInicio();
}

//Buscando produto especifico
function selectProdutoEspecifico($idprod){
    $conexao = conectarAoBanco();
    $query = "SELECT * FROM produtos pro
              LEFT JOIN preco pre ON pre.idpreco = pro.idprod
              WHERE idprod = '$idprod'";
    $retorno = $conexao->query($query);
    $conexao->close();
    $produto = mysqli_fetch_assoc($retorno);
    return $produto;
}

//Editando um produto
function editaProduto(){
    $conexao = conectarAoBanco();
    $query = "UPDATE produtos SET nome = '{$_POST["nome"]}', cor = '{$_POST["cor"]}' 
              WHERE idprod = '{$_POST["idprod"]}'";
    $conexao->query($query);

    $query = "UPDATE preco SET preco = '{$_POST["preco"]}' 
              WHERE idpreco = '{$_POST["idprod"]}'";
    $conexao->query($query);

    $conexao->close();
    voltarParaInicio();
}

// Excluir um produto
function excluiProduto(){
    $conexao = conectarAoBanco();
    $query = "DELETE FROM produtos WHERE idprod = '{$_POST["idprod"]}'";
    $conexao->query($query);

    $query = "DELETE FROM preco WHERE idpreco = '{$_POST["idprod"]}'";
    $conexao->query($query);

    $conexao->close();
    voltarParaInicio();
}
?> 