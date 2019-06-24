<?php
session_start();
require "arquivos_banco/conexao.php";
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
					<h1 class="display-4">Gerenciar usuários</h1>
					<p class="lead">Gerenciar usuarios</p>
				</div>
			</div>

			<!-- fim da header -->
			<?php require 'arquivos_banco/mensagens.php'; ?>

			<!-- form para cadastro de usuarios-->

			<section class="form">

				<form method="post" action="arquivos_banco/cadastrar_usuario.php">

					<fieldset class="area_fieldset"> <h3>
						<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
					Cadastro de usuário</h3>

					<div class="form-group">
						<label for="exampleInputEmail1">Nome</label>

						<input type="text" class="form-control" id="exampleInputEmail1" name="usuario" aria-describedby="emailHelp" placeholder="Nome" autocomplete="off" required="">

					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Senha</label>

						<input type="password" class="form-control"  name="senha" id="exampleInputPassword1" placeholder="Senha" autocomplete="off" required="">
					</div>
					<div class="form-check">

						<input type="checkbox" name="tipo" value="adm" class="form-check-input" id="exampleCheck1">
						<label class="form-check-label" for="exampleCheck1">Administrador</label><p>
						</div>
						<button type="submit" class="btn btn-primary">Cadastrar</button>
					</fieldset>
				</form>

			</section>

			<div>
			
			<hr id="margem">

			<h4 id="margem">
				<a href="v_listar_auditoria.php">
					<span class="glyphicon glyphicon-floppy-remove remove" aria-hidden="true"></span>
				Auditoria </a> </h4>

				<hr id="margem">

				</div>

				<section class="tabela">
				
				<h3 id="margem">Usuários cadastrados</h3>

				<!-- tabela usuarios cadastrados-->

				<table class="table table-condensed table_user" >

					<!-- cabecalho da tabela-->
					<thead >

						<tr class="table-primary">

							<th scope="col">Nome</th>
							<th scope="col">Tipo da conta</th>
							<th scope="col">Excluir</th>
							<th scope="col">Auterar senha</th>
						</tr>
					</thead>
					<!--corpo da tabela-->

					<tbody>

						<?php

						$listagem = mysqli_query($conexao,  "SELECT * FROM usuarios");
						while($linha = mysqli_fetch_array($listagem)) {
							?>

							<tr>
								<td> <?= $linha['usuario'] ?> </td>
								<td> <?= $linha['tipo'] ?> </td>  
								
								<td>
									<?php $nome = $linha['usuario'] ; //coloca o valor do usuario numa variavel e envia no link abaixo pelo metodo get?>
									<button type="button" class="btn btn-danger">
										<a  href="arquivos_banco/excluir_usuario.php?id=<?= $linha['id']?>&nome=<?= $nome?> " onclick="return confirm('Excluir? Auteração não poderá ser desfeita!')" >Excluir
										</a>
									</button>
								</td>

								<td>

									<?php

									$id =  $linha['id'] ;				

									?>
									
									<button type="button" class="btn btn-danger">
										<a  href="v_alterar_senha.php?id=<?php echo base64_encode($id);?>" onclick="return confirm('Excluir? Auteração não poderá ser desfeita!')" >Auterar senha


										</a>
									</button>
								</td>

							</tr>
						<?php } ?>
					</tbody>
				</table>
				<!-- fim da tabela -->
			</section>

			</section><!-- fim da div corpo -->
		</section><!--fim da sessao principal-->

	</body>
	</html>