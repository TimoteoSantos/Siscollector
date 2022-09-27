<?php
session_start();
//conexao com banco
require "conexao.php";

$listagem = mysqli_query($conexao,  "SELECT COUNT(id)  FROM pdf");
//contar
$conta = $listagem->fetch_row();
//recebe o valor
$contagem = $conta;
//se nao tiver cadastrado um destino da camera
if ($contagem[0] != 1) {
	
//recebe o destino
//$empresa = filter_var( $_POST['empresa'], FILTER_SANITIZE_STRING);
    $empresa = 'empresa';
$fornecedor = filter_var( $_POST['fornecedor'], FILTER_SANITIZE_STRING);
$fabricante = filter_var( $_POST['fabricante'], FILTER_SANITIZE_STRING);
$grupo = filter_var( $_POST['grupo'], FILTER_SANITIZE_STRING);


//inseri os valores recebidos nas variaveis acima
$query = "INSERT INTO pdf (empresa, fornecedor, fabricante, grupo) VALUES ('$empresa','$fornecedor', '$fabricante', '$grupo');" ;

mysqli_query($conexao, $query);

header("Location: ../v_configuracao.php");

}else{

//se tem um caminho registrado
$_SESSION['msg'] = "<div class='alert alert-danger'> O destino já foi configurado clique em excluir e cadastre um novo destino</div>";

header("Location: ../v_configuracao.php");

}