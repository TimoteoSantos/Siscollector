<?php
session_start();
require 'arquivos_banco/conexao.php';
require 'arquivos_banco/login_verificar.php';
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

		<?php require 'v_cabecalho.php'; ?>
		
		<section class="corpo">


			<!-- header painel com a imagem -->
			<div class="jumbotron jumbotron-fluid">
				<div class="container">
					<h1 class="display-4">Configurar</h1>
					<p class="lead">Suas preferências</p>
				</div>
			</div>
			<!-- fim da header -->

			<?php require 'arquivos_banco/mensagens.php';//mensagens de aviso ?>

			<!-- configurar pasta de backup-->

			<section class="form">

				<form method="post" action="arquivos_banco/cadastrar_destino.php">

					<fieldset class="area_fieldset"> <h3>
						<span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>
					Configurar Pasta para salvar arquivos</h3>

					<div class="form-group">


						<?php

						$listagem = mysqli_query($conexao,  "SELECT COUNT(id)  FROM config where conf = '1'");

						//conta 
						$conta = $listagem->fetch_row();
						//recebeo valor
						$contagem = $conta;
						//se nao configurou a pasta
						if ($contagem[0] != 1) {

							?>
							<h5> Exemplo: "F:pasta/outra_pasta..." ou se for no C: faça "pasta/outra_pasta/outra_pasta..." </h5>

							<label for="exampleInputEmail1">Pasta backup</label>
							<input type="text" class="form-control" id="exampleInputEmail1" name="destino" aria-describedby="emailHelp" placeholder="novo caminho" required="" autofocus="">

						</div>

						<button type="submit" class="btn btn-primary">Gravar</button>
					</fieldset>



					<?php } else { //se configurou


						$listagem = mysqli_query($conexao,  "SELECT COUNT(id), arquivo  FROM config where conf = '1'"); 
						while($linha = mysqli_fetch_array($listagem)) {

							$escrever_destino = $linha["arquivo"];

							?>

							<button type="button" class="btn btn-danger" ><a href="arquivos_banco/excluir_destino.php">Trocar</a></button>
							<p>

								<?php echo "<h4> Pasta de destino: $escrever_destino </h4>"; ?>

							</p>

						<?php	} }	?>

					</form>
					
					
					</section>	
					<p>

					<!--cadastrar endereço da camera -->						
						<section class="form">

							<form method="post" action="arquivos_banco/cadastrar_camera.php">

								<fieldset class="area_fieldset"> <h3>
									<span class="glyphicon glyphicon-camera" aria-hidden="true"></span>
								Configurar Leitor da câmera</h3>

								<div class="form-group">


									<?php

									$listagem = mysqli_query($conexao,  "SELECT COUNT(camera)  FROM config where conf = 2");
									//conta
									$conta = $listagem->fetch_row();
									//recebe o valor
									$contar = $conta;
									//se nao tiver cadastrado
									if ($contar[0] != 1) {

										?>
										<h5> Exemplo:Endereço do coletor_mobile ou ip do servidor </h5>

										<label for="exampleInputEmail1">Endereço de envio do código de barras</label>
										<input type="text" class="form-control" id="exampleInputEmail1" name="camera" aria-describedby="emailHelp" placeholder="Novo caminho" required="" autofocus="">

									</div>

									<button type="submit" class="btn btn-primary">Gravar</button>
								</fieldset>



								<?php } else {//se tiver cadastrado


								$listagem = mysqli_query($conexao,  " SELECT max(camera) as camera  FROM config limit 1"); 
								while($linha = mysqli_fetch_array($listagem)) {

									$escrever = $linha["camera"];

									?>

									<button type="button" class="btn btn-danger" ><a href="arquivos_banco/excluir_camera.php">Trocar</a></button>
									<p>

										<?php echo "<h4> Pasta de destino:. $escrever </h4>"; ?>

									</p>

									<?php
								}
							}
							?>

						</form>
					<p>
					</section>

				<!--cadastrar endereço da camera PDF -->						
				<section class="form">

				<form method="post" action="arquivos_banco/cadastrar_pdf.php">

					<fieldset class="area_fieldset"> <h3>
						<span class="glyphicon glyphicon-home" aria-hidden="true"></span>
						Configurar informações da coleta</h3>

					<div class="form-group">


						<?php

						$listagem = mysqli_query($conexao,  "SELECT COUNT(id)  FROM pdf");
						//conta
						$conta = $listagem->fetch_row();
						//recebe o valor
						$contar = $conta;
						//se nao tiver cadastrado
						if ($contar[0] != 1) {

							?>
							<h5> Configurar informações da coleta </h5>

							<label for="exampleInputEmail1">Dados</label>
							<p>

							<select class="form-control" name="empresa" autofocus="">

								<option value="M. A. DA SILVA COSMETICOS - ME"> Matriz </option>
								<option value ="MERCIA A. DA SILVA COSMETICOS - ME"> Loja 02 </option>
								<option value="SIDNEI DA SILVA MARQUES COSMETICOS - ME"> Loja 03 </option>
								<option value="M. A. DA SILVA COSMETICOS - ME FILIAL"> Loja 04 </option>

							</select>
							
							<p>
							<input type="text" class="form-control" id="exampleInputEmail1" name="fornecedor" aria-describedby="emailHelp" placeholder="Fornecedor">
							<p>
							<input type="text" class="form-control" id="exampleInputEmail1" name="fabricante" aria-describedby="emailHelp" placeholder="Fabricante" >
							<p>
							<input type="text" class="form-control" id="exampleInputEmail1" name="grupo" aria-describedby="emailHelp" placeholder="Grupo">
							<p>
						</div>

						<button type="submit" class="btn btn-primary">Gravar</button>
					</fieldset>



					<?php } else {//se tiver cadastrado


					$listagem = mysqli_query($conexao,  "SELECT * FROM pdf"); 
					while($linha = mysqli_fetch_array($listagem)) {

						$empresa = $linha["empresa"];
						$fornecedor = $linha["fornecedor"];
						$fabricante = $linha["fabricante"];
						$grupo = $linha["grupo"];

						?>

						<button type="button" class="btn btn-danger" ><a href="arquivos_banco/excluir_pdf.php">Trocar</a></button>
						<p>

							<?php echo "<h4> Dados:<br> Empresa: $empresa  <br> Fornecedor: $fornecedor  <br>Fabricante:  $fabricante  <br>Grupo:  $grupo  </h4>"; ?>

						</p>

						<?php
					}
				}

				?>

					</section>
				</form>

				<p>

			<!-- tempo de atualização -->						
				<section class="form">

				<form method="post" action="arquivos_banco/tempo_atualizacao.php">

					<fieldset class="area_fieldset"> <h3>
						<span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span>
					Configurar tempo de atualização das páginas</h3>

					<div class="form-group">

						<?php

						$listagem = mysqli_query($conexao, "SELECT count(tempo), tempo  FROM config where tempo > 1 limit 1");
						//conta
						$con = $listagem->fetch_row();
						//recebe o valor
						$contar = $con;
						//se nao tiver cadastrado
						if ($contar[0] != 1) {

						?>

							<h5> Configure o tempo de atualização das páginas </h5>

							<label for="exampleInputEmail1">Dados</label>
							<p>

							<select class="form-control" name="tempo" >

								<option value="p000"> Não atualizar </option>
								<option value="5000"> 5 segundos </option>
								<option value="10000"> 10 segundos </option>
								<option value="30000"> 30 segundos </option>
								<option value="60000"> 60 segundos </option>
								<option value="300000"> 5 minutos </option>
								<option value="600000"> 10 minutos </option>

							</select>
							
						</div>

						<button type="submit" class="btn btn-primary">Gravar</button>
					</fieldset>

					<?php } else {//se tiver cadastrado


					$listagem = mysqli_query($conexao, "SELECT max(tempo) as tempo  FROM config limit 1");
					while($linha = mysqli_fetch_array($listagem)) {

						$tempo = $linha["tempo"];
						
						?>
						<button type="button" class="btn btn-danger" ><a href="arquivos_banco/excluir_tempo.php">Trocar</a></button>
						<p>

							<?php echo "<h4> Dados:<br> Tempo: $tempo</h4>"; ?>

						</p>

						<?php
					}
				}
				?>

				</form>
			</section>

				<p>

										
				<section class="form">

				<form method="post" action="arquivos_banco/alarme.php">

					<fieldset class="area_fieldset"> <h3>
						<span class="glyphicon glyphicon-volume-up" aria-hidden="true"></span>
					Alarme Sonoro Fabricante divergênte</h3>

					<div class="form-group">

						<?php

						$listagem = mysqli_query($conexao, "SELECT conf  FROM config where conf = 4 limit 1");
						//conta
						$con = $listagem->fetch_row();
						//recebe o valor
						$contar = $con;

						

						//se nao tiver cadastrado
						if ($contar[0] <> 4 ) {

						?>

							<h5> Alarme sonoro quando o fabricante for divergente </h5>

							<label for="exampleInputEmail1">Dados</label>
							<p>

							<select class="form-control" name="tempo" >

								<option value=""> Sem alarme </option>
								<option value=""> Com alarme </option>
								
							</select>
							
						</div>

						<button type="submit" class="btn btn-primary">Gravar</button>
					</fieldset>


					<!-- verificar -->

					<?php } else {//se tiver cadastrado


						
						?>

						<button type="button" class="btn btn-danger" ><a href="arquivos_banco/excluir_alarme.php">Desfazer</a></button>
						<p>

							<?php echo "<h4> Alerta de fabricante divergênte configurado</h4>"; ?>

						</p>

						<?php
					}
				
				?>

				</form>
			</section>

			<p>

			<!-- estoque e loja -->						
				<section class="form">

				<form method="post" action="arquivos_banco/estoque_loja.php">

					<fieldset class="area_fieldset"> <h3>
						<span class="glyphicon glyphicon-cloud-upload" aria-hidden="true"></span>
					Loja / Balanço</h3>

					<div class="form-group">

						<?php

						$listagem = mysqli_query($conexao, "SELECT count(estoque_loja)  FROM config where conf = 15 and estoque_loja < 3 limit 1");
						//conta

						$co = $listagem->fetch_row();
						//recebe o valor
						$contar_estoque = $co;
						//se nao tiver cadastrado
						if ($contar_estoque[0] != 1) {

						?>

							<h5> Configure Estoque / Loja </h5>

							<label for="exampleInputEmail1">Dados</label>
							<p>

							<select class="form-control" name="tempo" >

								<option value="1"> Estoque </option>
								<option value="2"> Loja </option>
								
							</select>
							
						</div>

						<button type="submit" class="btn btn-primary">Gravar</button>
					</fieldset>

					<?php } else {//se tiver cadastrado
						

						?>

						<button type="button" class="btn btn-danger" ><a href="arquivos_banco/excluir_estoque_loja.php">Trocar</a></button>
						<p>
    					</p>

    					<?php 


    					$li = mysqli_query($conexao, "SELECT estoque_loja  FROM config where estoque_loja > 0 limit 1");
						while($linha = mysqli_fetch_array($li)) {

						$estoque = $linha["estoque_loja"];

						if ($estoque == 1) {

							$estoque1 = "Estoque";
						}else{

							$estoque1 = "Loja";
						}


    					?>

    					<?php echo "<h4> Estoque / Loja: $estoque1</h4>"; ?>

						<?php

					}

				}
				?>

				</form>
			</section>


			<p>
			<!-- estoque e loja -->						
				<section class="form">

					<form method="post" action="arquivos_banco/estoque_loja.php">

					<fieldset class="area_fieldset"> <h3>
						<span class="glyphicon glyphicon-screenshot" aria-hidden="true"></span>
					configuração de rede do servidor</h3>

					<div class="form-group">

						<?php include 'arquivos_banco/ip.php'; ?>

					</div>
				</fieldset>
			</form>


				</section>
				
			</section><!-- fim da div corpo -->
		</section><!--fim da sessao principal-->
	</body>
</html>