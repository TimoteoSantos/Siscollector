<?php

session_start();
//conexao com banco
require "conexao.php";

//recebe os valores do formulario e limpa os dados
$usuario = filter_var( $_POST['usuario'], FILTER_SANITIZE_STRING);

//recebe os valor da senha limpa e criptografa
$senha = filter_var(password_hash($_POST['senha'], PASSWORD_DEFAULT), FILTER_SANITIZE_STRING);
//recebe o tipo da conta e ignora mensagem de erro se receber vazio
$tipo = @filter_var($_POST['tipo'], FILTER_SANITIZE_STRING);
$sexo = @filter_var($_POST['sexo'], FILTER_SANITIZE_STRING);

//procura usuarios iguais ao digitado na tabela
$listagem = mysqli_query($conexao, "SELECT usuario from usuarios where usuario = '$usuario' ;");
//o while repete a criaçao de linhas na tabela igual a quantidade de itens.
while($linha = mysqli_fetch_array($listagem)) {

$user = $linha['usuario']; //recebe o usuario do banco

}
//compara os dois usuarios
//se forem diferente grava
if ($user != $usuario){

	//inseri os valores caso nao encontre o usuario na tabela
	$query = "INSERT INTO usuarios (usuario, senha, tipo, sexo) VALUES ('$usuario', '$senha', '$tipo', '$sexo');" ;

	mysqli_query($conexao, $query);

	//redireciona
	header("Location: ../v_usuario.php");

//se encontrar o usuario
}else{

	//envia mensagem
	$_SESSION['msg'] = "<div class='alert alert-danger'>Erro! usuário já existe!</div>";

	//redireciona
	header("Location: ../v_usuario.php");
}

