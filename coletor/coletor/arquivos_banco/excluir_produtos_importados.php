<?php
session_start();
//conexao
require "conexao.php";

$listagem = mysqli_query($conexao,  'SELECT COUNT(id)  FROM coletor_exportar');
//conta
$conta = $listagem->fetch_row();
//recebe o valor
$id2 = $conta;

//se nao tiver processado
if ($id2[0] > 0) {	
}

$listagem = mysqli_query($conexao,  'SELECT COUNT(id)  FROM coletar');
//conta
$contar = $listagem->fetch_row();
//recebe o valor
$id = $contar;

//se tiver produto para pesquisa e nao tiver processado
if ($id[0] > 0 and $id2[0] < 1) {

//apagar todos os dados da tabela
$sql = "TRUNCATE coletar";
mysqli_query($conexao, $sql);

//auditoria
$usuario = $_SESSION['usuario'];
$data = date('Y-m-d H:i:s');
$mensagem = utf8_decode ('Excluiu produtos de pesquisa');

$sql = "INSERT INTO auditoria (usuario, data, descricao) VALUES ('$usuario','$data', '$mensagem')";
mysqli_query($conexao, $sql);
//fim da autidoria

//enviando para a sessao a mensagem
$_SESSION['msg'] = "<div class='alert alert-danger'><span class='glyphicon glyphicon-remove remove' aria-hidden='true'></span> Produtos de pesquisa excluidos!</div>";

header("Location: ../v_importar_arquivo_erp.php");

//se nao tiver produto importado
}else {
//enviando para a sessao a mensagem
$_SESSION['msg'] = "<div class='alert alert-danger'><span class='glyphicon glyphicon-remove remove' aria-hidden='true'></span> Não tem produto importado ou já tem processado!</div>";
header("Location: ../v_importar_arquivo_erp.php");
	
}