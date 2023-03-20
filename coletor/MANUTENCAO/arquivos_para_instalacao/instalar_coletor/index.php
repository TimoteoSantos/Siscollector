<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
		<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
		<title>Restaurar Banco de Dados</title>

<style type="text/css">
	

body section {
	width: 500px;

}
fieldset {
	width: 100%;
	border-radius: 0px;
	border-color:#20B2AA;

}

h1 {
	text-align: center;
	color: #008B8B;
}

form input {
	width: 95%;
	height: 30px;
	padding: 3px;		
	border-style: nones;
	border-radius: 10px;
}

body {

	background-image: url(bg.png);

	margin-left: 5%;
	margin-top: 45px;
}



</style>



	</head>

	<body>

		<section>
			<h1>Bem vindo ao instalador</h1>
			<!--<div>  <img src="logo.png" height="45px;">	<h1> Importar banco de dados</h1>-->
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
		
		<p>

		</div>


		<div>
		<form method="POST" action="processa.php" enctype="multipart/form-data">

			<fieldset>
			<label>Servidor: </label><br>

			<input type="text" name="servidor" value="localhost" placeholder="Nome do servidor"><br><br>
			
			
			<label>Usuário: </label> <br>
			<input type="text" name="usuario" value="root" placeholder="Usuário da base de dados"><br><br>
			
			<label>Senha: </label> <br>
			<input type="password" name="senha"  placeholder="Senha padrão é em branco"><br><br>
			
						
			<label>Arquivo SQL	: </label> <p>
			<input type="file" name="arquivo"><br><br>
			
			<input type="submit" value="Importar">
			
			</fieldset>


		</form>

		</div>

		</section>
	</body>
</html>