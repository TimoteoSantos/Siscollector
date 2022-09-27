<?php
session_start();
//conexao
require 'conexao.php';

$listagem = mysqli_query($conexao,  "SELECT COUNT(id)  FROM coletor_exportar");
//conta
$contar = $listagem->fetch_row();
//recebe o valor
$id = $contar;

//se ele nao tiver processado
if ($id[0] < 1) { 

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
		$referencia = ($dados[0]);
		$quantidade = ($dados[1]);
		$descricao = ($dados[2]);
		$usuario = "importado_coletor_externo";

		//inseri os dados das variaveis acima no banco
		$result_usuario = "INSERT INTO coletor_importar (referencia, quantidade, descricao, usuario) VALUES ('$referencia', '$quantidade', '$descricao', '$usuario')";
		$result_usuario = mysqli_query($conexao, $result_usuario);


		//envia a mensagem de sucesso
		$_SESSION['msg'] = "<div class='alert alert-success'><span class='glyphicon glyphicon-ok icones' aria-hidden='true'></span> Gravado com sucesso!</div>";
		
		//direciona para a index
		header("Location: ../V_importar_arquivo.php");
	
	}

 	}else{ //se o valor de id da tabela coletor_exportar for maior que zero

		//envia a mensagem
		$_SESSION['msg'] = "<div class='alert alert-danger'><span class='glyphicon glyphicon-remove remove' aria-hidden='true'></span> Tem arquivo processado!</div>";
		//direciona
		header("Location: ../V_importar_arquivo.php");
		}