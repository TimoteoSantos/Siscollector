<?php
// inicia a sessao
session_start();
//conexao com banco
require 'conexao.php';



$listagem = mysqli_query($conexao,  "SELECT COUNT(id)  FROM coletor_exportar");
//conta
$contar = $listagem->fetch_row();
//recebe o valor
$id = $contar;
//se nao tiver exportado
if ($id[0] < 1 ) { 

$_SESSION['msg'] = "<div class='alert alert-danger'> <span class='glyphicon glyphicon-remove remove' aria-hidden='true'></span> Você ainda não processou!</div>";
header("Location: ../v_baixar.php");

}else {


$listagem = mysqli_query($conexao,  "SELECT COUNT(id)  FROM diferenca");
//conta
$conta = $listagem->fetch_row();
//recebe o valor
$id2 = $conta;

//se naa processou e tem importado
if ($id2[0] < 1) { 




	$quer = "INSERT INTO config (conf, diferenca) VALUES ('5', '1')"; 
	// Executa a query
	mysqli_query($conexao, $quer);



	$listage = mysqli_query($conexao, "SELECT * from coletar;");

	//o while repete a criaçao de linhas na tabela igual a quantidade de itens.
	while($linha = mysqli_fetch_array($listage)) {

		//pega os dados da consulta while
		$ref = $linha['referencia'];
		$qt = $linha['quantidade'];
		$fabricante = $linha['fabricante'];
		$desc = $linha['descricao'];
		$grupo = $linha['grupo'];


	$listagem = mysqli_query($conexao, "SELECT * from coletor_exportar where referencia = $ref  group by referencia;");

	//o while repete a criaçao de linhas na tabela igual a quantidade de itens.
	while($linha = mysqli_fetch_array($listagem)) {

		//pega os dados da consulta while
		$referencia = $linha['referencia'];
		$descricao = utf8_encode($linha['descricao']);
		$quantidade = $linha['quantidade'];
		


		if ($ref == $referencia and $quantidade <> $qt){


			//inseri os valores recebidos nas variaveis acima
			$query = "INSERT INTO diferenca (referencia, quantidade_sistema, quantidade_coletada, descricao, fabricante, status, grupo) VALUES ('$referencia', '$qt', '$quantidade', '$desc', '$fabricante','coletado', '$grupo')"; 
			// Executa a query
			mysqli_query($conexao, $query);

			
		
			//apos gravar envia a mensagen
			$_SESSION['msg'] = "<div class='alert alert-success'><span class='glyphicon glyphicon-ok icones' aria-hidden='true'></span> Gerado com sucesso!</div>";
			
			//redireciona
			header("Location: ../v_baixar.php");


		}
	}
}


}else{
	$_SESSION['msg'] = "<div class='alert alert-danger'><span class='glyphicon glyphicon-remove remove' aria-hidden='true'></span> Você já gerou o arquivo limpe para fazer de novo!</div>";
	//envia mensagem
	header("Location: ../v_baixar.php");


}

}




header("Location: ../v_baixar.php");