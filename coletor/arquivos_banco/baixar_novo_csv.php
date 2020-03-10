<?php
session_start();	
require "conexao.php";

$listagem = mysqli_query($conexao,  "SELECT COUNT(id)  FROM coletor_exportar");
//conta
$contar = $listagem->fetch_row();
//pegar o valor
$id = $contar;
//se tiver exportado
if ($id[0] > 0 ) {

    $listagem = mysqli_query($conexao,  "SELECT arquivo FROM config"); 
    while($linha = mysqli_fetch_array($listagem)) {


	//baixa
	$sql = "SELECT referencia, quantidade, descricao FROM coletor_exportar
	INTO OUTFILE '/util/teste.csv'
	FIELDS TERMINATED BY ';'
	ENCLOSED BY ''
	LINES TERMINATED BY '\n'";
	
	$result = mysqli_query($conexao, $sql);
}
	//se baixar
	if ($result) {
		
		$_SESSION['msg'] = "<div class='alert alert-success'>Arquivo foi exortado para pasta. '$destino' </div>";

		header("Location: ../v_baixar.php");

	//se nao baixar
	}else{

		$_SESSION['msg'] = "<div class='alert alert-danger'>ERRO! verifique se a pasta. '$destino'.  existe se existir verifique se possui o arquivo 'arquivo_processado.csv' apague-o ou mova-o antes de baixar!</div>";
		header("Location: ../v_baixar.php");

	}
//se nao tiver processado	
}else{


	$_SESSION['msg'] = "<div class='alert alert-danger'>Erro! nada Exportado!</div>";
	header("Location: ../v_baixar.php");
	
}