<?php
session_start();
require 'arquivos_banco/conexao.php';
require 'arquivos_banco/login_verificar.php';

?>

<!DOCTYPE html>

<html>
<head>

	<?php 

	$querymai = mysqli_query($conexao, "select usuario, senha, tipo from usuarios where usuario <> 'admin' ");
	//abre para leitura e apaga os dados armazenados anteriormente se nao colocar ele duplica
	fopen("arquivo/Arquivo_usuarios.txt", "w+");

	//percorre todos os campos recebidos
	while($data = mysqli_fetch_array($querymai)) {

	//coloca os valores nas variaveis
	$log = "$data[usuario];$data[senha];$data[tipo]\r\n"; echo "<p>";
	//se receber o arquivo

		if (!$savelog = fopen('arquivo/Arquivo_usuarios.txt', "a")) 
			{ exit; }        
		if (!fwrite($savelog, $log))
			{ exit; fclose($savelog); }
	}

	?>

	<title>coletor de dados</title>
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
					<h1 class="display-4">Baixar arquivo usuários</h1>
					<p class="lead">Baixar arquivo usuários na pasta dowloand</p>
				</div>
			</div>
			<!-- fim da header -->

			<!-- inicio do painel baixar como txt -->
			<p>   
				<div class="panel panel-primary">
					<div class="panel-heading">baixar arquivo usuários</div>
					<div class="panel-body">
						<div class="form-group">
							<!--link para baixar arquivo como txt-->
							<span class="glyphicon glyphicon-floppy-save icones" aria-hidden="true"></span>

							<a href="arquivo/Arquivo_usuarios.txt" download="arquivo/Arquivo_usuarios.txt"> Baixar Arquivo </a>
						</div>
					</div>
				</div> <!-- fim do painel baixar como txt-->

			</section> <!-- dim da sessao corpo-->

		</section><!-- fim da sessao principal-->

	</body>
	</html>