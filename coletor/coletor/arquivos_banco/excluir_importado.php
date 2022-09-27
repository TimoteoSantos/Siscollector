<?php
session_start();

//conexao
require "conexao.php";


$listagem = mysqli_query($conexao,  'SELECT COUNT(id)  FROM coletor_importar where usuario = "importado_coletor_externo"');
//conta
$contar = $listagem->fetch_row();
//recebe valor
$id = $contar;

$listagem = mysqli_query($conexao,  "SELECT COUNT(id)  FROM coletor_exportar");
//conta
$conta = $listagem->fetch_row();
//recebe o valor
$id2 = $conta;

//se tiver registro importado do coletor e se nao processou
if ($id[0] > 0  and  $id2[0] < 1 ) {

//apagar todos os dados da tabela zerando seu id tabela exportar
$sql = 'DELETE FROM coletor_importar WHERE usuario = "importado_coletor_externo" ' ;
	mysqli_query($conexao, $sql);


//auditoria
$usuario = $_SESSION['usuario'];
$data = date('Y-m-d H:i:s');
$mensagem = utf8_decode ('Excluiu os dados importados de outros coletores');

$sql = "INSERT INTO auditoria (usuario, data, descricao) VALUES ('$usuario','$data', '$mensagem')";
mysqli_query($conexao, $sql);
//fim da autidoria

//enviando para a sessao a mensagem
$_SESSION['msg'] = "<div class='alert alert-danger'><span class='glyphicon glyphicon-remove remove' aria-hidden='true'></span> Importados apagados!</div>";

header("Location: ../v_importar_arquivo.php");

} else {

	$_SESSION['msg'] = "<div class='alert alert-danger'><span class='glyphicon glyphicon-remove remove' aria-hidden='true'></span> Erro! nada importado ou tem registro processado!</div>";

	header("Location: ../v_importar_arquivo.php");
}