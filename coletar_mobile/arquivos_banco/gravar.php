<?php

// inicia a sessao
session_start();
//conexao com banco
require '../../coletor/arquivos_banco/conexao.php';

//usar uma view para ver se já processou os dados
$listagem = mysqli_query($conexao,  "SELECT id from coletor_exportar");

//conta a quandidade de linhas que carregaram e $listagem
$contar = $listagem->fetch_row();
//recebe a quantidade de registros da tabela exportar
$id = $contar;

//se tiver registro na tabela exportar senao nao deixa baixar
if ($id[0] == 1 ) {

	header("Location: ../index.php");
	$_SESSION['msg'] = "<span> ERRO! COLETA ENCERRADA <span>";

} else {

	$usuario = filter_var($_SESSION['usuario'], FILTER_SANITIZE_STRING);
	$ref = filter_var($_POST['ref'], FILTER_SANITIZE_STRING);
	$qt = filter_var($_POST['qt'], FILTER_SANITIZE_STRING);
	$hora = date('Y-m-d H:i:s');


	$listagem = mysqli_query($conexao, "SELECT referencia, descricao from coletar where referencia = $ref  group by referencia; ");

	//o while repete a criaçao de linhas na tabela igual a quantidade de itens.
	while($linha = mysqli_fetch_array($listagem)) {

		//pega os dados da consulta while
		$referencia = $linha['referencia'];
		$descricao = utf8_encode($linha['descricao']);

		if ($ref == $referencia and $referencia > 0){

			//inseri os valores recebidos nas variaveis acima
			$query = "INSERT INTO coletor_importar (referencia, quantidade, descricao, usuario, hora) VALUES ('$referencia', '$qt', '$descricao', '$usuario', '$hora')" ; 
			// Executa a query
			mysqli_query($conexao, $query);
			header("Location: ../index.php");

		}
	}

		//se o $ref não foi encontrado acima
		if ($ref != isset($referencia) and $ref > 0){

			$desc = utf8_decode('PRODUTO NÃO CADASTRADO');

			$query = "INSERT INTO coletor_importar (referencia, quantidade, descricao, usuario, hora) VALUES ('$ref', '$qt', '$desc', '$usuario', '$hora')" ; 
			
			// Executa a query
			mysqli_query($conexao, $query);
			header("Location: ../index.php");
			$_SESSION['msg'] = "<span class='alerta'>NÃO CADASTRADO </span> <span> <audio src='erro.mp3' autoplay></audio> </span>";

		}

		//se o $ref for igual ou menor que zero
		if ($ref <= 0){
			header("Location: ../index.php");
			$_SESSION['msg'] = "<span class='alerta'>BARRAS VÁLIDO!</span>";


		}

}

