
<?php
session_start();
require '../coletor/arquivos_banco/conexao.php';
?>

<!DOCTYPE html>
<html>
<head>

	<style>
		
		body{
	
	background-image: url("fundo_login.jpg")!important;
	background-repeat: repeat-x;
	
	}
	
	fieldset{
	background-color: #ffffff;
	opacity: 0.8;



	}

	.area_fieldset {
		margin: auto !important;
		border-style:none !important;
	}

	h1 {
		margin-left: 20px;
		color: black;
		margin-left: 20px !important;
	}

	small {

		position: absolute;
		bottom: 0;
	}

	</style>


	<title>Siscollect Login</title>


	<!-- link para os css-->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css.css">
	<link rel="stylesheet" href="normalize.css">

</head>

<body>
	
	<!-- sessao principal -->
	<section id="principal">


		<section class="corpo">

		<h1><span><img src="logo.png" alt=""></span> SisCollect</h1>

		<p>

		<!--<h4  style="margin-left: 20px; color: #008B8B"> Entre com suas credênciais </h4>-->

		<!-- form de usuarios-->
		<?php require 'arquivos_banco/mensagens.php'; ?>

		<section class="form">

			<form action="arquivos_banco/valida.php" method="post">

				<fieldset class="area_fieldset"> <h3>

					<span class="glyphicon glyphicon-user icones" aria-hidden="true"></span>

				Entrar</h3>

				<div class="form-group">
					<label for="exampleInputEmail1">Nome</label>
					<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nome" name="user" required="" autofocus="">

				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Senha</label>
					<input type="password"  name="senh" class="form-control" id="exampleInputPassword1" placeholder="Senha" required="">
				</div>

				<input type="submit" class="btn btn-primary" name="botao" value="Entrar" >
			</fieldset>
		</form>

	</section>		

</section><!-- fim da div corpo -->
</section><!--fim da sessao principal-->

</body>
</html>