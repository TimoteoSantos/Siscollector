 <?php
 session_start();
 require 'arquivos_banco/login_verificar.php';
 require 'arquivos_banco/contagens.php';
 ?>

<!DOCTYPE html>
<html>
<head>

	<title>coletor de dados</title>

	<!-- link para os css-->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="normalize.css">
	<link rel="stylesheet" href="css.css"> <!-- meu css -->


<!-- atualização automatica-->
	
<?php

include 'arquivos_banco/atualizar_automaticamente.php'

?>
	
</head>

<body>

	<!-- gif de atualização -->
	<?php include 'load.php' ?>

	
	<!-- sessao principal -->
	<section id="principal ">
		
		<?php require 'v_cabecalho.php'; ?>

		<section class="corpo ">

			<!-- header painel com a imagem -->
			<div class="jumbotron jumbotron-fluid">
				<div class="container">
					<h1 class="display-4">Siscollector</h1>
					<p class="lead">Sistema de gerênciamento de coletores</p>
				</div>
			</div>
			<!-- fim da header -->

			<section class="corpo_just">

			<!--painel de contagem produtos coletados-->
			<div class="panel panel-primary painel_contagem">
				<div class="panel-heading panel-heading-coletados vermelho">
					<h3 class="panel-title">  Quantidade de registros coletados</h3>
				</div>
				<div class="panel-body centro">
					<h4> <?php echo $coletado[0]; ?> </h4>
				</div>
			</div><!--fim do painel contagem produtos coletados-->

			
			<!--quantidade total-->
			<div class="panel panel-primary painel_contagem ">
				<div class="panel-heading panel-heading_index vermelho">
					<h3 class="panel-title"> Quantidade total de produtos </h3>
				</div>
				<div class="panel-body centro">
					<h4><?php echo $total[0]; ?> </h4>
				</div>
			</div><!--fim do painel contagem produtos importados-->


			<!--painel de contagem produtos processados-->
			<div class="panel panel-primary painel_contagem">
				<div class="panel-heading vermelho">
					<h3 class="panel-title"> <a href="v_listar_processados.php"> Quantidade de registros processados </a></h3>
				</div>
				<div class="panel-body centro">
					<h4> <?php echo $exportados[0]; ?> </h4>
				</div>
			</div><!--fim do painel contagem produtos processaos-->

			
			<!--painel de contagem produtos importados-->
			<div class="panel panel-primary painel_contagem">
				<div class="panel-heading panel-heading_index">
					<h3 class="panel-title"> Quantidade de registros Importados</h3>
				</div>
				<div class="panel-body centro">


					<h4><?php echo $importados[0]; ?> </h4>
				</div>
			</div><!--fim do painel contagem produtos importados-->
			

						
			<!--painel de contagem produtos importados-->
			<div class="panel panel-primary painel_contagem">
				<div class="panel-heading panel-heading_index">
					<h3 class="panel-title"> <a href="v_pesquisa_preco.php"> Produtos cadastrados no ERP </a></h3>
				</div>
				<div class="panel-body centro">
					<h4><?php echo $coletar[0]; ?> </h4>
				</div>
			</div><!--fim do painel contagem produtos importados-->




			<!--painel de contagem produtos importados
			<div class="panel panel-primary painel_contagem">
				<div class="panel-heading panel-heading_index">
					<h3 class="panel-title"> <a href="v_pesquisa_preco.php"> Quantidade Produtos Cadastrados no ERP </a></h3>
				</div>
				<div class="panel-body centro">
					<h4><?php echo $itens[0]; ?> </h4>
				</div>
			</div> fim do painel contagem produtos importados-->

			
			
			<!--painel de contagem produtos nao cadastrados-->
			<div class="panel panel-primary painel_contagem ">
				<div class="panel-heading panel-heading_index">
					<h3 class="panel-title"> <a href="v_listar_tempo_nao_cadastrado.php">Produtos não cadastrados </a></h3>
				</div>
				<div class="panel-body centro">
					<h4><?php echo $nao[0]; ?> </h4>
				</div>
			</div><!--fim do painel contagem produtos importados-->



			<!--quantidade total-->
			<div class="panel panel-primary painel_contagem ">
				<div class="panel-heading panel-heading_index vermelho destac">
					<h3 class="panel-title"> Porcentagem </h3>
				</div>
				<div class="panel-body centro cor_porcentagem">

					<h4><?php echo round($porcentagem,0); ?> % </h4>

					<div class="progress">

  						<div class="progress-bar progress-bar-striped  progress-bar-danger" role="progressbar" style="width:<?php echo round($porcentagem,0);?>%; heigth: 15px" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"><?php echo round($porcentagem,0);?>%</div>
					</div>
				
				</div>
			</div><!--fim do painel contagem produtos importados-->








			<div class="panel panel-primary painel_contagem">
				<div class="panel-heading panel-heading_index">
					<h3 class="panel-title"> <a href="v_diferenca_nao_encontrado.php">Tem na loja e não foi contada </a></h3>
				</div>
				<div class="panel-body centro">
					<h4><?php echo $total_diferencas[0]; ?> </h4>
				</div>
			</div>


			
			</section>

		</section>

	</section>

	<!--rodape com os arquivos do bootstrap -- >
		
	<?php  include 'rodape.php' ?>
	
	
</body>
</html>