<?php
session_start();
//conexao com banco
require "conexao.php";

$listagem = mysqli_query($conexao,  "SELECT COUNT(id)  FROM config where conf = '1'");
//conta
$conta = $listagem->fetch_row();
//recebe o valor
$contagem = $conta;

//se nao tiver pasta de destino cadastrada
if ($contagem[0] != 1) {
	
//recebe o destino do formulario
$destino = filter_var( $_POST['destino'], FILTER_SANITIZE_STRING);

//inseri o valor recebido
$query = "INSERT INTO config (arquivo, conf) VALUES ('/$destino','1');" ;

mysqli_query($conexao, $query);

header("Location: ../v_configuracao.php");

}else{

//se ja tiver destino cadastrado
$_SESSION['msg'] = "<div class='alert alert-danger'> O destino já foi configurado clique em excluir e cadastre um novo destino</div>";

header("Location: ../v_configuracao.php");

}