<?php
session_start();
//conexao
require '../../coletor/arquivos_banco/conexao.php';

$listagem = mysqli_query($conexao,  'SELECT COUNT(id)  FROM vendas');
//conta
$conta = $listagem->fetch_row();
//recebe o valor
$id2 = $conta;

//se tiver importado
if ($id2[0] > 0) {	


//apagar todos os dados da tabela
$sql = "TRUNCATE vendas";
mysqli_query($conexao, $sql);

//auditoria
//$usuario = $_SESSION['usuario'];
//$data = date('Y-m-d H:i:s');
//$mensagem = utf8_decode ('Excluiu produtos de pesquisa');

//$sql = "INSERT INTO auditoria (usuario, data, descricao) VALUES ('$usuario','$data', '$mensagem')";
//mysqli_query($conexao, $sql);
//fim da autidoria

//enviando para a sessao a mensagem
$_SESSION['msg'] = "<div class='alert alert-danger'><span class='glyphicon glyphicon-remove remove' aria-hidden='true'></span> Produtos de pesquisa excluidos!</div>";

header("Location: ../index.php");

//se nao tiver produto importado
}else {
//enviando para a sessao a mensagem
$_SESSION['msg'] = "<div class='alert alert-danger'><span class='glyphicon glyphicon-remove remove' aria-hidden='true'></span> Não tem produto importado !</div>";
header("Location: ../index.php");
	
}