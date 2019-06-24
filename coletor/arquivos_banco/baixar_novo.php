<?php
session_start();	
require "conexao.php";

$listagem = mysqli_query($conexao,  "SELECT COUNT(id)  FROM coletor_exportar");
//contar
$contar = $listagem->fetch_row();
//pegar o valor
$id = $contar;
//se tiver processado
if ($id[0] > 0 ) {

	$listagem = mysqli_query($conexao,  "SELECT arquivo FROM config"); 
    while($linha = mysqli_fetch_array($listagem)) {

    //pega o destino
	$destino = $linha["arquivo"]. '/arquivo_processado.txt'; // pega o caminho do banco e concatena com o nome do arquivo

	@unlink("$destino"); //apaga o arquivo

	/* destino dos arquivos configurados pelo usuario a proxima linha configura manualmente por aqui é so descomentar*/

	//$destino = "/util/temp/Arquivo_integracao.txt";
	
	//baixa
	$sql = "SELECT referencia, quantidade, descricao INTO OUTFILE  '$destino'
	FIELDS TERMINATED BY ';'
	LINES TERMINATED BY '\r\n'
	FROM coletor_exportar";
	
	$result = mysqli_query($conexao, $sql);
	
	}
	//se baixar
	if ($result) {
		//envia mensagem
		$_SESSION['msg'] = "<div class='alert alert-success'>Arquivo foi exortado para pasta. '$destino'!</div>";

		header("Location: ../v_baixar.php");
	//se nao baixar
	}else{

		$_SESSION['msg'] = "<div class='alert alert-danger'>ERRO! verifique se a pasta. '$destino'. existe!</div>";
		header("Location: ../v_baixar.php");

	}
//se nao tiver processado
}else{
	//envia mensagem
	$_SESSION['msg'] = "<div class='alert alert-danger'>Erro! nada Exportado!</div>";
	header("Location: ../v_baixar.php");
}