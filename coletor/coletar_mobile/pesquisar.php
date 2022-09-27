<?php

session_start();
require  '../../coletor/arquivos_banco/conexao.php';

	$ref = $_POST['ref'];


		$listagem = mysqli_query($conexao, "SELECT * from coletar where referencia = $ref  group by referencia; ");

		while($linha = mysqli_fetch_array($listagem)) {
				
			
				$referencia = $linha['referencia'];
				$codigo = $linha['preco'];
				$descricao = $linha['descricao'];

if ($ref == $referencia){

	header("Location: index.php");
	
	$_SESSION['msg'] = "<p style='color:#FF4500; size=22px;'> $linha[preco] | <span style='color:#800000; size=22px;'> $linha[quantidade] </span> <span style='color:black; size=22px;'>| $linha[descricao] <br> $linha[referencia] | </span> <span style='color:green; size=22px;'> $linha[fabricante] </span> </p>";
	

	}
}


if ($ref != $referencia){

	header("Location: index.php");
	$_SESSION['msg'] = "<p style='color:#B22222;'> <audio src='erro.mp3' autoplay></audio> SEM CADASTRO!</p>";


	}



?>