<?php


	require 'arquivos_banco/conexao.php';

	//coloca em listagem um array com apenas os campos vazios de status
	$listagem = mysqli_query($conexao,  "SELECT COUNT(referencia)  FROM coletor_exportar");
	
	//conta a quandidade de linhas que carregaram e $listagem
	$exportados = $listagem->fetch_row();

	//coloca em listagem um array com apenas os campos vazios de status
	$listage = mysqli_query($conexao,  "SELECT count(referencia)  FROM coletor_importar ");
	
	//conta a quandidade de linhas que carregaram e $listagem
	$importados = $listage->fetch_row();
	
	//coloca em listagem um array com apenas os campos vazios de status
	$listage = mysqli_query($conexao,  "SELECT count(referencia)  FROM coletar ");
	
	//conta a quandidade de linhas que carregaram e $listagem
	$coletar = $listage->fetch_row();
	
	//produtos nao cadastrados contagem nao cadastrado
	
	// conta a quantidade ja agrupando as referencias
	$listage = mysqli_query($conexao,  " SELECT COUNT(DISTINCT referencia) FROM coletor_importar where descricao = 'Produto nao cadastrado' ");
		//conta a quandidade de linhas que carregaram e $listagem
	$nao = $listage->fetch_row();
	
	// conta a quantidade ja agrupando as referencias
	$listage = mysqli_query($conexao,  " SELECT COUNT(DISTINCT referencia) FROM coletor_importar");
		//conta a quandidade de linhas que carregaram e $listagem
	$coletado = $listage->fetch_row();
		
	/*
	FUNÇAO PARA AGRUPAR A CONTAGEM: COUNT(DISTINCT referencia)
	*/