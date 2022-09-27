<?php
session_start();

require "conexao.php";

$listagem = mysqli_query($conexao,  "SELECT COUNT(id)  FROM coletor_exportar");
//conta
$contar = $listagem->fetch_row();
//recebe o valor
$id = $contar;

$listagem = mysqli_query($conexao,  "SELECT COUNT(id)  FROM coletor_importar");
//conta
$conta = $listagem->fetch_row();
//recebe o valor
$id2 = $conta;

//se naa processou e tem importado
if ($id[0] < 1 and $id2[0] > 0) { 

//soma a quantidade e agrupa os referencias
	$listagem = mysqli_query($conexao, "SELECT referencia, sum(quantidade), descricao, sum(local_estoque), sum(local_loja) from coletor_importar group by referencia; ");
	while($linha = mysqli_fetch_array($listagem)) {

//pega os dados da consulta while
		$referencia = $linha['referencia'];
		$quantidade = $linha['sum(quantidade)'];
		$descricao = $linha['descricao'];
		$local_estoque = $linha['sum(local_estoque)'];
		$local_loja = $linha['sum(local_loja)'];

//inseri os valores recebidos nas variaveis acima
		$query = "INSERT INTO coletor_exportar (referencia, quantidade, descricao, local_estoque, local_loja) VALUES ('$referencia', '$quantidade', '$descricao', '$local_estoque', '$local_loja')" ; 

// Executa a query
		mysqli_query($conexao, $query);


			//diferenca

			$result_usuario = "UPDATE coletar SET coleta = '1' WHERE referencia = '$referencia'";

			$resultado_usuario = mysqli_query($conexao, $result_usuario);



//apos gravar envia a mensagen
		$_SESSION['msg'] = "<div class='alert alert-success'><span class='glyphicon glyphicon-ok icones' aria-hidden='true'></span> Processado com sucesso!</div>";
//redireciona
		header("Location: ../v_processar.php");

	}
//se ja processou ou nao tem importado
}else{
	$_SESSION['msg'] = "<div class='alert alert-danger'><span class='glyphicon glyphicon-remove remove' aria-hidden='true'></span> Já processado ou sem registro!</div>";
	//envia mensagem
	header("Location: ../v_processar.php");
}

