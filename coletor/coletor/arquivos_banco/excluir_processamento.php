<?php
session_start();
//conexao
require "conexao.php";


$listagem = mysqli_query($conexao,  "SELECT COUNT(id)  FROM coletor_exportar");
//conta
$contar = $listagem->fetch_row();
//recebe o valor
$id = $contar;

//se tiver registro na tabela exportar
if ($id[0] > 0 ) {

//apagar todos os dados da tabela zerando seu id tabela exportar
$sql = "TRUNCATE coletor_exportar";
mysqli_query($conexao, $sql);


//apagar as diferencas
$sql = "TRUNCATE diferenca";
mysqli_query($conexao, $sql);

//limpa diferenca
$result_usuario = "UPDATE coletar SET coleta = '0'";

$resultado_usuario = mysqli_query($conexao, $result_usuario);

//desfaz configuracao 
$sql = "DELETE FROM config WHERE conf = '5'";

mysqli_query($conexao, $sql) or die ("Erro:" .mysqli_error($conexao));


//enviando para a sessao a mensagem
$_SESSION['msg'] = "<div class='alert alert-success'><span class='glyphicon glyphicon-remove remove' aria-hidden='true'></span> Processamento desfeito!</div>";

//direcionando apos excluir os dados
header("Location: ../v_processar.php");

	} else {
		$_SESSION['msg'] = "<div class='alert alert-danger'><span class='glyphicon glyphicon-remove remove' aria-hidden='true'></span> Não há processamento para desfazer!</div>";
		header("Location: ../v_processar.php");
	
	}