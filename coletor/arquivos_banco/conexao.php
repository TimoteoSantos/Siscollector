<?php
	
	//conexao com o banco de dados
	$conexao = mysqli_connect("localhost", "root", "", "coletor_2.0");
	
	//aviso de erro
	if (mysqli_connect_errno()) {
		printf ("erro ao conectar ao banco de dados!!!", mysqli_connect_error());
		
		exit();
	}



 ?>