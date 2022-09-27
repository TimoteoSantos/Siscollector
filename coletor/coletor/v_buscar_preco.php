<?php
 session_start();
 require 'arquivos_banco/login_verificar.php';
 require 'arquivos_banco/contagens.php';

 ?>

 <!DOCTYPE html>
 <html>
 <head>

 	<style>

 	.container {
 		margin-bottom:150px;
 	}

 </style>

 <title>coletor de dados</title>

 <!-- link para os css-->
 <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
 <link rel="stylesheet" href="normalize.css">
 <link rel="stylesheet" href="css.css"> <!-- meu css -->

</head>

<body>
	<!-- sessao principal -->
	<section>
		
		<?php require 'v_cabecalho.php'; ?>

		<section class="corpo">

			<!-- header painel com a imagem -->
			<div class="jumbotron jumbotron-fluid">
				<div class="container">
					<h1 class="display-4">Pesquisa de produto</h1>
					<p class="lead">Pesquisar produto do ERP</p>
				</div>
			</div>
			<!-- fim da header -->

			<div>

			</div>
			<hr>

			<div class="centro">
				<div>

					<form method="POST" action="v_listar_preco.php">

						<fieldset class="fieldset2">

							<div class="form-group">
								<input type="text" name="pesquisar" placeholder="Pesquisar pelo nome" class="form-control btn2" require = "" autofocus="">
							</div>

							<input type="submit" value="Pesquisar" class="btn btn-primary btn2">
						</fieldset>

					</form>

				</div>

			</div>
			
			
		</section>
	</section>

</body>
</html>