<?php

// inicia a sessao
session_start();
//conexao com banco
require '../../coletor/arquivos_banco/conexao.php';

//saber se ja processou
$listagem = mysqli_query($conexao,  "SELECT max(id) as id from coletor_exportar limit 1");
$contar = $listagem->fetch_row();
$id = $contar;

//se processou
if ($id[0] > 0 ) {

	header("Location: ../index.php");
	$_SESSION['msg'] = "<span> ERRO! COLETA ENCERRADA <span>";

	} else {

			//valor da varia caso nao exista no while abaixo valor padrao
			$gravar_estoque = 0;
			$gravar_loja = 0;

		//estoque / loja selecao
		$estoque = mysqli_query($conexao, "SELECT estoque_loja from config where estoque_loja > 0 limit 1 ");

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
			
			default:
				$gravar_estoque = 0;
				$gravar_loja = 0;
				break;
								
				}
			} //fim do estoque / loja

			$usuario = filter_var($_SESSION['usuario'], FILTER_SANITIZE_STRING);
			$ref = filter_var($_POST['ref'], FILTER_SANITIZE_STRING);
			$qt = filter_var($_POST['qt'], FILTER_SANITIZE_STRING);
			$hora = date('Y-m-d H:i:s');

			$listagem = mysqli_query($conexao, "SELECT referencia, descricao, fabricante from coletar where referencia = $ref  group by referencia; ");

			while($linha = mysqli_fetch_array($listagem)) {

				$referencia = $linha['referencia'];
				$descricao = utf8_encode($linha['descricao']);

					
		if ($ref == $referencia and $referencia > 0) {

			$query = "INSERT INTO coletor_importar (referencia, quantidade, descricao, usuario, hora, local_estoque, local_loja) VALUES ('$ref', '$qt', '$descricao', '$usuario', '$hora', '$gravar_estoque', '$gravar_loja')" ; 
			mysqli_query($conexao, $query);
			header("Location: ../index.php");
							
				//fabricante verificar se o fabricante é o configurado

				$lista_conf = mysqli_query($conexao, "SELECT conf from config where conf = 4 ");	

				while($conf = mysqli_fetch_array($lista_conf)) {

				$conf = $conf['conf'];

				$lista = mysqli_query($conexao, "SELECT fabricante from pdf ");	

				while($fab = mysqli_fetch_array($lista)) {

				$fab = $fab['fabricante'];

				$fabricante = $linha['fabricante'];

					if ($fabricante <> $fab and $conf = 4) {
							
						$_SESSION['msg'] = "<span class='alerta'>FABRICANTE NÃO É $fab ! </span> <span> <audio src='erro.mp3' autoplay></audio> </span>";


						
						}
					}
				}
			}
		}

				//se nao cadastrado 
				if ($ref != isset($referencia) and $ref > 0){

					$desc = utf8_decode('PRODUTO NÃO CADASTRADO');

					$query = "INSERT INTO coletor_importar (referencia, quantidade, descricao, usuario, hora, local_estoque, local_loja) VALUES ('$ref', '$qt', '$desc', '$usuario', '$hora', '$gravar_estoque', '$gravar_loja')" ; 
							
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