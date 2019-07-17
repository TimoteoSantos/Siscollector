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
	<section id="principal">
		
		<?php require 'v_cabecalho.php'; ?>

		<section class="corpo">

			<!-- header painel com a imagem -->
			<div class="jumbotron jumbotron-fluid">
				<div class="container">
					<h1 class="display-4">Pesquisa de preço</h1>
					<p class="lead">Área de gestão de pesquisa de preço</p>
				</div>
			</div>
			<!-- fim da header -->



	<div class="container">
	<?php

if(isset($_SESSION['msg'])){
echo $_SESSION['msg'];
unset($_SESSION['msg']);
}
?>

					<!--painel-->
					<div class="panel panel-primary ">
					<div class="panel-heading panel-heading-coletados">
						<h3 class="panel-title">Como importar os dados de pesquisa ?</h3>
					</div>
					<div class="panel-body centro">

						<p>Todos os dados são importados na área de importação do ERP, lá você poderá gerenciar a importação de dados.</p>
					</div>
				</div><!--fim do painel contagem produtos coletados-->
			
			<?php
			
			$listage = mysqli_query($conexao,  "SELECT count(referencia) from coletar ");
			$exportado = $listage->fetch_row();
			
			?>
			
				<!--painel-->
				<div class="panel panel-primary ">
					<div class="panel-heading panel-heading-coletados">
						<h3 class="panel-title">Quantidade Importado</h3>
					</div>
					<div class="panel-body centro">

						<h4> <?php echo $exportado[0]; ?> </h4>
					</div>
				</div><!--fim do painel contagem produtos coletados-->

			<!--painel-->
			<div class="panel panel-primary ">
					<div class="panel-heading panel-heading-coletados">
						<h3 class="panel-title">Consulta para busca do arquivo do excluir_produtos_importados</h3>
					</div>
					<div class="panel-body centro">

						<p>SELECT [Cadastro de Mercadorias].[Cód Fabricante], [Cadastro de Mercadorias].Mercadoria, [cadastro de mercadoriasLojas].PrecoGrade, [cadastro de mercadoriasLojas].Estoque, [Cadastro de Mercadorias].Fabricante, [Cadastro de Mercadorias].Grupo, [cadastro de mercadoriasLojas].Loja
FROM [Cadastro de Mercadorias] INNER JOIN [cadastro de mercadoriasLojas] ON [Cadastro de Mercadorias].[Código da Mercadoria] = [cadastro de mercadoriasLojas].[Código da Mercadoria]
WHERE ((([cadastro de mercadoriasLojas].Loja)="loja 03"));

</p>
					</div>
				</div>
			<hr>

			<h2>Produtos importados <a href="v_buscar_preco.php"><span class="glyphicon glyphicon-search " aria-hidden="true"></span></a></h2>

			<!-- tabela -->
			<?php 
			
			$listagem = mysqli_query($conexao,"SELECT * FROM coletar where referencia <> 0 order by descricao;");
			
			?>

			<table class="table table-condensed">
			<tbody>


				<!-- cabecalho da tabela-->
				<thead >

					<tr class="table-primary">

					<td><strong>  REFERÊNCIA  </strong> </td>
					<td> <strong> PREÇO </strong> </td>
					<td width="400"> <strong> DESCRIÇÃO </strong> </td>
					<td> <strong> QUANTIDADE </strong> </td>
					<td>  <strong> FABRICANTE </strong> </td>
					<td> <strong> GRUPO </strong> </td>

					</tr>
					
<?php

while($linha = mysqli_fetch_array($listagem)) {

$preco =  $linha['preco'] ;

?>

<tr>
<td> <?= $linha['referencia'] ?> </td> 
<td> <?php echo  number_format($preco, 2, ',', '.') ; ?> </td> 
<td> <?= $linha['descricao'] ?> </td>
<td> <?= $linha['quantidade'] ?> </td>
<td> <?=$linha['fabricante'] ?> </td>
<td> <?=$linha['grupo'] ?> </td>
 
</tr>

<?php } ?>
					
				</tbody>
			</table>

		<!-- fim da tabela -->








	</div> <!-- /container -->
			
			
		</section>
	</section>

</body>
</html>