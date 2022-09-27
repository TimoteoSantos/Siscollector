<?php
session_start();
//conexao com banco
require 'arquivos_banco/conexao.php';
require 'arquivos_banco/login_verificar.php';
?>

<!DOCTYPE html>
<html>
<head>
<?php
  
 $listagem = mysqli_query($conexao,  "SELECT COUNT(id)  FROM coletor_importar where usuario = 'importado_coletor_externo'");
  //conta
  $contar = $listagem->fetch_row();
  //recebe o valor
  $id = $contar;
  //se nao tiver importado de coletor externo
  if ($id[0] < 1 ) { 

  $_SESSION['msg'] = "<div class='alert alert-danger'><span class='glyphicon glyphicon-remove remove' aria-hidden='true'></span> Não tem registro!</div>";
  header("Location: v_importar_arquivo.php");
  }

  ?>

	<title>coletor de dados</title>

  <!-- link para os css-->
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css.css">
  <link rel="stylesheet" href="normalize.css">

</head>

<body>
	
	<!-- sessao principal -->
	<section id="principal">
   
   <?php  require 'v_cabecalho.php'; ?>

   <section class="corpo">


    <!-- header -->
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">Produtos importados para pesquisa</h1>
        <p class="lead">Produtos cadastrados</p>
      </div>
    </div>

    <!-- fim da header -->

    <?php 

	  $listagem = mysqli_query($conexao,  "SELECT * FROM coletor_importar where usuario = 'importado_coletor_externo'");
    ?>

    <table class="table table-condensed">

     <!-- cabecalho da tabela-->
     <thead >

      <tr class="table-primary">

        <th scope="col">EAN</th>
		 <th scope="col">Quantidade</th>
        <th scope="col">Descrição</th>
		 <th scope="col">Usuário</th>
        
      </tr>
    </thead>
    <!--corpo da tabela-->

    <tbody>
	<?php
      
      while($linha = mysqli_fetch_array($listagem)) {
      ?>

        <tr>
          <td> <?= $linha['referencia'] ?> </td>
          <td> <?= $linha['quantidade'] ?> </td>
          <!-- função para exibir caracteres especiais-->
          <td> <?= utf8_encode($linha['descricao']); ?> </td>  
         <td> <?= utf8_encode($linha['usuario']); ?> </td>  

        </tr>
		
        <?php } ?>

    </tbody>
  </table>
</section>
</section>

</body>
</html>