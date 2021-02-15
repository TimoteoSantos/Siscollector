<?php

// inicia a sessao
session_start();
//conexao com banco
require '../../coletor/arquivos_banco/conexao.php';

$listagem = mysqli_query($conexao,  "SELECT COUNT(id)  FROM vendas;");
//conta
$conta = $listagem->fetch_row();
//recebe o valor
$id2 = $conta;

//se tiver importado
if ($id2[0] > 0) {	

$listagem = mysqli_query($conexao,  "SELECT COUNT(id)  FROM coletor_exportar;");
//conta
$contar = $listagem->fetch_row();
//recebe o valor
$id = $contar;
//se nao tiver exportado
if ($id[0] < 1 ) { 

$_SESSION['msg'] = "<div class='alert alert-danger'> <span class='glyphicon glyphicon-remove remove' aria-hidden='true'></span> Você ainda não processou!</div>";
header("Location: ../index.php");

}else {

	$listage = mysqli_query($conexao, "SELECT referencia, sum(quantidade) from vendas where quantidade > 0 group by referencia;");

	//o while repete a criaçao de linhas na tabela igual a quantidade de itens.
	while($linha = mysqli_fetch_array($listage)) {

		//pega os dados da consulta while
		$ref = $linha['referencia'];
		$qt = $linha['sum(quantidade)'];

	$listagem = mysqli_query($conexao, "SELECT * from coletor_exportar where referencia = $ref  group by referencia;");

	//o while repete a criaçao de linhas na tabela igual a quantidade de itens.
	while($linha = mysqli_fetch_array($listagem)) {

		//pega os dados da consulta while
		$referencia = $linha['referencia'];
		$descricao = utf8_encode($linha['descricao']);
        $qtd = $linha['quantidade'];
        

        $quantidade = $qtd - $qt;
		
		if ($ref == $referencia){

						
			$result_usuario = "UPDATE coletor_exportar SET quantidade = '$quantidade' WHERE referencia = '$referencia';";
			$resultado_usuario = mysqli_query($conexao, $result_usuario);

								
			//apos gravar envia a mensagen
			$_SESSION['msg'] = "<div class='alert alert-success'><span class='glyphicon glyphicon-ok icones' aria-hidden='true'></span> Gerado com sucesso!</div>";
			
			//redireciona
			header("Location: ../index.php");



		}
	}
}

}

//se nao tiver produto importado
}else {
	//enviando para a sessao a mensagem
	$_SESSION['msg'] = "<div class='alert alert-danger'><span class='glyphicon glyphicon-remove remove' aria-hidden='true'></span> Não tem produto importado !</div>";
	header("Location: ../index.php");
		
}

