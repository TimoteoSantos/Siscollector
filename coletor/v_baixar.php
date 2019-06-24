<?php
session_start();
require 'arquivos_banco/login_verificar.php';
  //conexao com banco
require 'arquivos_banco/conexao.php';

?>
<!DOCTYPE html>

<html>

<head>

	<title>coletor de dados</title>
	<!-- link para os css-->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css.css">
	<link rel="stylesheet" href="normalize.css">


</head>

<body>

	<!-- sessao principal -->
	<section id="principal">
		<!--inclusao do menu -->
		<?php	require 'v_cabecalho.php'; ?>

		<section class="corpo">

			<!-- header painel com a imagem -->
			<div class="jumbotron jumbotron-fluid">
				<div class="container">
					<h1 class="display-4">Baixar arquivos</h1>
					<p class="lead">Baixar arquivos</p>
				</div>
			</div>
			<!-- fim da header -->


			<?php require 'arquivos_banco/mensagens.php'; //mensagens de aviso ?>


			<!-- inicio do painel baixar como txt -->
			<p> 

				<div class="panel panel-primary panel-lang">
					<div class="panel-heading">Baixar arquivo na pasta dowloand</div>
					<div class="panel-body">
						<div class="form-group">
							<!--link para baixar arquivo como txt--> 
							<a href="v_baixar_txt_dowloand.php">

								<!-- imagem icone -->
								<span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span>
							Baixar .txt</a>

							<p>

								<!--link para baixar arquivo como .csv--> 
								<a href="v_baixar_csv_dowloand.php">

									<!-- imagem icone -->
									<span class="glyphicon glyphicon-floppy-save icones" aria-hidden="true"></span>
									Baixar .csv</a>

						</div>
							</div>
						</div>
						<!-- fim do painel baixar como txt-->

						<!-- inicio do painel baixar como txt no servidor -->
						<p>   

							<div class="panel panel-danger panel-lang">
								<div class="panel-heading">Baixar arquivo como .txt na pasta do servidor</div>
								<div class="panel-body">
									<div class="form-group">
										<!--link para baixar arquivo como .csv--> 
										<!-- imagem icone -->
										<span class="glyphicon glyphicon-floppy-save icones" aria-hidden="true"></span>
										<a href="arquivos_banco/baixar_novo.php">Baixar .txt</a>

										<br>

										<!-- imagem icone -->
										<span class="glyphicon glyphicon-floppy-save icones" aria-hidden="true"></span>
										<a href="arquivos_banco/baixar_novo_csv.php">Baixar .csv</a>

									</div>
								</div>
							</div>
							<!-- fim do painel baixar como txt no servidor-->


							<!-- inicio do painel abrir PDF -->
							<p>

								<div class="panel panel-danger panel-lang">
									<div class="panel-heading"> Abrir PDF</div>
									<div class="panel-body">
										<div class="form-group">
											<!--link para baixar arquivo como .csv--> 

											<!-- imagem icone -->
											<span class="glyphicon glyphicon-floppy-save icones" aria-hidden="true"></span>
											<a href="arquivos_banco/gerar_pdf.php" target="_blank">PDF</a>

											<br>

											<!-- imagem icone -->
											<span class="glyphicon glyphicon-floppy-save icones" aria-hidden="true"></span>
											<a href="arquivos_banco/gerar_pdf_baixar.php" target="_blank">Baixar PDF</a>

										</div>
									</div>
								</div>
								<!-- fim do painel baixar como txt no servidor-->


								<!-- inicio do painel abrir PDF DIFERENÇA -->
								<p>

									<div class="panel panel-danger panel-lang">
										<div class="panel-heading red2"> Divergencia</div>
										<div class="panel-body">
											<div class="form-group">
												<!--link para baixar arquivo como .csv--> 

												<!-- imagem icone -->
												<span class="glyphicon glyphicon-retweet icones" aria-hidden="true"></span>
												<a href="arquivos_banco/gravar_diferenca_coletado.php">Gerar registros</a>
												<P>
												<span class="glyphicon glyphicon-floppy-remove icones" aria-hidden="true"></span>
												<a href="arquivos_banco/excluir_diferenca.php">Desfazer</a>
												<hr>
												<p>
												<span class="glyphicon glyphicon-list icones" aria-hidden="true"></span>
												<a href="v_diferenca.php">Visualizar diferenca todos os produtos</a>
												<p>
												<span class="glyphicon glyphicon-align-justify icones" aria-hidden="true"></span>
												<a href="v_diferenca_coletado.php">Visualizar diferenca só coletado</a>
												<p>
												<span class="glyphicon glyphicon-indent-left icones" aria-hidden="true"></span>
												<a href="v_diferenca_fabricante.php">Visualizar diferenca de um fabricante</a>
												<p>
												<!--<span class="glyphicon glyphicon-indent-left icones" aria-hidden="true"></span>
												<a href="v_diferenca_fabricante_grupo.php">Visualizar diferenca de fabricante e grupo</a> -->

											</div>
										</div>
									</div>
									<!-- fim-->
									

									<!-- inicio do painel abrir baixaar direto -->
									<p>

										<div class="panel panel-danger contorno panel-lang ">
											<div class="panel-heading vermelho"> Baixar direto sem processar</div>
											<div class="panel-body">
												<div class="form-group">
													<!--link para baixar arquivo como .csv--> 

													<!-- imagem icone -->
													<span class="glyphicon glyphicon-floppy-save icones" aria-hidden="true"></span>
													<a href="v_baixar_txt_dowloand_direto.php" target="_blank">Baixar .txt</a>
												</div>
											</div>
										</div>
										<!-- fim do painel baixar como txt no servidor-->


										<!-- dim da sessao corpo-->
									</section>
									<!-- fim da sessao principal-->
								</section>

							</body>
							</html>