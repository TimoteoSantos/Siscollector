<?php
session_start();
//conexao
require 'conexao.php';

	//inseri os dados das variaveis acima no banco primeiro apaga
	$apagar = "TRUNCATE coletar";
	mysqli_query($conexao, $apagar);

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
		$descricao = ($dados[1]);

		$preco = str_replace(",",".", $dados[2]);

		$quantidade = ($dados[3]);
		$fabricante = ($dados[4]);
		$grupo = ($dados[5]);

		
	//inseri os dados das variaveis acima no banco
	$result_usuario = "INSERT INTO coletar (referencia,descricao, preco, quantidade, fabricante, grupo) VALUES ('$referencia', '$descricao', '$preco',  '$quantidade', '$fabricante', '$grupo')";
	$result_usuario = mysqli_query($conexao, $result_usuario);

//envia a mensagem de sucesso para a index

$_SESSION['msg'] = '<div class="alert alert-success role="alert" >Gravados com sucesso</div>';
//direciona para a index
header("Location: ../v_importar_arquivo_erp.php");

}
