<?php
session_start();
//conexao
require '../../coletor/arquivos_banco/conexao.php';

	//inseri os dados das variaveis acima no banco primeiro apaga
	$apagar = "TRUNCATE vendas";
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
		$quantidade = ($dados[2]);
		$dataHora = ($dados[3]);
		



		$data_hora = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $dataHora)));

  		//inseri os dados das variaveis acima no banco
	$result_usuario = "INSERT INTO vendas (referencia,descricao, quantidade, data_hora) VALUES ('$referencia', '$descricao', '$quantidade' ,'$data_hora')";
	$result_usuario = mysqli_query($conexao, $result_usuario);

//envia a mensagem de sucesso para a index
$_SESSION['msg'] = '<div class="alert alert-success role="alert" >Gravados com sucesso</div>';
//direciona para a index
header("Location: ../index.php");

}