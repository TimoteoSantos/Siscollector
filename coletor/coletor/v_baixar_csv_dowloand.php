<?php
session_start();
//conexao com banco
require 'arquivos_banco/conexao.php';
require 'arquivos_banco/login_verificar.php';
?>

<!DOCTYPE html>
<html>
<head>

	<?php

	$listagem = mysqli_query($conexao,  "SELECT COUNT(id)  FROM coletor_exportar");
	//conta
	$contar = $listagem->fetch_row();
	//revebe o valor
	$id = $contar;
	//se nao tiver registro na tabela coletor_exportar
	if ($id[0] < 1 ) { 

		//envia mensagem
		$_SESSION['msg'] = "<div class='alert alert-danger'><span class='glyphicon glyphicon-remove remove' aria-hidden='true'></span> Não há processado ou sem registro!</div>";

		//redireciona
		header("Location: v_baixar.php");

	}


	$querymai = mysqli_query($conexao, "select referencia, quantidade, descricao from coletor_exportar");

	//abre para leitura e apaga os dados armazenados anteriormente se nao colocar ele duplica
	fopen("arquivo/Arquivo_txt.csv", "w+");

	//percorre todos os campos recebidos
	while($data = mysqli_fetch_array($querymai)) {

	//coloca os valores nas variaveis
		$log = "$data[referencia];$data[quantidade];$data[descricao]\r\n"; echo "<p>";

	//se receber o arquivo
		if (!$savelog = fopen('arquivo/Arquivo_txt.csv', "a")) 
			{ exit; }        
		if (!fwrite($savelog, $log))
			{ exit; fclose($savelog); }
	}
	?>

	<title>Baixar como csv</title>

	<!-- link para os css-->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css.css">
	<link rel="stylesheet" href="normalize.css">

</head>

<body>
	
	<!-- sessao principal -->
	<section id="principal">
		<?php require 'v_cabecalho.php';?>

		<section class="corpo">

			<!-- header painel com a imagem -->
			<div class="jumbotron jumbotron-fluid">
				<div class="container">
					<h1 class="display-4">Baixar arquivo csv</h1>
					<p class="lead">Baixar arquivo .csv na pasta dowloand</p>
				</div>
			</div>
			<!-- fim da header -->

			<!-- inicio do painel baixar como csv -->
			<p>

				<div class="panel panel-primary">
					<div class="panel-heading">Baixar arquivo como .csv na pasta dowloand</div>
					<div class="panel-body">
						<div class="form-group">
							<span class="glyphicon glyphicon-floppy-save icones" aria-hidden="true"></span>
							
							<!--link para baixar arquivo como csv--> 
							<a href="arquivo/Arquivo_txt.csv" download="arquivo/Arquivo_txt.csv"> Baixar </a>
							
						</div>
					</div>
				</div> <!-- fim do painel baixar como csv-->

			</section> <!-- dim da sessao corpo-->

		</section><!-- fim da sessao principal-->
		<?php include 'v_rodape.php' ?>
	</body>
	</html>