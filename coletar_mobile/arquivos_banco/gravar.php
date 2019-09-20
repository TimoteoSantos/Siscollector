<?php

// inicia a sessao
session_start();
//conexao com banco
require '../../coletor/arquivos_banco/conexao.php';

//usar uma view para ver se já processou os dados
$listagem = mysqli_query($conexao,  "SELECT count(id) from coletor_exportar limit 1");

//conta a quandidade de linhas que carregaram e $listagem
$contar = $listagem->fetch_row();
//recebe a quantidade de registros da tabela exportar
$id = $contar;

//se tiver registro na tabela exportar senao nao deixa baixar
if ($id[0] > 0 ) {

	header("Location: ../index.php");
	$_SESSION['msg'] = "<span> ERRO! COLETA ENCERRADA <span>";

} else {


//estoque / loja
$estoque = mysqli_query($conexao, "SELECT estoque_loja from config where estoque_loja > 0 limit 1 ");

//o while repete a criaçao de linhas na tabela igual a quantidade de itens.
while($varrer = mysqli_fetch_array($estoque)) {
$estoque_ver = $varrer['0'];

					
					switch ($estoque_ver) {
						
						case '1':

							$gravar_estoque = 1;
							$gravar_loja = 0;
							break;

						case '2':

							$gravar_estoque = 0;
							$gravar_loja = 1;
							break;
						
						case '3':
							$gravar_estoque = 0;
							$gravar_loja = 0;
							break;
						
					

						}
		}//fim do estoque / loja

	$usuario = filter_var($_SESSION['usuario'], FILTER_SANITIZE_STRING);
	$ref = filter_var($_POST['ref'], FILTER_SANITIZE_STRING);
	$qt = filter_var($_POST['qt'], FILTER_SANITIZE_STRING);
	$hora = date('Y-m-d H:i:s');

	$listagem = mysqli_query($conexao, "SELECT referencia, descricao, fabricante from coletar where referencia = $ref  group by referencia; ");

	//o while repete a criaçao de linhas na tabela igual a quantidade de itens.
	while($linha = mysqli_fetch_array($listagem)) {

		//pega os dados da consulta while
		$referencia = $linha['referencia'];
		$descricao = utf8_encode($linha['descricao']);

		if ($ref == $referencia and $referencia > 0){

			//inseri os valores recebidos nas variaveis acima
			$query = "INSERT INTO coletor_importar (referencia, quantidade, descricao, usuario, hora, local_estoque, local_loja) VALUES ('$referencia', '$qt', '$descricao', '$usuario', '$hora', '$gravar_estoque', '$gravar_loja')" ; 
			// Executa a query
			mysqli_query($conexao, $query);
			header("Location: ../index.php");


			//fabricante errado
			$lista_conf = mysqli_query($conexao, "SELECT conf from config where conf = 4 ");	

			while($conf = mysqli_fetch_array($lista_conf)) {

			$conf = $conf['conf'];


			$lista = mysqli_query($conexao, "SELECT fabricante from pdf ");	

			while($fab = mysqli_fetch_array($lista)) {

			$fab = $fab['fabricante'];


			$fabricante = $linha['fabricante'];

			if ($fabricante <> $fab and $conf = 4){
			
			$_SESSION['msg'] = "<span class='alerta'>FABRICANTE NÃO É $fab ! </span> <span> <audio src='erro.mp3' autoplay></audio> </span>";


			}
		}

		}
	}

}
		//se o $ref não foi encontrado acima
		if ($ref != isset($referencia) and $ref > 0){

			$desc = utf8_decode('PRODUTO NÃO CADASTRADO');

			$query = "INSERT INTO coletor_importar (referencia, quantidade, descricao, usuario, hora, local_estoque, local_loja) VALUES ('$ref', '$qt', '$desc', '$usuario', '$hora', '$gravar_estoque', '$gravar_loja')" ; 
			
			// Executa a query
			mysqli_query($conexao, $query);
			header("Location: ../index.php");
			$_SESSION['msg'] = "<span class='alerta'>NÃO CADASTRADO </span> <span> <audio src='erro.mp3' autoplay></audio> </span>";

		}

		//se o $ref for igual ou menor que zero
		if ($ref <= 0){
			header("Location: ../index.php");
			$_SESSION['msg'] = "<span class='alerta'>BARRAS INVÁLIDO!</span>";

		}

}