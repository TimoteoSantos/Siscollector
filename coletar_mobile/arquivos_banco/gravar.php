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
	$_SESSION['msg'] = "<span> DESCULPA! COLETA ENCERRADA :( <span>";

	} else {
	//se nao processou

		
		require_once 'verificar_estoque_loja.php';

			$usuario = filter_var($_SESSION['usuario'], FILTER_SANITIZE_STRING);
			$ref = filter_var($_POST['ref'], FILTER_SANITIZE_STRING);
			$qt = filter_var($_POST['qt'], FILTER_SANITIZE_STRING);
			$hora = date('Y-m-d H:i:s');

			$listagem = mysqli_query($conexao, "SELECT referencia, descricao, fabricante from coletar where referencia = $ref  group by referencia; ");

			while($linha = mysqli_fetch_array($listagem)) {

				$referencia = $linha['referencia'];
				$descricao = utf8_encode($linha['descricao']);
				$fabricante = $linha['fabricante'];

					
		if ($ref == $referencia and $referencia > 0) {

			$query = "INSERT INTO coletor_importar (referencia, quantidade, descricao, usuario, hora, local_estoque,fabricante, local_loja) VALUES ('$ref', '$qt', '$descricao', '$usuario', '$hora', '$gravar_estoque','$fabricante', '$gravar_loja')" ; 
			
			

			if ($conexao->query($query) === TRUE) {

				$_SESSION['msg'] = "<span class='alerta'><span><audio src='gravou.mp3' autoplay></audio> </span>";
			    
			} else {

			    $_SESSION['msg'] = "<span class='alerta'><span>Algo deu errado!<audio src='erro.mp3' autoplay></audio> </span>";
			}


			header("Location: ../index.php");
							

				//fabricante verificar se o fabricante é o configurado
				require_once 'verificar_fabricante.php';
			

			}
		}

				//se nao cadastrado 
				if ($ref != isset($referencia) and $ref > 0){

					$desc = utf8_decode('PRODUTO NAO CADASTRADO');

					$query = "INSERT INTO coletor_importar (referencia, quantidade, descricao, usuario, hora, local_estoque, local_loja) VALUES ('$ref', '$qt', '$desc', '$usuario', '$hora', '$gravar_estoque', '$gravar_loja')" ; 
							
					
					if ($conexao->query($query) === TRUE) {

				$_SESSION['msg'] = "<span class='alerta'>NÃO CADASTRADO </span> <span> <audio src='erro.mp3' autoplay></audio> </span>";
			    
			} else {

			    $_SESSION['msg'] = "<span class='alerta'><span> Algo deu errado!<audio src='erro.mp3' autoplay></audio> </span>";

			}

			
			header("Location: ../index.php");
					
				
			}

	}