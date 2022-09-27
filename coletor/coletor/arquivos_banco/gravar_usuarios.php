<?php
session_start();
//conexao
require 'conexao.php';

	//recebe o arquivo da pagina index
	$arquivo = $_FILES["file"]["tmp_name"];
	$nome    = $_FILES["file"]["name"];

	//quebra das colunas 
	$ext = explode(";", $nome); 
	//abre o arquivo para leitura
	$objeto = fopen($arquivo, 'r');
	//pega cada dado de cada dado campo separado pelo explode
	while (($dados  = fgetcsv($objeto, 1000, ";")) !== FALSE)

	{

	//pega os dados do while acima e coloca nas variaveis
	$usuario = ($dados[0]);
	$senha = ($dados[1]);
	$tipo = ($dados[2]);
		
	//inseri os dados no banco
	$result_usuario = "INSERT INTO usuarios (usuario, senha, tipo) VALUES ('$usuario', '$senha', '$tipo')";
	$result_usuario = mysqli_query($conexao, $result_usuario);

	//envia a mensagem de sucesso para a index
	$_SESSION['msg'] = "<div class='alert alert-success'><span class='glyphicon glyphicon-ok icones' aria-hidden='true'></span> Gravado com sucesso!</div>";

	//redireciona
	header("Location: ../v_importar_integracao.php");

	}