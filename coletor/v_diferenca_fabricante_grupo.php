
<?php

session_start();
//conexao com banco
require 'arquivos_banco/conexao.php';
//inicia a sessao
require 'arquivos_banco/login_verificar.php';

?>

<!DOCTYPE html>
<html>
<head>

<?php


 
  $listagem = mysqli_query($conexao,  "SELECT COUNT(id)  FROM coletor_exportar");
  //conta
  $contar = $listagem->fetch_row();
  //recebe o valor
  $id = $contar;
  //se nao tiver exportado
  if ($id[0] < 1 ) { 

  $_SESSION['msg'] = "<div class='alert alert-danger'> <span class='glyphicon glyphicon-remove remove' aria-hidden='true'></span> Você ainda não processou!</div>";
  header("Location: v_baixar.php");

  }


  $listagem = mysqli_query($conexao,  "SELECT COUNT(id)  FROM config where conf = '5' ");
  //conta
  $contar = $listagem->fetch_row();
  //recebe o valor
  $id3 = $contar;
  //se nao tiver exportado
  if ($id3[0] <> 1 ) { 

  $_SESSION['msg'] = "<div class='alert alert-danger'> <span class='glyphicon glyphicon-remove remove' aria-hidden='true'></span> Primeiro deve gravar a diferenca! </div>";
  header("Location: v_baixar.php");

  }


  ?>

	<title> coletor de dados</title>

	<!-- link para os css-->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css.css">
	<link rel="stylesheet" href="normalize.css">

</head>

<body>
	
	<!-- sessao principal -->
	<section id="principal">

		<?php   require 'v_cabecalho.php';   ?>

		<section class="corpo">

			<!-- header -->
			<div class="jumbotron jumbotron-fluid">
				<div class="container">
					<h1 class="display-4">Diferênça na contagem por fabricante</h1>
					<p class="lead">Listar itens divergêntes</p>
				</div>
			</div>

			<!-- fim da header -->

			<?php

						
			//soma a quantidade e agrupa os referencias
			$lista = mysqli_query($conexao, "SELECT fabricante, grupo from pdf; ");
			while($linha = mysqli_fetch_array($lista)) {

			//pega os dados da consulta while
				$fab = $linha['fabricante'];
				$grup = $linha['grupo'];
			}

			$listagem = mysqli_query($conexao,  "SELECT * FROM coletar where coleta = 0 and referencia > 0 and quantidade > 0 and fabricante = '$fab' and grupo = '$grup'");

			?>

			<table class="table table-condensed">

				<!-- cabecalho da tabela-->
				<thead >

					<tr class="table-primary">

						<th scope="col">EAN</th>
						<th scope="col">Quantidade Coletada</th>
						<th scope="col">Quantidade ERP</th>
						<th scope="col">Descrição</th>
						<th scope="col">Fabricante</th>
						<th scope="col">Grupo</th>


					</tr>
				</thead>
				<!--corpo da tabela-->

				<tbody>
					<?php
					while($linha = mysqli_fetch_array($listagem)) {
						?>

						<tr>
							<td> <?= $linha['referencia'] ?> </td> 
							<td> <?php 	 echo "Não coletado"; ?> </td>
							<td> <?= $linha['quantidade'] ?> </td>      
							<td><?= utf8_encode($linha['descricao']); ?></td>
							<td><?= utf8_encode($linha['fabricante']); ?></td>
							<td><?= utf8_encode($linha['grupo']); ?></td>
						</tr>

					<?php } ?>


					<!-- tabela divergencia dos coletados-->


					<?php 

					$listagem = mysqli_query($conexao, "SELECT * FROM diferenca where fabricante ='$fab' and grupo = '$grup'");

					?>

					<!--corpo da tabela-->

					<tbody>
						<?php
						while($linha = mysqli_fetch_array($listagem)) {
							?>

							<tr>
								<td> <?= $linha['referencia'] ?> </td> 
								<td> <?= $linha['quantidade_coletada'] ?> </td>
								<td> <?= $linha['quantidade_sistema'] ?> </td>      
								<td><?= utf8_encode($linha['descricao']); ?></td>
								<td><?= utf8_encode($linha['fabricante']); ?></td> 
								<td><?= utf8_encode($linha['grupo']); ?></td>  
							</tr>

						<?php } ?>


						

					</tbody>
				</table>

			</section>
		</section>

	</body>
	</html>