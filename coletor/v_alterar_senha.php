<?php

session_start();
require "arquivos_banco/conexao.php";
require 'arquivos_banco/login_verificar.php';

$ud = filter_var( $_GET['id'], FILTER_SANITIZE_STRING);
	

	$id =  base64_decode($ud);
	
	$result_usuario = "SELECT * FROM usuarios WHERE id='$id'";

	$resultado_usuario = mysqli_query($conexao, $result_usuario);
	$row_usuario = mysqli_fetch_assoc($resultado_usuario);

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
					<h1 class="display-4">Gerenciar usuários</h1>
					<p class="lead">Alterar Senha</p>
				</div>
			</div>

			<!-- fim da header -->
			<?php require 'arquivos_banco/mensagens.php'; ?>

			<!-- form para cadastro de usuarios-->

			<section class="form">

				<form method="post" action="arquivos_banco/alteracao.php">

					<fieldset class="area_fieldset"> <h3>
						<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
					Alterar senha</h3>
					<div class="form-group">
						<label for="exampleInputPassword1">Nova senha</label>

						<input type="password" class="form-control"  name="senha" id="exampleInputPassword1" placeholder="Senha" autocomplete="off" required="" autofocus="">
						
						<?php $id = $row_usuario['id'];  ?>

						<input type="hidden" name="id" value="<?php echo  base64_encode($id); ?>">
						<input type="hidden" name="nome" value="<?php echo $row_usuario['usuario']; ?>">
					
					</div>
					
						<button type="submit" class="btn btn-primary">Cadastrar</button>
					</fieldset>
				</form>

			</section>


			</section><!-- fim da div corpo -->
			
			<?php include 'v_rodape.php' ?>
			
		</section><!--fim da sessao principal-->

	</body>
	</html>