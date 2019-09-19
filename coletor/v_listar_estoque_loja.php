<?php
session_start();
//conexao com banco
require 'arquivos_banco/conexao.php';
require 'arquivos_banco/login_verificar.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
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
  header("Location: v_processar.php");

  }
  ?>

  <title>estoque divergente loja</title>

  <!-- link para os css-->
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css.css">
  <link rel="stylesheet" href="normalize.css">
  <link rel="stylesheet" type="text/css" href="print.css" media="print">

  <meta charset="UTF-8">

</head>

<body>
	
	<!-- sessao principal -->
	<section id="principal">
<div class="esconder">
   <?php require 'v_cabecalho.php'; ?>

   <section class="corpo">

    <!-- header -->
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">Estoque / Loja</h1>
        <p class="lead">Listar itens que tem no estoque mas não tem na loja</p>
      </div>
    </div>
    <!-- fim da header -->
</div>
    <?php 

    $listagem = mysqli_query($conexao,  "SELECT * FROM `coletor_exportar` WHERE local_estoque > 0 and local_loja = 0 ");

    ?>

    <!-- tabela -->

    <table class="table table-condensed">

     <!-- cabecalho da tabela-->
     <thead>

      <tr class="table-primary">

        <th scope="col">EAN</th>
        <th scope="col">Quantidade</th>
        <th scope="col">Descrição</th>
        
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
          <td> <?= utf8_encode($linha['descricao']); ?> </td>    
        </tr>
      <?php } ?>
    </tbody>
  </table>

  <!-- fim da tabela -->
</section>
</section>

</body>
</html>