<?php
session_start();
//conexao com banco
require '../coletor/arquivos_banco/conexao.php';
//require 'arquivos_banco/login_verificar.php';
?>

<!DOCTYPE html>
<html>
<head>

  <?php

  $listagem = mysqli_query($conexao,  "SELECT COUNT(id)  FROM vendas");
  //conta
  $contar = $listagem->fetch_row();
  //recebe o valor
  $id = $contar;
  //se tiver nao tiver pesquisa
  if ($id[0] < 1 ) { 

  //apos gravar envia a mensagen para a index.php
    $_SESSION['msg'] = "<div class='alert alert-danger'><span class='glyphicon glyphicon-remove remove' aria-hidden='true'></span> Não tem registro importado!</div>";
    header("Location:index.php");

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

 
   <section class="corpo">


    <!-- header -->
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4"> Vendas realizadas</h1>
        <p class="lead">Vendas para subtração</p>
      </div>
    </div>
    <!-- fim da header -->

    <?php 

	//coloca em listagem um array com apenas os campos vazios de status
    $listagem = mysqli_query($conexao,  "SELECT referencia, sum(quantidade) as quantidade, descricao FROM vendas where quantidade > 0 group by referencia order by descricao");

    ?>

    <table class="table table-condensed">

     <!-- cabecalho da tabela-->
     <thead >

      <tr class="table-primary">

        <th scope="col">EAN</th>
        <th scope="col">Descrição</th>
        <th scope="col">quantidade</th>
        
      </tr>
    </thead>
    <!--corpo da tabela-->

    <tbody>
    <?php
    //o while repete a criaçao de linhas na tabela igual a quantidade de itens.
    while($linha = mysqli_fetch_array($listagem)) {
    //cada dado da linha no array $linha['nome do campo que queremos exibir']
    ?>

      <tr>
        <td> <?= $linha['referencia'] ?> </td>
        <!-- função para exibir caracteres especiais-->
        <td> <?= utf8_encode($linha['descricao']); ?> </td> 
        <td> <?= $linha['quantidade'] ?> </td>
      </tr>

    <?php } ?>

    </tbody>
  </table>

</section>
</section>

</body>
</html>