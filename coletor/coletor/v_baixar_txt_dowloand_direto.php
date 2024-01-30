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


	$querymai = mysqli_query($conexao, "SELECT referencia, SUM(quantidade) AS quantidade, descricao FROM coletor_importar GROUP BY referencia ORDER BY referencia_ordem");

	//abre para leitura e apaga os dados armazenados anteriormente se nao colocar ele duplica
	fopen("arquivo/Arquivo_txt.txt", "w+");

	//percorre todos os campos recebidos
	while($data = mysqli_fetch_array($querymai)) {

	//coloca os valores nas variaveis
	$log = "$data[referencia];$data[quantidade];$data[descricao]\r\n"; echo "<p>";
	
	//se receber o arquivo
		if (!$savelog = fopen('arquivo/Arquivo_txt.txt', "a")) 
			{ exit; }        
		if (!fwrite($savelog, $log))
			{ exit; fclose($savelog); }
	}

	?>


	<title>baixar como texto</title>
	<!-- link para os css-->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css.css">
	<link rel="stylesheet" href="normalize.css">
</head>

<body>
	
	<!-- sessao principal -->
	<section id="principal">

		<?php require 'v_cabecalho.php';//menu?>
		
		<section class="corpo">

			<!-- header painel com a imagem -->
			<div class="jumbotron jumbotron-fluid">
				<div class="container">
					<h1 class="display-4">Baixar arquivo .txt sem processar</h1>
					<p class="lead">Baixar arquivo .txt na pasta dowloand</p>
				</div>
			</div>
			<!-- fim da header -->


			<!-- inicio do painel baixar como txt -->
			<p> 
				<div class="panel panel-primary">
					<div class="panel-heading">Baixar arquivo como .txt na pasta dowloand</div>
					<div class="panel-body">
						<div class="form-group">
							<span class="glyphicon glyphicon-floppy-save icones" aria-hidden="true"></span>
							
							<!--link para baixar arquivo como txt--> 
							<a href="arquivo/Arquivo_txt.txt" download="arquivo/Arquivo_direto_sem_processar_txt.txt"> Baixar </a>
						</div>
					</div>
				</div> <!-- fim do painel baixar como txt-->

			</section> <!-- dim da sessao corpo-->
		</section><!-- fim da sessao principal-->

	</body>
	</html>
	
	