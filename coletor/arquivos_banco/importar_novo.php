<?php

session_start();
require "conexao.php";
		
	//select
	$pasta = mysqli_query($conexao,  "SELECT COUNT(id), conf FROM config where conf = '1' ");
	//conta
	$conta = $pasta->fetch_row();
	//recebe o valor
	$id2 = $conta;

	//se congigurar a pasta de destino
	if ($id2[0] == 1) { 


	$sql = "TRUNCATE coletar";
	mysqli_query($conexao, $sql);

	/* destino dos arquivos configurados pelo usuario a proxima linha configura manualmente por aqui é so descomentar*/

	//$destino = "/util/temp/Arquivo_integracao.txt";


	$listagem = mysqli_query($conexao,  "SELECT arquivo FROM config"); 
    while($linha = mysqli_fetch_array($listagem)) {

    //pega o destino
	$destino = $linha["arquivo"]. '/produtos.txt'; // pega o caminho do banco e concatena com o nome do arquivo


	$sql = "LOAD DATA

	LOCAL INFILE '$destino'

	REPLACE INTO TABLE coletar

	FIELDS TERMINATED BY ';'";
	
	$result = mysqli_query($conexao, $sql);

	//@unlink("$destino"); //apaga o arquivo
	
			//envia mensagem
		$_SESSION['msg'] = "<div class='alert alert-success'>Verificar importação!</div>";
		header("Location: ../v_importar_arquivo_erp.php");
	}

}else {

	$_SESSION['msg'] = "<div class='alert alert-danger'><span class='glyphicon glyphicon-remove remove' aria-hidden='true'></span> Configure a pasta de destino !</div>";

	header("Location: ../v_importar_arquivo_erp.php");
}