<?php

session_start();
//conexao com banco
require "../../coletor/arquivos_banco/conexao.php";

//recebe os valores do formulario e limpa os dados
$sessao = filter_var( $_POST['sessao'], FILTER_SANITIZE_STRING);
//recebe os valores do formulario e limpa os dados
$quantidade = filter_var( $_POST['quantidade'], FILTER_SANITIZE_STRING);


//procura usuarios iguais ao digitado na tabela
$listagem = mysqli_query($conexao, "SELECT nome from sessao where nome = '$sessao' ;");
//o while repete a criaçao de linhas na tabela igual a quantidade de itens.
while($linha = mysqli_fetch_array($listagem)) {

$sessao2 = $linha['nome']; //recebe o usuario do banco

}
//compara os dois usuarios
//se forem diferente grava
if ($sessao != $sessao2){

	//inseri os valores caso nao encontre o usuario na tabela
	$query = "INSERT INTO sessao (nome, quantidade,status) VALUES ('$sessao', '$quantidade', 1);" ;

	mysqli_query($conexao, $query);

//envia mensagem
	$_SESSION['msg'] = "<div class='alert  alert-success'>A sessão foi criada</div>";
	//redireciona
	header("Location: ../index.php");

//se encontrar o usuario
}else{

	//envia mensagem
	$_SESSION['msg'] = "<div class='alert alert-danger'>A sessão já existe</div>";

	//redireciona
	header("Location: ../index.php");
}

