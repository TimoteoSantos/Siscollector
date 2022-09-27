<?php
session_start();
//conexao com banco
require "conexao.php";

$listagem = mysqli_query($conexao,  "SELECT COUNT(tempo)  FROM config where tempo = '3'");
//contar
$conta = $listagem->fetch_row();
//recebe o valor
$contagem = $conta;
//se nao tiver cadastrado um destino da camera
if ($contagem[0] != 1) {
	
//recebe o destino
$tempo = filter_var( $_POST['tempo'], FILTER_SANITIZE_STRING);

//inseri os valores recebidos nas variaveis acima
$query = "INSERT INTO config (tempo, conf) VALUES ('$tempo', '3');" ;

mysqli_query($conexao, $query);

header("Location: ../v_configuracao.php");

}else{

//se tem um caminho registrado
$_SESSION['msg'] = "<div class='alert alert-danger'> ja configurado</div>";

header("Location: ../v_configuracao.php");

}