<?php session_start();
  //conexao com banco
  require 'arquivos_banco/conexao.php';
  require 'arquivos_banco/login_verificar.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  
  <?php

  $listagem = mysqli_query($conexao,  "SELECT COUNT(id)  FROM auditoria ");
  //conta
  $contar = $listagem->fetch_row();
  //recebe o valor
  $id = $contar;
  //se nao tiver auditoria
  if ($id[0] < 1 ) { 

  $_SESSION['msg'] = "<div class='alert alert-danger'><span class='glyphicon glyphicon-remove remove' aria-hidden='true'></span> Sem auditoria!</div>";
  header("Location: v_usuario.php");

  }

  ?>

  <title>coletor de dados</title>

  <!-- link para os css-->
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css.css">
  <link rel="stylesheet" href="normalize.css">
  <meta charset="UTF-8">

</head>

<body>
	
	<!-- sessao principal -->
	<section id="principal">

   <?php
   require 'v_cabecalho.php';

   ?>
   <section class="corpo">


    <!-- header -->
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">Auditoria</h1>
        <p class="lead">Ação dos usuários</p>
      </div>
    </div>
    <!-- fim da header -->



    <?php 

    $listagem = mysqli_query($conexao,  "SELECT * FROM auditoria order by id desc");
    ?>

    <!-- tabela -->

    <table class="table table-condensed">

     <!-- cabecalho da tabela-->
     <thead >

      <tr class="table-primary">

        <th scope="col">USUÁRIO</th>
        <th scope="col">DATA</th>
        <th scope="col">DESCRIÇÃO</th>
        
      </tr>
    </thead>
    <!--corpo da tabela-->

    <tbody>

      <?php
      //o while repete a criaçao de linhas na tabela igual a quantidade de itens.
      while($linha = mysqli_fetch_array($listagem)) {
      //cada dado da linha no array $linha['nome do campo que queremos exibir']
      $data = $linha['data']; //recebe a data atual
      ?>
        <tr>
         
          <td> <?= $linha['usuario'] ?> </td> 
          <td> <?php echo date('d/m/Y H:i:s', strtotime($data)); //formata a data para pt-br ?>  </td>  
          <td> <?= utf8_encode($linha['descricao']); //acentos ?> </td>    
        </tr>

        <?php } ?>
      </tbody>
    </table>

    <!-- fim da tabela -->

  </section>
</section>
</body>
</html>