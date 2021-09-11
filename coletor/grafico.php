<?php


 require 'arquivos_banco/contagens.php';

 ?>


 <!-- link para os css-->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="normalize.css">
	<link rel="stylesheet" href="css.css"> <!-- meu css -->



			<!--quantidade total-->
			<div class="panel panel-primary painel_contagem ">
				<div class="panel-heading panel-heading_index vermelho destac">
					<h3 class="panel-title"> Porcentagem </h3>
				</div>
				<div class="panel-body centro cor_porcentagem">

					<h4><?php echo round($porcentagem,0); ?> % </h4>

					<div class="progress">

  						<div class="progress-bar progress-bar-striped  progress-bar-danger largura" role="progressbar" style="width:<?php echo round($porcentagem,0);?>%; heigth: 15px" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"><?php echo round($porcentagem,0);?>%</div>
					</div>
				
				</div>
			</div><!--fim do painel contagem produtos importados-->
