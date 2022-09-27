<?php
	
	//conexao com o banco de dados
	$conexao = mysqli_connect("localhost", "tichronoscom_coletor", "Vida@1990", "tichronoscom_coletor_de_dados");
	
	//aviso de erro
	if (mysqli_connect_errno()) {
		printf ("erro ao conectar ao banco de dados!!!", mysqli_connect_error());
		
		exit();
	}



 ?>