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
   $desc = utf8_decode('Produto não cadastrado');

  $listagem = mysqli_query($conexao,  "SELECT COUNT(id)  FROM coletor_importar where descricao = '$desc'");
  //conta
  $contar = $listagem->fetch_row();
  //recebe o valor
  $id = $contar;
  //se nao tiver produto nao cadastrado
  if ($id[0] < 1 ) { 

  $_SESSION['msg'] = "<div class='alert alert-danger'><span class='glyphicon glyphicon-remove remove' aria-hidden='true'></span> Não há não cadastrados!</div>";
  header("Location: v_coleta.php");
  }

  ?>

  <title>coletor de dados</title>


  <!-- link para os css-->
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css.css">
  <link rel="stylesheet" href="normalize.css">

<?php

include 'arquivos_banco/atualizar_automaticamente.php'

?>


</head>

<body>
	
	<!-- sessao principal -->
	<section id="principal">
   
   <?php require 'v_cabecalho.php';?>
   
   <section class="corpo">


    <!-- header -->
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">Produtos não cadastrados</h1>
        <p class="lead">Listar itens não cadastrados</p>
      </div>
    </div>
    <!-- fim da header -->


    <?php 
    $listagem = mysqli_query($conexao,"SELECT max(id) as id, referencia, sum(quantidade), descricao from coletor_importar   where descricao = 'Produto nao cadastrado' group by referencia ;");

    ?>

    <table class="table table-condensed">

     <!-- cabecalho da tabela-->
     <thead >

      <tr class="table-primary">

        <th scope="col">EAN</th>
        <th scope="col">Quantidade</th>
        <th scope="col">Descrição</th>
        
      </tr>
    </thead>
    <!--corpo da tabela-->
    <?php

    while($linha = mysqli_fetch_array($listagem)) {

    ?>

      <tr>
     

        <td> <?= $linha['referencia'] ?>  </td>


        <td> <?= $linha['sum(quantidade)'] ?> </td>  

        <td> 
        <a href="v_listar_tempo_nao_cadastrado_usuario.php?referencia=<?= $linha['referencia'] ?>">
        <?= utf8_encode($linha['descricao']); ?> </a></td>    
        
      </tr>
      
      <?php } ?>

    </tbody>
  </table>

</section>
</section>

</body>
</html>