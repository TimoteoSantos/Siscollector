<?php


	require 'arquivos_banco/conexao.php';

	//processados
	$exportados = mysqli_query($conexao,  "SELECT COUNT(referencia)  FROM coletor_exportar");
	$exportados = $exportados->fetch_row();

	//coletados
	$importados = mysqli_query($conexao,  "SELECT count(id)  FROM coletor_importar ");
	$importados = $importados->fetch_row();
	
	//produtos de pesquisa
	$pesquisa   = mysqli_query($conexao,  "SELECT count(referencia)  FROM coletar ");
	$coletar    = $pesquisa->fetch_row();
	
	//nao cadastrados
	$nao_cadastrado = mysqli_query($conexao,  " SELECT COUNT(DISTINCT referencia) FROM coletor_importar where descricao = 'Produto nao cadastrado' ");
	$nao = $nao_cadastrado->fetch_row();
	
	//coletados produtos
	$quantidade_importado_produto = mysqli_query($conexao,  " SELECT COUNT(DISTINCT referencia) FROM coletor_importar");
	$coletado = $quantidade_importado_produto->fetch_row();

	
	$pesquisa_quantidade = mysqli_query($conexao,  " SELECT sum(quantidade) FROM coletar");
	$itens = $pesquisa_quantidade->fetch_row();
	
	
	$importados_quantidade = mysqli_query($conexao,  " SELECT sum(quantidade) FROM coletor_importar");
	$total = $importados_quantidade->fetch_row();



		
	/*
	FUNÇAO PARA AGRUPAR A CONTAGEM: COUNT(DISTINCT referencia)
	*/