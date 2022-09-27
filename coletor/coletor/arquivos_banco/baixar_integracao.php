<?php
session_start();

require "conexao.php";

$listagem = mysqli_query($conexao,  "SELECT COUNT(id)  FROM coletor_importar");
//contar
$contar = $listagem->fetch_row();
//pega o valor
$id = $contar;

//se tiver importados
if ($id[0] > 0 ) {

	$listagem = mysqli_query($conexao,  "SELECT arquivo FROM config"); 
    while($linha = mysqli_fetch_array($listagem)) {

	$destino = $linha["arquivo"]. '/arquivo_processado.txt'; // pega o caminho do banco e concatena com o nome do arquivo

	@unlink("$destino"); //apaga o arquivo

		//baixa
		$sql = "SELECT referencia, quantidade, descricao, usuario INTO OUTFILE '$destino' 
		FIELDS TERMINATED BY ';'
		LINES TERMINATED BY '\r\n'
		FROM coletor_importar";

		$resul = mysqli_query($conexao, $sql);

		//usuarios

		@unlink("$destino");

		//baixa
		$sql = "SELECT usuario, senha INTO OUTFILE '$destino' 
		FIELDS TERMINATED BY ';'
		LINES TERMINATED BY '\r\n'
		FROM usuarios where usuario != 'admin'";

		$result = mysqli_query($conexao, $sql);
		}
		//se baixar
		if ($result) {

			$_SESSION['msg'] = "<div class='alert alert-success'>Arquivo foi exortado para pasta '$destino'!</div>";
			header("Location: ../v_baixar_integracao.php");

				//se nao baixar
				}else{
				//envia mensagem
				$_SESSION['msg'] = "<div class='alert alert-danger'>ERRO! configurar pasta!</div>";
				header("Location: ../v_baixar_integracao.php");

				}
		//se nao tiver importado
		}else{

			$_SESSION['msg'] = "<div class='alert alert-danger'>Erro! nada coletado!</div>";
			header("Location: ../v_baixar_integracao.php");
			}