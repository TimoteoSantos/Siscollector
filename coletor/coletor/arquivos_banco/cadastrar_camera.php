<?php
session_start();
//conexao com banco
require "conexao.php";

$listagem = mysqli_query($conexao,  "SELECT COUNT(id)  FROM config where conf = '2'");
//contar
$conta = $listagem->fetch_row();
//recebe o valor
$contagem = $conta;
//se nao tiver cadastrado um destino da camera
if ($contagem[0] != 1) {
	
//recebe o destino
$camera = filter_var( $_POST['camera'], FILTER_SANITIZE_STRING);

//inseri os valores recebidos nas variaveis acima
$query = "INSERT INTO config (camera, conf) VALUES ('$camera','2');" ;

mysqli_query($conexao, $query);

header("Location: ../v_configuracao.php");

}else{

//se tem um caminho registrado
$_SESSION['msg'] = "<div class='alert alert-danger'> O destino já foi configurado clique em excluir e cadastre um novo destino</div>";

header("Location: ../v_configuracao.php");

}