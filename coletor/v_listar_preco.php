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

 
  $listagem = mysqli_query($conexao,  "SELECT COUNT(id)  FROM coletar");
  //conta
  $contar = $listagem->fetch_row();
  //recebe o valor
  $id = $contar;
  //se nao tiver exportado
  if ($id[0] < 1 ) { 

  header("Location: v_pesquisa_preco.php");

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

   <?php require 'v_cabecalho.php'; ?>

   <section class="corpo">

    <!-- header -->
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">Itens processados</h1>
        <p class="lead">Listar pesquisa</p>
      </div>
    </div>
    <!-- fim da header -->

  <?php 
        
        $pesquisar = filter_var($_POST['pesquisar'], FILTER_SANITIZE_STRING);
        
        $result = "SELECT * FROM coletar WHERE MATCH(descricao) AGAINST('$pesquisar') and referencia <> '0'";

        $resultado = mysqli_query($conexao, $result);

  ?>

    <!-- tabela -->

    <table class="table table-condensed">

     <!-- cabecalho da tabela-->
     <thead >

      <tr class="table-primary">

        <th scope="col">EAN</th>
        <th scope="col">QUANTIDADE</th>
        <th scope="col">DESCRIÇÃO</th>
        <th scope="col">PREÇO</th>
        <th scope="col">FABRICANTE</th>
        
        
      </tr>
    </thead>
    <!--corpo da tabela-->

    <tbody>

      <?php
      while($linha = mysqli_fetch_array($resultado)){
      ?>
        <tr>
          <td> <?= $linha['referencia'] ?> </td> 
          <td> <?= $linha['quantidade'] ?> </td>  
          <td> <?= utf8_encode($linha['descricao']); ?> </td>
          <td> <?= $linha['preco'] ?> </td>
          <td> <?= $linha['fabricante'] ?> </td>

        </tr>
      <?php } ?>
    </tbody>
  </table>

  <!-- fim da tabela -->
</section>
</section>

</body>
</html>