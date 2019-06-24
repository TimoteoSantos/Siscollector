<?php
	
	//conexao com o banco de dados
	$conexao = mysqli_connect("localhost", "root", "", "coletor");
	
	//aviso de erro
	if (mysqli_connect_errno()) {
		printf ("erro ao conectar ao banco de dados!!!", mysqli_connect_error());
		
	header("Location: arquivos_banco/arquivos_para_instalacao/instalar_coletor/index.php");

		exit();
	}



 ?>